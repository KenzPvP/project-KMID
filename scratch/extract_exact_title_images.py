import os
import cairosvg

svg_file = 'public/images/desainKMID/Hi-fi-design/Landing Page.svg'
out_dir = 'public/images/desainKMID/titles'
os.makedirs(out_dir, exist_ok=True)

with open(svg_file, 'r', encoding='utf-8') as f:
    svg_content = f.read()

# We need exact coordinates in Landing Page.svg canvas space (0..2265, 0..5526)
# Let's define crop regions for each title:
# Frame 1686560867 / clip0_0_1 starts at X=123, Y=366

titles = {
    'title_tentang_kmid': {'x': 1090, 'y': 710, 'w': 380, 'h': 120},
    'title_programs': {'x': 1130, 'y': 2270, 'w': 380, 'h': 120},
    'title_achievments': {'x': 860, 'y': 3310, 'w': 480, 'h': 120},
    'title_faqs': {'x': 970, 'y': 4170, 'w': 280, 'h': 120},
}

for name, rect in titles.items():
    view_box = f"{rect['x']} {rect['y']} {rect['w']} {rect['h']}"
    custom_svg = svg_content.replace('viewBox="0 0 2265 5526"', f'viewBox="{view_box}"')
    
    png_path = os.path.join(out_dir, f"{name}.png")
    cairosvg.svg2png(
        bytestring=custom_svg.encode('utf-8'),
        write_to=png_path,
        output_width=rect['w'] * 3,
        output_height=rect['h'] * 3
    )
    print(f"Exported {png_path}")
