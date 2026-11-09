import xml.etree.ElementTree as ET
import os

for f in sorted(os.listdir('public/images/desainKMID/Hi-fi-design')):
    if f.endswith('.svg'):
        path = os.path.join('public/images/desainKMID/Hi-fi-design', f)
        tree = ET.parse(path)
        root = tree.getroot()
        print(f"File: {f} -> width={root.attrib.get('width')} height={root.attrib.get('height')} viewBox={root.attrib.get('viewBox')}")
