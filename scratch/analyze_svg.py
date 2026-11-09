import xml.etree.ElementTree as ET
import os

def analyze_svg(filepath):
    print("=== Analyzing:", filepath, "===")
    tree = ET.parse(filepath)
    root = tree.getroot()
    ns = {'svg': 'http://www.w3.org/2000/svg'}
    
    # Print root attrs
    print("Root attributes:", root.attrib)
    
    # Find all text elements
    texts = root.findall('.//svg:text', ns)
    if not texts:
        texts = root.findall('.//text')
    print(f"Total text elements: {len(texts)}")
    for t in texts:
        t_str = "".join(t.itertext()).strip()
        if t_str:
            font_size = t.attrib.get('font-size') or t.attrib.get('style')
            fill = t.attrib.get('fill')
            font_family = t.attrib.get('font-family')
            font_weight = t.attrib.get('font-weight')
            print(f"  Text: '{t_str}' | font-size={font_size} | font-family={font_family} | font-weight={font_weight} | fill={fill} | x={t.attrib.get('x')} y={t.attrib.get('y')}")

analyze_svg('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
