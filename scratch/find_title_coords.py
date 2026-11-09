import subprocess
import os
import re

svg_path = r'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\Landing Page.svg'
out_dir = r'c:\laragon\www\project-kmid\public\images\desainKMID\titles'
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
tmp_dir = r'c:\laragon\www\project-kmid\scratch\tmp_html'

os.makedirs(tmp_dir, exist_ok=True)

# Read the full SVG content
with open(svg_path, 'r', encoding='utf-8') as f:
    svg_content = f.read()

# The SVG has viewBox="0 0 2265 5526"
# We need to change viewBox to crop a specific area
# We also need to change width/height to match the crop size

# From the rendered section_03_program.png and section_04_faq.png,
# the titles are visible. Now need to figure exact SVG coordinate positions.
#
# Looking at the Landing_Page_Frame.png render (frame is 1920x4976):
# The frame render shows the following approximate pixel positions of section titles:
# - "Tentang KMID": ~Y=165/1388px from top (from frame_height proportion)
#   frame_pct = 165/1388 ~= 11.9% of frame height (4976) = 592px -> canvas Y=592+366=958
# - "Programs": ~Y=430/1388 = 31% * 4976 = 1542px -> canvas Y=1542+366=1908
# - "AChievments": ~Y=600/1388 = 43% * 4976 = 2140px -> canvas Y=2140+366=2506
# - "FAQ'S": ~Y=800/1388 = 57.7% * 4976 = 2871px -> canvas Y=2871+366=3237

# BUT - from section_03_program.png which is a partial view starting at Y>about_end,
# AChievments is at BOTTOM of that render, and Programs is at TOP (cut off in my render)

# Let me try a different strategy: use Chrome to screenshot the actual Laravel server
# but with custom viewport that shows just each section title area.

# Actually, the CLEANEST solution: 
# Since the section renders show the titles, let me crop the existing section PNGs
# using PIL (if available) or ImageMagick

# Check if PIL is available
try:
    from PIL import Image
    pil_available = True
    print("PIL is available")
except ImportError:
    pil_available = False
    print("PIL not available")

# If PIL available, crop from existing section renders
if pil_available:
    section_renders = {
        'section_01_hero': r'c:\laragon\www\project-kmid\scratch\renders\section_01_hero.png',
        'section_02_about': r'c:\laragon\www\project-kmid\scratch\renders\section_02_about.png', 
        'section_03_program': r'c:\laragon\www\project-kmid\scratch\renders\section_03_program.png',
        'section_04_faq': r'c:\laragon\www\project-kmid\scratch\renders\section_04_faq.png',
    }
    
    for name, path in section_renders.items():
        if os.path.exists(path):
            img = Image.open(path)
            print(f"{name}: {img.size}")
        else:
            print(f"{name}: NOT FOUND")
else:
    print("Need PIL to crop images")
    print("Let me try a different approach...")
    
    # Render the full Landing Page SVG and then crop using Chrome at specific scroll positions
    # Use the --virtual-time-budget approach
    
    # Actually let's render the page at a specific scroll position
    # by using JavaScript to scroll to specific Y position before screenshotting
    
    # The full design SVG rendered at 1920px width
    # Let's see what coordinates each title is at in the rendered SVG
    print("Trying Chrome with modified SVG viewBox...")
    
    # Try different Y values to find the Programs title
    tests = [
        ('programs_test_a', 1440, 1500, 1920, 200),
        ('programs_test_b', 1440, 1600, 1920, 200),
        ('programs_test_c', 1440, 1700, 1920, 200),
        ('programs_test_d', 1440, 1800, 1920, 200),
        ('programs_test_e', 1440, 1900, 1920, 200),
        ('programs_test_f', 1440, 2000, 1920, 200),
    ]
    
    for tname, vbx, vby, vbw, vbh in tests:
        html = f'''<!DOCTYPE html><html><head>
<style>html,body{{margin:0;padding:0;overflow:hidden}}</style>
</head><body>
<svg xmlns="http://www.w3.org/2000/svg" width="960" height="100" viewBox="{vbx} {vby} {vbw} {vbh}">
  <image href="file:///c:/laragon/www/project-kmid/public/images/desainKMID/Hi-fi-design/Landing Page.svg" x="0" y="0" width="2265" height="5526"/>
</svg>
</body></html>'''
        
        tmp_file = os.path.join(tmp_dir, f'{tname}.html')
        with open(tmp_file, 'w', encoding='utf-8') as f:
            f.write(html)
        out = os.path.join(out_dir, f'{tname}.png')
        subprocess.run([chrome, '--headless=new', f'--screenshot={out}',
                        '--window-size=960,100', '--hide-scrollbars', '--no-sandbox',
                        f'file:///{tmp_file.replace(chr(92),"/")}'],
                       capture_output=True, timeout=20)
        if os.path.exists(out):
            print(f"  {tname}: {os.path.getsize(out)} bytes")

print("Done")
