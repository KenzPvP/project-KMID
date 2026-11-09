import xml.etree.ElementTree as ET
import os

def inspect_svg(filepath):
    print("==========================================")
    print("FILE:", filepath)
    tree = ET.parse(filepath)
    root = tree.getroot()
    print("Root tag:", root.tag, "Attribs:", root.attrib)
    
    # Check direct children and g tags with id
    g_with_ids = []
    for elem in root.iter():
        tag = elem.tag.split('}')[-1]
        elem_id = elem.attrib.get('id')
        if elem_id:
            g_with_ids.append((tag, elem_id, elem.attrib))
            
    print(f"Elements with ID (total {len(g_with_ids)}):")
    for tag, elem_id, attrib in g_with_ids[:40]:
        print(f"  <{tag} id='{elem_id}'> attribs={attrib}")

for root_dir, dirs, files in os.walk('public/images/desainKMID'):
    for f in files:
        if f.endswith('.svg'):
            inspect_svg(os.path.join(root_dir, f))
