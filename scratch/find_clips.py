import xml.etree.ElementTree as ET

tree = ET.parse('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
root = tree.getroot()

for elem in root.iter():
    cid = elem.attrib.get('id')
    if cid and ('Landing' in cid or 'Frame' in cid or 'Navbar' in cid or 'Footer' in cid or 'Hero' in cid or 'About' in cid or 'Program' in cid):
        print(f"Elem: <{elem.tag.split('}')[-1]}> id='{cid}' attribs={elem.attrib}")

# Print clipPaths
for clip in root.findall('.//{http://www.w3.org/2000/svg}clipPath'):
    print("ClipPath:", clip.attrib)
    for child in clip:
        print("  Child:", child.tag.split('}')[-1], child.attrib)
