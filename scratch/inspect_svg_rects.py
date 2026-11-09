with open('public/images/desainKMID/Hi-fi-design/About.svg', 'r', encoding='utf-8') as f:
    content = f.read()

import re
rects = re.findall(r'<rect[^>]+>', content)
print(f"Total rects: {len(rects)}")
for r in rects[:25]:
    print(" ", r[:120])

filters = re.findall(r'<filter[^>]+id="([^"]+)"', content)
print(f"Total filters: {len(filters)}")
for fil in filters:
    print("  filter:", fil)
