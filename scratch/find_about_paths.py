import xml.etree.ElementTree as ET
import re

svg_path = 'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Let's find all path elements and their bounding boxes or d attributes
paths = re.findall(r'<path[^>]*d="([^"]+)"[^>]*fill="([^"]+)"', content)
print(f"Total paths with fill: {len(paths)}")

# Also look for fill colors
fills = set(p[1] for p in paths)
print("Fill values:", fills)

# Search for paths with fill="#004ADA" or fill="#0C5EFF" or linear gradient or white
# The titles:
# "Sejarah KMID" is blue #004ADA or similar
# "Visi & Misi" is white inside the blue section
# "Struktur Kepengurusan" is blue #004ADA or similar
