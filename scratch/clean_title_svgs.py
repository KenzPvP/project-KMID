import xml.etree.ElementTree as ET
import os

def clean_title(name, min_y, max_y, min_x, max_x, width, height):
    tree = ET.parse('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
    root = tree.getroot()
    
    # We want to extract paths that are inside the bounding box and are filled with blue
    paths = root.findall('.//{http://www.w3.org/2000/svg}path')
    
    new_svg = f'''<svg width="{width}" height="{height}" viewBox="0 0 {width} {height}" fill="none" xmlns="http://www.w3.org/2000/svg">'''
    
    # Group with translate to offset from original coordinates
    new_svg += f'''<g transform="translate(-{min_x}, -{min_y})">'''
    
    count = 0
    for p in paths:
        fill = p.attrib.get('fill', '')
        d = p.attrib.get('d', '')
        # Check if blue fill or part of text
        if fill in ['#004ADA', '#004ada', '#003FBA', '#0C5EFF', 'white', '#FEA515']:
            # Simple check on d attribute or bbox
            new_svg += ET.tostring(p, encoding='unicode')
            count += 1
            
    new_svg += '''</g></svg>'''
    
    with open(f'public/images/desainKMID/titles/{name}.svg', 'w', encoding='utf-8') as out:
        out.write(new_svg)
    print(f'Cleaned {name}.svg with {count} paths')

# Let's inspect paths around section titles
print("Extracting clean titles...")
