import xml.etree.ElementTree as ET

tree = ET.parse('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
root = tree.getroot()

# Search for g tags around y=2300, y=3100, y=4080
for elem in root.iter():
    transform = elem.attrib.get('transform', '')
    cid = elem.attrib.get('id', '')
    # Check if element has fill color #004ADA or paint linear
    fill = elem.attrib.get('fill', '')
    if 'paint' in fill or fill == '#004ADA' or fill == '#004ada':
        # Check parent tags or tag name
        pass

# Let's inspect all path elements in Landing Page.svg that are blue or gradient filled
blue_paths = []
for path in root.findall('.//{http://www.w3.org/2000/svg}path'):
    fill = path.attrib.get('fill')
    d = path.attrib.get('d')
    if fill == '#004ADA' or fill == '#004ada' or fill == 'url(#paint0_linear_0_1)':
        blue_paths.append(path.attrib)

print(f"Total blue paths: {len(blue_paths)}")
