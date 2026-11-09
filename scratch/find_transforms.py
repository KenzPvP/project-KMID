import re
import xml.etree.ElementTree as ET

svg_path = 'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Let's search for any transform= attribute in the SVG
transforms = re.findall(r'<g[^>]*transform="([^"]+)"[^>]*>', content)
print("Transforms found:", len(transforms))
for t in transforms[:30]:
    print("  Transform:", t)

# Also check for filters and clip-paths
# And let's find all path elements that have d_len > 1000
long_paths = re.findall(r'<path[^>]*d="([^"]+)"[^>]*fill="([^"]+)"', content)
print("\nLong paths (>1000 chars):")
for i, (d, fill) in enumerate(long_paths):
    if len(d) > 1000:
        print(f"  Path {i}: fill={fill}, len={len(d)}")
