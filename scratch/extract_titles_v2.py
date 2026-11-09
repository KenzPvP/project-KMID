import subprocess
import os

# Use SVG viewBox approach - render the SVG itself with specific viewBox 
# to isolate just the title areas.
# 
# The Landing Page.svg has viewBox="0 0 2265 5526"
# Main frame at translate(123, 366), frame size 1920x4976
#
# From section renders:
# - section_03_program.png shows Programs title + program cards + AChievments
#   That section starts from About end ~Y=1337 (canvas) to ~Y=2700
# - The "Programs" title text in SVG canvas coords should be around Y=1500-1620
# - "AChievments" is near Y=2580-2720
# - "FAQ'S" is near Y=3380-3460
# - "Tentang KMID" is in About section near Y=900-1050
#
# Let me render crops using SVG viewBox directly (inline SVG)

svg_path = r'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\Landing Page.svg'
out_dir = r'c:\laragon\www\project-kmid\public\images\desainKMID\titles'
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
tmp_dir = r'c:\laragon\www\project-kmid\scratch\tmp_html'

os.makedirs(tmp_dir, exist_ok=True)

svg_url = svg_path.replace('\\', '/')

# Each title crop - viewBox in SVG units (x, y, w, h)
# The SVG is 2265x5526 and we need to find where each title is
# 
# From the full design render (Landing_Page_Frame.png) proportions:
# Total frame height: 4976px at 1920 width
# About section: Y offset ~700-1340 (frame relative)
# Programs section: Y offset ~1340-2700 (frame relative)
#   Programs title at ~1390 from frame top 
# Achievements: ~2700-3400 (frame relative)
#   AChievments title at ~2700-2780 from frame top
# FAQ: ~3400-4300 (frame relative)
#   FAQ title at ~3430-3510 from frame top

# Add 366 offset (frame translate Y) and 123 (frame translate X)
# For centered titles, they're at x=123 + 480 = 603 (for 960 center)

# Estimated canvas coordinates from design proportions:
# Canvas Y = frame_y + 366
# Canvas X = frame_x + 123

crops = {
    # "Tentang KMID" - right-aligned, about section Y~1000-1100 frame
    'title_tentang_kmid': {'vb_x': 1440, 'vb_y': 1000, 'vb_w': 500, 'vb_h': 150},
    # "Programs" - centered, y~1380-1470 frame
    'title_programs':     {'vb_x': 650,  'vb_y': 1680, 'vb_w': 750, 'vb_h': 160},
    # "AChievments" - left-aligned, y~2700-2810 frame
    'title_achievments':  {'vb_x': 123,  'vb_y': 2960, 'vb_w': 900, 'vb_h': 180},
    # "FAQ'S" - centered, y~3430-3510 frame
    'title_faqs':         {'vb_x': 650,  'vb_y': 3720, 'vb_w': 750, 'vb_h': 160},
}

for name, c in crops.items():
    x, y, w, h = c['vb_x'], c['vb_y'], c['vb_w'], c['vb_h']
    # Scale: render at 2x for crispness, displayed at w/2 x h/2 CSS pixels
    scale = 2
    out_w = w // scale
    out_h = h // scale
    
    html = f'''<!DOCTYPE html>
<html>
<head>
<style>
  html, body {{ margin: 0; padding: 0; background: transparent; overflow: hidden; }}
</style>
</head>
<body>
  <svg xmlns="http://www.w3.org/2000/svg" width="{out_w}" height="{out_h}" viewBox="{x} {y} {w} {h}">
    <image href="file:///{svg_url}" x="0" y="0" width="2265" height="5526" />
  </svg>
</body>
</html>'''
    tmp_file = os.path.join(tmp_dir, f'{name}_v2.html')
    with open(tmp_file, 'w', encoding='utf-8') as f:
        f.write(html)
    out_png = os.path.join(out_dir, f'{name}_v2.png')
    result = subprocess.run(
        [chrome, '--headless=new', f'--screenshot={out_png}',
         f'--window-size={out_w},{out_h}', '--hide-scrollbars',
         '--no-sandbox',
         f'file:///{tmp_file.replace(chr(92), "/")}'],
        capture_output=True, text=True, timeout=30
    )
    exists = os.path.exists(out_png)
    size = os.path.getsize(out_png) if exists else 0
    print(f'{name}: exists={exists}, size={size} bytes')

print('All done!')
