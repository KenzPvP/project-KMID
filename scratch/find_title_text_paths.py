import re
import xml.etree.ElementTree as ET

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    content = f.read()

root = ET.fromstring(content)

# We want to find vector paths representing the text:
# "Tentang KMID", "Programs", "Achievments", "FAQ'S"

# Let's inspect all paths and print their min_x, max_x, min_y, max_y, fill, and stroke!
paths = []
for idx, path in enumerate(root.iter('{http://www.w3.org/2000/svg}path')):
    d = path.attrib.get('d', '')
    fill = path.attrib.get('fill', '')
    stroke = path.attrib.get('stroke', '')
    
    # Parse d
    nums = [float(n) for n in re.findall(r'[-+]?\d*\.\d+|\d+', d)]
    if len(nums) >= 4:
        xs = nums[0::2]
        ys = nums[1::2]
        min_x, max_x = min(xs), max(xs)
        min_y, max_y = min(ys), max(ys)
        w = max_x - min_x
        h = max_y - min_y
        paths.append({
            'idx': idx,
            'fill': fill,
            'min_x': min_x, 'max_x': max_x,
            'min_y': min_y, 'max_y': max_y,
            'w': w, 'h': h,
            'd_len': len(d)
        })

print(f"Total paths: {len(paths)}")

# Search for paths with Y in key section title areas:
# Section 2 (About): Y in 1400..1600
# Section 3 (Program): Y in 2000..2300
# Section 4 (Achievements): Y in 2900..3300
# Section 5 (FAQ): Y in 3600..4000

ranges = [
    ("About Title (Y 1400..1600)", 1400, 1600),
    ("Program Title (Y 2000..2300)", 2000, 2300),
    ("Achievements Title (Y 2900..3300)", 2900, 3300),
    ("FAQ Title (Y 3600..4000)", 3600, 4000),
]

for label, y_min, y_max in ranges:
    print(f"\n--- {label} ---")
    matched = [p for p in paths if y_min <= p['min_y'] <= y_max]
    for p in matched:
        print(f"Idx {p['idx']:3d}: Y=[{p['min_y']:.1f}, {p['max_y']:.1f}], X=[{p['min_x']:.1f}, {p['max_x']:.1f}], W={p['w']:.1f}, H={p['h']:.1f}, fill={p['fill']}, d_len={p['d_len']}")
