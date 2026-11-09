import re
import os

files = [
    'public/images/desainKMID/designSystem/Design System - Typography.svg',
    'public/images/desainKMID/tokenPreview/Typography System.svg',
    'public/images/desainKMID/styleGuide/Color Export Sheet.svg',
]

# In Figma SVG exports, sometimes font names are in the path or comments or metadata or clip-path names
for fpath in files:
    if os.path.exists(fpath):
        with open(fpath, 'r', encoding='utf-8') as f:
            c = f.read()
        print(fpath, len(c))
        # Search for words followed by "Regular" or "Bold" or "Medium" or "Semibold" or "Heading"
        matches = re.findall(r'([A-Za-z0-9\s]+(?:Bold|Regular|Medium|SemiBold|Semi Bold|Light|Black))', c)
        clean_m = set(m.strip() for m in matches if len(m.strip()) < 40)
        print("Font weight matches:", list(clean_m)[:15])
