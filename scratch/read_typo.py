import re

for p in ['public/images/desainKMID/designSystem/Design System - Typography.svg', 'public/images/desainKMID/tokenPreview/Typography System.svg']:
    try:
        with open(p, 'r', encoding='utf-8') as f:
            content = f.read()
        fonts = re.findall(r'font-family="([^"]+)"', content)
        print(p, 'fonts:', set(fonts))
    except Exception as e:
        print(p, e)
