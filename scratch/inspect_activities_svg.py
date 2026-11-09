import re

svg_path = r'public/images/desainKMID/Hi-fi-design/Activities.svg'
with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

print("File size:", len(content))

# Look for <text> elements
texts = re.findall(r'<text[^>]*>(.*?)</text>', content, re.DOTALL)
print(f"Total <text> elements: {len(texts)}")
if texts:
    for t in texts:
        clean = re.sub(r'<[^>]+>', '', t).strip()
        if clean:
            print("  Text:", clean)

# If texts are converted to paths in Figma, let's look at all id attributes or aria-labels
ids = re.findall(r'id="([^"]+)"', content)
print(f"Total IDs: {len(ids)}")
unique_non_standard = [i for i in ids if not re.match(r'^(clip|paint|filter|pattern|path|image)\d+', i)]
print("Non standard IDs:", unique_non_standard[:50])

# Check viewBox and width/height
m_vb = re.search(r'viewBox="([^"]+)"', content)
print("viewBox:", m_vb.group(1) if m_vb else "None")
m_w = re.search(r'width="([^"]+)"', content)
m_h = re.search(r'height="([^"]+)"', content)
print(f"width={m_w.group(1) if m_w else '?'}, height={m_h.group(1) if m_h else '?'}")
