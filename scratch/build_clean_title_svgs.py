import re
import xml.etree.ElementTree as ET

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    content = f.read()

root = ET.fromstring(content)

title_paths = {
    'title_tentang_kmid': 17,
    'title_programs': 137,
    'title_achievments': 128,
    'title_faqs': 85
}

# Find all linearGradient elements in defs
gradients = {}
for grad in root.iter('{http://www.w3.org/2000/svg}linearGradient'):
    gid = grad.attrib.get('id', '')
    raw_grad = ET.tostring(grad, encoding='utf-8').decode('utf-8')
    gradients[gid] = raw_grad

all_paths = list(root.iter('{http://www.w3.org/2000/svg}path'))

for name, p_idx in title_paths.items():
    path_elem = all_paths[p_idx]
    fill_attr = path_elem.attrib.get('fill', '')
    grad_id = fill_attr.replace('url(#', '').replace(')', '')
    
    # Calculate exact bounding box of this path
    d = path_elem.attrib.get('d', '')
    numbers = [float(n) for n in re.findall(r'[-+]?\d*\.\d+|\d+', d)]
    xs = numbers[0::2]
    ys = numbers[1::2]
    min_x, max_x = min(xs), max(xs)
    min_y, max_y = min(ys), max(ys)
    w = max_x - min_x
    h = max_y - min_y
    
    grad_xml = gradients.get(grad_id, '')
    path_xml = ET.tostring(path_elem, encoding='utf-8').decode('utf-8')
    
    # Build clean standalone SVG
    clean_svg = f'''<svg width="{w:.2f}" height="{h:.2f}" viewBox="{min_x:.2f} {min_y:.2f} {w:.2f} {h:.2f}" fill="none" xmlns="http://www.w3.org/2000/svg">
<defs>
{grad_xml}
</defs>
{path_xml}
</svg>'''

    out_path = f'public/images/desainKMID/titles/{name}.svg'
    with open(out_path, 'w', encoding='utf-8') as out_f:
        out_f.write(clean_svg)
        
    print(f"Created {out_path} ({len(clean_svg)} bytes, size {w:.1f}x{h:.1f})")
