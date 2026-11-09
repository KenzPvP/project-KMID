import os
import subprocess

edge = r'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe'

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    svg_data = f.read()

svg_cropped = svg_data.replace('viewBox="0 0 2265 5526"', 'viewBox="123 366 1920 4976"')
svg_cropped = svg_cropped.replace('width="2265" height="5526"', 'width="1920" height="4976"')

with open('scratch/landing_page_cropped.svg', 'w', encoding='utf-8') as f:
    f.write(svg_cropped)

out_path = os.path.abspath('scratch/renders/Landing_Page_Frame.png')
abs_f = 'file:///' + os.path.abspath('scratch/landing_page_cropped.svg').replace('\\', '/')

subprocess.run([edge, '--headless', '--disable-gpu', '--window-size=1920,4976', f'--screenshot={out_path}', abs_f], check=False)
print('Cropped frame rendered successfully!')
