import re
import os

svg_path = 'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

all_paths = re.findall(r'<path[^>]*d="([^"]+)"[^>]*fill="([^"]+)"[^>]*>', content)

os.makedirs('scratch/paths', exist_ok=True)

test_indices = [43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 57, 58, 59, 60, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75]

def get_bbox(d):
    nums = [float(x) for x in re.findall(r'[-+]?\d*\.?\d+(?:[eE][-+]?\d+)?', d)]
    if len(nums) >= 2:
        xs = nums[0::2]
        ys = nums[1::2]
        return min(xs), max(xs), min(ys), max(ys)
    return 0, 100, 0, 100

for idx in test_indices:
    if idx < len(all_paths):
        d, fill = all_paths[idx]
        min_x, max_x, min_y, max_y = get_bbox(d)
        w = max(10, max_x - min_x)
        h = max(10, max_y - min_y)
        pad = 10
        svg = f'''<svg xmlns="http://www.w3.org/2000/svg" viewBox="{min_x - pad} {min_y - pad} {w + 2*pad} {h + 2*pad}" width="{w}" height="{h}">
<rect x="{min_x - pad}" y="{min_y - pad}" width="{w + 2*pad}" height="{h + 2*pad}" fill="{"#004ADA" if fill=="white" else "white"}"/>
<path d="{d}" fill="{fill}"/>
</svg>'''
        with open(f'scratch/paths/path_{idx}.svg', 'w') as f_out:
            f_out.write(svg)
        print(f"Path {idx}: fill={fill}, size=({w:.1f} x {h:.1f}) at ({min_x:.1f}, {min_y:.1f})")
