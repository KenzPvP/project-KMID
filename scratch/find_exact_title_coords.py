import xml.etree.ElementTree as ET
import re

tree = ET.parse('public/images/desainKMID/Hi-fi-design/Landing Page.svg')
root = tree.getroot()

# Let's inspect all paths around y=1400..1550 (Tentang KMID), y=2300..2400 (Programs), y=3050..3200 (Achievments), y=4000..4150 (FAQ'S)
# Print path coordinates or inspect group elements

for elem in root.iter():
    cid = elem.attrib.get('id', '')
    fill = elem.attrib.get('fill', '')
    d = elem.attrib.get('d', '')
    
    # Check if element has d attribute
    if d and len(d) > 20:
        # Extract numbers from path d string to find min_x, max_x, min_y, max_y
        numbers = [float(n) for n in re.findall(r'[-+]?\d*\.\d+|\d+', d)]
        if numbers:
            xs = numbers[0::2]
            ys = numbers[1::2]
            if xs and ys:
                min_x, max_x = min(xs), max(xs)
                min_y, max_y = min(ys), max(ys)
                
                # Check ranges of interest
                if 1400 <= min_y <= 1600 and 800 <= min_x <= 1500:
                    print(f"Tentang Path: fill={fill} min_x={min_x:.1f} max_x={max_x:.1f} min_y={min_y:.1f} max_y={max_y:.1f}")
                elif 2250 <= min_y <= 2400 and 800 <= min_x <= 1500:
                    print(f"Programs Path: fill={fill} min_x={min_x:.1f} max_x={max_x:.1f} min_y={min_y:.1f} max_y={max_y:.1f}")
                elif 3050 <= min_y <= 3200 and 800 <= min_x <= 1500:
                    print(f"Achievments Path: fill={fill} min_x={min_x:.1f} max_x={max_x:.1f} min_y={min_y:.1f} max_y={max_y:.1f}")
                elif 4000 <= min_y <= 4150 and 800 <= min_x <= 1500:
                    print(f"FAQ Path: fill={fill} min_x={min_x:.1f} max_x={max_x:.1f} min_y={min_y:.1f} max_y={max_y:.1f}")
