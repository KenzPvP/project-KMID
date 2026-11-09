import os
import subprocess

edge = r'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe'

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    svg_content = f.read()

# Test various y coordinates for Programs, Achievments, and FAQs
test_crops = [
    # Programs candidates
    ("prog_y2250", 900, 2240, 450, 90),
    ("prog_y2280", 900, 2280, 450, 90),
    # Achievments candidates
    ("ach_y3050", 900, 3050, 450, 90),
    ("ach_y3080", 900, 3080, 450, 90),
    # FAQ candidates
    ("faq_y4000", 900, 4000, 450, 90),
    ("faq_y4040", 900, 4040, 450, 90),
]

for name, x, y, w, h in test_crops:
    cropped_svg = svg_content.replace('viewBox="0 0 2265 5526"', f'viewBox="{x} {y} {w} {h}"')
    cropped_svg = cropped_svg.replace('width="2265" height="5526"', f'width="{w}" height="{h}"')
    
    svg_file = f'scratch/scan_{name}.svg'
    png_file = os.path.abspath(f'scratch/renders/scan_{name}.png')
    
    with open(svg_file, 'w', encoding='utf-8') as f_out:
        f_out.write(cropped_svg)
        
    abs_f = 'file:///' + os.path.abspath(svg_file).replace('\\', '/')
    subprocess.run([edge, '--headless', '--disable-gpu', f'--window-size={w},{h}', f'--screenshot={png_file}', abs_f], check=False)
    print(f'Scanned {name}')
