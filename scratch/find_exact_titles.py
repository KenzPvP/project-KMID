import xml.etree.ElementTree as ET
import re

print("Reading Landing Page.svg...")
with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    content = f.read()

root = ET.fromstring(content)

paths_info = []
for idx, path in enumerate(root.iter('{http://www.w3.org/2000/svg}path')):
    d = path.attrib.get('d', '')
    fill = path.attrib.get('fill', '')
    # Extract numbers from d attribute
    numbers = re.findall(r'[-+]?\d*\.\d+|\d+', d)
    if len(numbers) >= 4:
        coords = [float(c) for c in numbers]
        xs = coords[0::2]
        ys = coords[1::2]
        if xs and ys:
            min_x, max_x = min(xs), max(xs)
            min_y, max_y = min(ys), max(ys)
            w = max_x - min_x
            h = max_y - min_y
            paths_info.append({
                'idx': idx,
                'fill': fill,
                'min_x': min_x, 'min_y': min_y,
                'max_x': max_x, 'max_y': max_y,
                'w': w, 'h': h,
                'd_start': d[:60]
            })

print(f"Total paths parsed: {len(paths_info)}")

# Group paths by y range to find composite title headers
# Titles are located at Y around:
# ~1475 ("Tentang KMID")
# ~2100 - 2400 ("Programs")
# ~3000 - 3400 ("Achievments")
# ~3600 - 4000 ("FAQ'S")

for p in paths_info:
    if 25 <= p['h'] <= 120 and 80 <= p['w'] <= 500:
        print(f"Path idx={p['idx']}: Y=[{p['min_y']:.1f}, {p['max_y']:.1f}], X=[{p['min_x']:.1f}, {p['max_x']:.1f}], W={p['w']:.1f}, H={p['h']:.1f}, fill={p['fill']}")
