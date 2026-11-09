import os
import cairosvg

svg_path = 'public/images/desainKMID/Hi-fi-design/Landing Page.svg'
out_dir = 'scratch/renders'
os.makedirs(out_dir, exist_ok=True)

titles = {
    'title_tentang_kmid': {'x': 1360, 'y': 310, 'w': 280, 'h': 120},
    'title_programs': {'x': 1360, 'y': 1900, 'w': 280, 'h': 120},
    'title_achievments': {'x': 140, 'y': 2930, 'w': 500, 'h': 150},
    'title_faqs': {'x': 1360, 'y': 3790, 'w': 280, 'h': 120},
}

with open(svg_path, 'r', encoding='utf-8') as f:
    svg_data = f.read()

for name, rect in titles.items():
    view_box = f"{rect['x']} {rect['y']} {rect['w']} {rect['h']}"
    # Replace viewBox in SVG
    custom_svg = svg_data.replace('viewBox="0 0 2265 5526"', f'viewBox="{view_box}"')
    
    png_out = os.path.join(out_dir, f"{name}_check.png")
    cairosvg.svg2png(bytestring=custom_svg.encode('utf-8'), write_to=png_out, output_width=rect['w']*2, output_height=rect['h']*2)
    print(f"Rendered {png_out}")
