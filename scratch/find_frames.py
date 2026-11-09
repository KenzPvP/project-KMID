import xml.etree.ElementTree as ET

tree = ET.parse('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
root = tree.getroot()

# List top-level groups or direct children of root
for i, child in enumerate(root):
    tag = child.tag.split('}')[-1]
    cid = child.attrib.get('id', '')
    transform = child.attrib.get('transform', '')
    print(f"Child {i}: tag=<{tag}> id='{cid}' attribs={child.attrib}")
