import xml.etree.ElementTree as ET
import re
import os

def parse_colors_and_gradients(filepath):
    print("==========================================")
    print("FILE:", filepath)
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()
    
    # Extract hex colors
    hex_colors = set(re.findall(r'#[0-9a-fA-F]{3,8}', content))
    print("Hex Colors found:", sorted(list(hex_colors)))
    
    # Extract linear/radial gradients
    tree = ET.parse(filepath)
    root = tree.getroot()
    
    gradients = root.findall('.//{http://www.w3.org/2000/svg}linearGradient') + root.findall('.//{http://www.w3.org/2000/svg}radialGradient')
    print(f"Gradients found: {len(gradients)}")
    for g in gradients:
        gid = g.attrib.get('id')
        stops = g.findall('{http://www.w3.org/2000/svg}stop')
        stop_info = []
        for s in stops:
            stop_info.append(f"offset={s.attrib.get('offset')} color={s.attrib.get('stop-color')} opacity={s.attrib.get('stop-opacity')}")
        print(f"  Gradient id={gid}: {', '.join(stop_info)}")
        
    # Check embedded images
    images = root.findall('.//{http://www.w3.org/2000/svg}image')
    print(f"Embedded images count: {len(images)}")
    for img in images:
        w = img.attrib.get('width')
        h = img.attrib.get('height')
        x = img.attrib.get('x')
        y = img.attrib.get('y')
        print(f"  Image x={x} y={y} w={w} h={h}")

for root_dir, dirs, files in os.walk('public/images/desainKMID'):
    for f in sorted(files):
        if f.endswith('.svg'):
            parse_colors_and_gradients(os.path.join(root_dir, f))
