import subprocess
import os

svg_path = r'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\Landing Page.svg'
out_dir = r'c:\laragon\www\project-kmid\public\images\desainKMID\titles'
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
tmp_dir = r'c:\laragon\www\project-kmid\scratch\tmp_html'

os.makedirs(tmp_dir, exist_ok=True)
os.makedirs(out_dir, exist_ok=True)

svg_url = svg_path.replace('\\', '/')

# SVG canvas: 2265x5526
# Frame at translate(123, 366), frame size 1920x4976
# Title positions found from rendered section screenshots
titles = {
    'title_tentang_kmid': {'x': 1380, 'y': 695,  'w': 380, 'h': 130},
    'title_programs':     {'x': 790,  'y': 1875, 'w': 380, 'h': 130},
    'title_achievments':  {'x': 400,  'y': 2650, 'w': 700, 'h': 150},
    'title_faqs':         {'x': 790,  'y': 3478, 'w': 380, 'h': 130},
}

for name, vb in titles.items():
    x, y, w, h = vb['x'], vb['y'], vb['w'], vb['h']
    html = f'''<!DOCTYPE html>
<html>
<head>
<style>
  html, body {{ margin: 0; padding: 0; background: transparent; overflow: hidden; }}
  img {{ position: absolute; top: -{y}px; left: -{x}px; width: 2265px; height: 5526px; }}
</style>
</head>
<body>
  <img src="file:///{svg_url}" />
</body>
</html>'''
    tmp_file = os.path.join(tmp_dir, f'{name}.html')
    with open(tmp_file, 'w', encoding='utf-8') as f:
        f.write(html)
    out_png = os.path.join(out_dir, f'{name}.png')
    result = subprocess.run(
        [chrome, '--headless=new', f'--screenshot={out_png}',
         f'--window-size={w},{h}', '--hide-scrollbars',
         '--no-sandbox', '--force-device-scale-factor=2',
         f'file:///{tmp_file.replace(chr(92), "/")}'],
        capture_output=True, text=True, timeout=30
    )
    exists = os.path.exists(out_png)
    size = os.path.getsize(out_png) if exists else 0
    print(f'{name}: exists={exists}, size={size} bytes')

print('All done!')
