import re
import os

svg_path = r'public/images/desainKMID/Hi-fi-design/About.svg'

with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

print('Length of About.svg:', len(content))

# Look for text elements or any text inside svg
texts = re.findall(r'<text[^>]*>(.*?)</text>', content, re.DOTALL)
print('Number of <text> elements:', len(texts))
if texts:
    for t in texts:
        clean = re.sub(r'<[^>]+>', '', t).strip()
        if clean:
            print('Text:', clean)

# Check for embedded images (base64 or xlink:href)
images = re.findall(r'<image[^>]*xlink:href="([^"]+)"[^>]*>', content)
print('Number of <image> with xlink:href:', len(images))
for i, img in enumerate(images):
    if img.startswith('data:'):
        print(f'Image {i}: data uri (len={len(img)})')
    else:
        print(f'Image {i}: {img}')

# Search for any string that looks like english or indonesian text in the SVG
# Sometimes figma puts text in aria-label, title, or id
words = re.findall(r'id="([^"]+)"', content)
print('Unique IDs count:', len(words))
interesting_ids = [w for w in words if not re.match(r'^(clip|paint|filter|pattern|path)\d+', w)]
print('Interesting IDs:', interesting_ids[:50])
