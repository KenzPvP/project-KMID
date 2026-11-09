import re

svg_path = 'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

all_paths = re.findall(r'<path[^>]*d="([^"]+)"[^>]*fill="([^"]+)"[^>]*>', content)

for idx in [45, 46, 52]:
    d, fill = all_paths[idx]
    # Split by M or m
    subparts = re.split(r'(?=[Mm])', d)
    subparts = [s for s in subparts if s.strip()]
    print(f"\n--- Path {idx} (subpaths={len(subparts)}) ---")
    xs_all = []
    ys_all = []
    for s in subparts:
        nums = [float(x) for x in re.findall(r'[-+]?\d*\.?\d+(?:[eE][-+]?\d+)?', s)]
        if len(nums) >= 2:
            xs = nums[0::2]
            ys = nums[1::2]
            xs_all.extend(xs)
            ys_all.extend(ys)
    min_x, max_x = min(xs_all), max(xs_all)
    min_y, max_y = min(ys_all), max(ys_all)
    print(f"Total BBox: X=({min_x:.1f} .. {max_x:.1f}, W={max_x - min_x:.1f}), Y=({min_y:.1f} .. {max_y:.1f}, H={max_y - min_y:.1f})")
