with open('public/images/desainKMID/Hi-fi-design/About.svg', 'r', encoding='utf-8') as f:
    lines = [f.readline() for _ in range(50)]

for i, l in enumerate(lines):
    print(f"{i}: {l[:120]}")
