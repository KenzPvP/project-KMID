import base64
import os
import re

svg_path = r'public/images/desainKMID/Hi-fi-design/Activities.svg'
with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

images = re.findall(r'xlink:href="(data:image/([^;]+);base64,([^"]+))"', content)
print(f"Total embedded images in Activities.svg: {len(images)}")

for i, (full, ext, b64) in enumerate(images):
    out_name = f'public/images/desainKMID/Hi-fi-design/activity_img_{i}.{ext}'
    data = base64.b64decode(b64)
    with open(out_name, 'wb') as f_out:
        f_out.write(data)
    print(f"Saved {out_name}: {len(data)} bytes")
