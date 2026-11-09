import xml.etree.ElementTree as ET
import os

tree = ET.parse('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
root = tree.getroot()

# Find all g tags and check if they contain title paths or text
for elem in root.iter():
    gid = elem.attrib.get('id', '')
    if any(k in gid.lower() for k in ['tentang', 'program', 'achievment', 'faq', 'title', 'heading', 'text', 'logo']):
        print(f"Found element: id='{gid}' tag=<{elem.tag.split('}')[-1]}>")
