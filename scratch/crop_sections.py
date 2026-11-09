import os
import subprocess

edge = r'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe'

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    svg_data = f.read()

sections = [
    ("01_hero", 123, 366, 1920, 967),
    ("02_about", 123, 1333, 1920, 943),
    ("03_program", 123, 2276, 1920, 944),
    ("04_faq", 123, 3220, 1920, 957),
    ("05_footer", 123, 4177, 1920, 1165),
]

for name, x, y, w, h in sections:
    cropped_svg = svg_data.replace('viewBox="0 0 2265 5526"', f'viewBox="{x} {y} {w} {h}"')
    cropped_svg = cropped_svg.replace('width="2265" height="5526"', f'width="{w}" height="{h}"')
    
    svg_file = f'scratch/sec_{name}.svg'
    png_file = os.path.abspath(f'scratch/renders/section_{name}.png')
    
    with open(svg_file, 'w', encoding='utf-8') as f_out:
        f_out.write(cropped_svg)
        
    abs_f = 'file:///' + os.path.abspath(svg_file).replace('\\', '/')
    print(f'Rendering {name}...')
    subprocess.run([edge, '--headless', '--disable-gpu', f'--window-size={w},{h}', f'--screenshot={png_file}', abs_f], check=False)

print('All sections rendered!')
