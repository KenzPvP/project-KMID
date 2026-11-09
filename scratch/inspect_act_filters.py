import re

with open('public/images/desainKMID/Hi-fi-design/Activities.svg', 'r', encoding='utf-8') as f:
    content = f.read()

# Look for feGaussianBlur
blurs = re.findall(r'<feGaussianBlur[^>]+>', content)
print("feGaussianBlur elements:", len(blurs))
for b in blurs:
    print("  ", b)

# Look for paths or shapes with filter="url(#...)"
filtered = re.findall(r'<[^>]+filter="url\(#([^"]+)\)"[^>]*>', content)
print("Filtered elements:", len(filtered))
for fe in filtered[:10]:
    print("  ", fe[:100])
