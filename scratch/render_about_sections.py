import subprocess
import os

chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
svg_file = 'file:///c:/laragon/www/project-kmid/public/images/desainKMID/Hi-fi-design/About.svg'
out_dir = r'c:\laragon\www\project-kmid\scratch\renders'
tmp_dir = r'c:\laragon\www\project-kmid\scratch\tmp_html'
os.makedirs(out_dir, exist_ok=True)
os.makedirs(tmp_dir, exist_ok=True)

# About.svg: viewBox="0 0 2265 6717", frame at translate(123, 366), frame 1920x6168
# Frame Y offset = 366, Frame X offset = 123
# Sections (estimated from design image):
# 1. Hero: Y=366 to ~1100 (white bg with blue overlay, hero image)
# 2. Blue section (stats): Y=~1100 to ~2200 (blue bg, stats, text)
# 3. Feature cards: Y=~2200 to ~2600
# 4. Sejarah KMID (History): Y=~2600 to ~3800 (blue bg)
# 5. Photo grid: Y=~3800 to ~4300
# 6. Visi & Misi: Y=~4300 to ~5100 (blue bg)
# 7. Struktur Kepengurusan: Y=~5100 to ~6200
# 8. Footer: Y=~6200 to ~6534

# Crop sections from the SVG
sections = [
    ('about_01_hero',   366, 700),    # Hero section
    ('about_02_blue',   1050, 1200),   # Blue stats section
    ('about_03_cards',  2150, 750),   # Feature cards
    ('about_04_history', 2700, 1200),  # History section
    ('about_05_photos', 3700, 700),   # Photo grid
    ('about_06_visi',   4250, 900),   # Visi & Misi
    ('about_07_struktur', 4950, 1200), # Struktur Kepengurusan
    ('about_08_footer', 6100, 600),    # Footer
]

for name, y_start, height in sections:
    # Create HTML that embeds SVG with specific viewBox crop
    html = f'''<!DOCTYPE html>
<html>
<head><style>html,body{{margin:0;padding:0;overflow:hidden;background:white}}</style></head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
     width="1920" height="{height}" viewBox="123 {y_start} 1920 {height}">
  <image href="{svg_file}" x="0" y="0" width="2265" height="6717"/>
</svg>
</body>
</html>'''
    
    tmp_file = os.path.join(tmp_dir, f'{name}.html')
    with open(tmp_file, 'w', encoding='utf-8') as f:
        f.write(html)
    
    out_png = os.path.join(out_dir, f'{name}.png')
    result = subprocess.run(
        [chrome, '--headless=new', f'--screenshot={out_png}',
         '--window-size=1920,{}'.format(height), '--hide-scrollbars', '--no-sandbox',
         f'file:///{tmp_file.replace(chr(92), "/")}'],
        capture_output=True, text=True, timeout=30
    )
    exists = os.path.exists(out_png)
    size = os.path.getsize(out_png) if exists else 0
    print(f'{name}: {exists}, {size} bytes')

print('Done!')
