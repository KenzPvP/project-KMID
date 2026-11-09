import os
import subprocess

svg_path = os.path.abspath('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
out_dir = os.path.abspath('public/images/desainKMID/titles')
os.makedirs(out_dir, exist_ok=True)

with open(svg_path, 'r', encoding='utf-8') as f:
    svg_content = f.read()

titles = {
    'title_tentang_kmid': {'x': 930, 'y': 1420, 'w': 380, 'h': 100},
    'title_programs': {'x': 1360, 'y': 1920, 'w': 350, 'h': 100},
    'title_achievments': {'x': 800, 'y': 2820, 'w': 500, 'h': 120},
    'title_faqs': {'x': 900, 'y': 3880, 'w': 350, 'h': 100},
}

exe = r'C:\Program Files\Google\Chrome\Application\chrome.exe'

for name, rect in titles.items():
    view_box = f"{rect['x']} {rect['y']} {rect['w']} {rect['h']}"
    custom_svg = svg_content.replace('viewBox="0 0 2265 5526"', f'viewBox="{view_box}"')
    
    html_content = f'''<!DOCTYPE html>
<html>
<head>
<style>
body {{ margin: 0; background: transparent; overflow: hidden; }}
svg {{ width: {rect['w']}px; height: {rect['h']}px; display: block; }}
</style>
</head>
<body>
{custom_svg}
</body>
</html>'''

    html_file = os.path.abspath(f'scratch/{name}.html')
    png_file = os.path.join(out_dir, f'{name}.png')
    
    with open(html_file, 'w', encoding='utf-8') as hf:
        hf.write(html_content)
        
    cmd = [
        exe,
        '--headless=new',
        f'--screenshot={png_file}',
        f'--window-size={rect["w"]},{rect["h"]}',
        '--default-background-color=00000000',
        '--hide-scrollbars',
        f'file:///{html_file}'
    ]
    subprocess.run(cmd, capture_output=True)
    print(f"Rendered {png_file}: {os.path.exists(png_file)}")
