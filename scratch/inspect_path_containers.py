import xml.etree.ElementTree as ET

with open('public/images/desainKMID/Hi-fi-design/Landing Page.svg', 'r', encoding='utf-8') as f:
    content = f.read()

root = ET.fromstring(content)

target_indices = {17, 137, 128, 85}

all_paths = list(root.iter('{http://www.w3.org/2000/svg}path'))

# We want to trace parent elements for each target path
# Since ElementTree doesn't store parent pointers by default, build a parent map
parent_map = {c: p for p in root.iter() for c in p}

for idx in target_indices:
    path = all_paths[idx]
    print(f"\n=================== Path Index {idx} ===================")
    print("Path attribs:", path.attrib)
    
    # Trace parents
    curr = path
    chain = []
    while curr in parent_map:
        curr = parent_map[curr]
        chain.append((curr.tag.split('}')[-1], curr.attrib))
        
    for tag, attrs in reversed(chain):
        print(f"  Parent <{tag}>:", attrs)
