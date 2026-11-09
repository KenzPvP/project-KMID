import os
import xml.etree.ElementTree as ET

base_dir = 'public/images/desainKMID'

for root_dir, dirs, files in os.walk(base_dir):
    for f in files:
        if f.endswith('.svg'):
            full_path = os.path.join(root_dir, f)
            try:
                tree = ET.parse(full_path)
                r = tree.getroot()
                text_elems = r.findall('.//{http://www.w3.org/2000/svg}text')
                path_elems = r.findall('.//{http://www.w3.org/2000/svg}path')
                text_contents = [''.join(t.itertext()) for t in text_elems]
                print(f"SVG: {os.path.relpath(full_path, base_dir)}")
                print(f"  Size: {os.path.getsize(full_path)} bytes, Paths: {len(path_elems)}, Texts: {len(text_elems)}")
                if text_contents:
                    print(f"  Text contents: {text_contents[:5]}")
            except Exception as e:
                print(f"Error parsing {full_path}: {e}")
