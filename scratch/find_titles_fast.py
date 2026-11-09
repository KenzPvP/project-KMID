import os
import subprocess

edge = r'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe'

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    svg_content = f.read()

# Scan y from 1200 to 4500 in steps of 250
y_steps = range(1200, 4600, 250)

for y in y_steps:
    w, h = 600, 150
    x = 800
    cropped_svg = svg_content.replace('viewBox="0 0 2265 5526"', f'viewBox="{x} {y} {w} {h}"')
    cropped_svg = cropped_svg.replace('width="2265" height="5526"', f'width="{w}" height="{h}"')
    
    svg_file = f'scratch/grid_y{y}.svg'
    png_file = os.path.abspath(f'scratch/renders/grid_y{y}.png')
    
    with open(svg_file, 'w', encoding='utf-8') as f_out:
        f_out.write(cropped_svg)
        
    abs_f = 'file:///' + os.path.abspath(svg_file).replace('\\', '/')
    subprocess.run([edge, '--headless', '--disable-gpu', f'--window-size={w},{h}', f'--screenshot={png_file}', abs_f], check=False)
    print(f'Rendered grid_y{y}.png')

print("Grid scan completed!")
