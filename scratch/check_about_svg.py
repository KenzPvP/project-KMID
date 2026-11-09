import re

with open(r'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\About.svg', 'r', encoding='utf-8') as f:
    content = f.read(3000)

m = re.search(r'viewBox="([^"]+)"', content)
print('viewBox:', m.group(1) if m else 'NOT FOUND')

m2 = re.search(r'<svg[^>]*width="(\d+)"', content)
print('width:', m2.group(1) if m2 else 'NOT FOUND')

m3 = re.search(r'<svg[^>]*height="(\d+)"', content)
print('height:', m3.group(1) if m3 else 'NOT FOUND')

print()
print('First 1500 chars:')
print(content[:1500])
