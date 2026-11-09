import re

svg_path = 'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

all_paths = re.findall(r'<path[^>]*d="([^"]+)"[^>]*fill="([^"]+)"[^>]*>', content)

for idx in [43, 44, 45, 46, 52, 57, 58, 59, 60]:
    if idx < len(all_paths):
        d, fill = all_paths[idx]
        subpaths = len(re.findall(r'[Mm]', d))
        print(f"Path {idx}: fill={fill}, len={len(d)}, subpaths={subpaths}")
