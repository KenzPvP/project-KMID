import os

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    svg_content = f.read()

title_crops = [
    ("title_tentang_kmid", 980, 1475, 350, 70),
    ("title_programs", 960, 2335, 250, 55),
    ("title_achievments", 900, 3120, 370, 60),
    ("title_faqs", 995, 4040, 190, 50),
]

for name, x, y, w, h in title_crops:
    cropped_svg = svg_content.replace('viewBox="0 0 2265 5526"', f'viewBox="{x} {y} {w} {h}"')
    cropped_svg = cropped_svg.replace('width="2265" height="5526"', f'width="{w}" height="{h}"')
    
    with open(f'public/images/desainKMID/titles/{name}.svg', 'w', encoding='utf-8') as f_out:
        f_out.write(cropped_svg)
    print(f"Extracted {name}.svg with viewBox '{x} {y} {w} {h}'")
