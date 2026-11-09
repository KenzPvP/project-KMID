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

all_paths = list(root.iter('{http://www.w3.org/2000/svg}path'))

for name, p_idx in title_paths.items():
    path_elem = all_paths[p_idx]
    fill_attr = path_elem.attrib.get('fill', '')
    grad_id = fill_attr.replace('url(#', '').replace(')', '')
    print(f"Title {name} (path {p_idx}): fill={fill_attr}")
    for grad in root.iter('{http://www.w3.org/2000/svg}linearGradient'):
        if grad.attrib.get('id') == grad_id:
            print(f"  Gradient {grad_id}:", grad.attrib)
            for stop in grad:
                print("    Stop:", stop.attrib)
