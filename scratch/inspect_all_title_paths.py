import re
import xml.etree.ElementTree as ET

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    content = f.read()

root = ET.fromstring(content)

paths = []
for idx, path in enumerate(root.iter('{http://www.w3.org/2000/svg}path')):
    d = path.attrib.get('d', '')
    fill = path.attrib.get('fill', '')
    
    # Parse d
    nums = [float(n) for n in re.findall(r'[-+]?\d*\.\d+|\d+', d)]
    if len(nums) >= 4:
        xs = nums[0::2]
        ys = nums[1::2]
        min_x, max_x = min(xs), max(xs)
        min_y, max_y = min(ys), max(ys)
        w = max_x - min_x
        h = max_y - min_y
        
        # We are looking for title text paths:
        # Typical title widths: 150 to 500
        # Typical title heights: 30 to 120
        if 150 <= w <= 550 and 25 <= h <= 120:
            paths.append({
                'idx': idx,
                'fill': fill,
                'min_x': min_x, 'max_x': max_x,
                'min_y': min_y, 'max_y': max_y,
                'w': w, 'h': h,
                'd_sample': d[:50]
            })

print(f"Candidate Title Paths count: {len(paths)}")
for p in paths:
    print(f"Path idx={p['idx']:3d}: Y=[{p['min_y']:6.1f}, {p['max_y']:6.1f}], X=[{p['min_x']:6.1f}, {p['max_x']:6.1f}], W={p['w']:5.1f}, H={p['h']:4.1f}, fill={p['fill']}")
