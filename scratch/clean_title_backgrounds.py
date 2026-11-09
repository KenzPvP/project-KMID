import xml.etree.ElementTree as ET
import os

titles = ['title_tentang_kmid', 'title_programs', 'title_achievments', 'title_faqs']

for name in titles:
    filepath = f'public/images/desainKMID/titles/{name}.svg'
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Parse XML
    tree = ET.parse(filepath)
    root = tree.getroot()
    
    # Remove large background rects / grey canvas paths
    # Background rect has width="1920" height="4976" or fill="#444444"
    for elem in list(root.iter()):
        fill = elem.attrib.get('fill', '')
        w = elem.attrib.get('width', '')
        h = elem.attrib.get('height', '')
        
        # Remove canvas fill rects or outer border paths
        if fill == '#444444' or (w == '1920' and h == '4976'):
            # Find parent and remove
            for parent in root.iter():
                if elem in parent:
                    parent.remove(elem)
                    print(f"Removed background element from {name}")
                    
    tree.write(filepath, encoding='utf-8', xml_declaration=True)

print("Title SVGs background cleanup complete!")
