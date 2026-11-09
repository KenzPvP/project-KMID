import xml.etree.ElementTree as ET

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    content = f.read()

root = ET.fromstring(content)

# 1. Search for all text elements
texts = root.findall('.//{http://www.w3.org/2000/svg}text')
print(f"Total <text> elements: {len(texts)}")
for t in texts:
    txt_content = ''.join(t.itertext())
    print(f"Text: '{txt_content}', attribs: {t.attrib}")

# 2. Search for all g elements with id or clip-path
groups = root.findall('.//{http://www.w3.org/2000/svg}g')
print(f"\nTotal <g> elements: {len(groups)}")
for g in groups[:20]:
    gid = g.attrib.get('id', '')
    if gid:
        print(f"Group ID: {gid}")
