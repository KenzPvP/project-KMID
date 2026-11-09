import re

svg_path = 'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Find all path tags
matches = re.finditer(r'<path[^>]*d="([^"]+)"[^>]*fill="([^"]+)"', content)

def get_bbox(d):
    # extract all numbers that look like coordinates
    nums = [float(x) for x in re.findall(r'[-+]?\d*\.?\d+(?:[eE][-+]?\d+)?', d)]
    # pairs roughly
    if len(nums) >= 2:
        xs = nums[0::2]
        ys = nums[1::2]
        return min(xs), max(xs), min(ys), max(ys)
    return 0, 0, 0, 0

print("Paths matching title colors (#004ADA, white, #00297A, etc.):")
for i, m in enumerate(matches):
    d = m.group(1)
    fill = m.group(2)
    min_x, max_x, min_y, max_y = get_bbox(d)
    w = max_x - min_x
    h = max_y - min_y
    if fill in ['#004ADA', 'white', '#0C5EFF', '#5B92FF'] or 'paint' in fill:
        # Check if it has aspect ratio and size of a title or significant element
        if 40 < h < 200 and 150 < w < 1200:
            print(f"Path {i}: fill={fill}, bbox: X=({min_x:.1f} .. {max_x:.1f}, W={w:.1f}) Y=({min_y:.1f} .. {max_y:.1f}, H={h:.1f}), d_len={len(d)}")
