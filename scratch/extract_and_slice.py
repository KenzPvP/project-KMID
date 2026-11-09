import base64
import os
import re
from PIL import Image

svg_path = r'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\About.svg'
with open(svg_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Extract embedded image
match = re.search(r'xlink:href="(data:image/([^;]+);base64,([^"]+))"', content)
if match:
    ext = match.group(2)
    b64data = match.group(3)
    out_img = f'c:/laragon/www/project-kmid/public/images/desainKMID/Hi-fi-design/about_hero_building.{ext}'
    with open(out_img, 'wb') as f_img:
        f_img.write(base64.b64decode(b64data))
    print(f'Extracted embedded image: {out_img} ({os.path.getsize(out_img)} bytes)')

# Also let's inspect user uploaded image
user_img_path = r'C:/Users/ASUS/.gemini/antigravity/brain/446c1fca-b512-48f9-9b1a-e554e8e24a33/.user_uploaded/media_1790834456025.png'
img = Image.open(user_img_path)
print('User image size:', img.size)

os.makedirs('c:/laragon/www/project-kmid/scratch/renders', exist_ok=True)
# Let's crop into distinct sections so we can view and read every text and component accurately
w, h = img.size
# Section 1: Header + Hero (0 to 18%)
img.crop((0, 0, w, int(h * 0.18))).save('c:/laragon/www/project-kmid/scratch/renders/crop1_hero.png')
# Section 2: Riset Terapan & Blue Card + 4 Feature points (17% to 35%)
img.crop((0, int(h * 0.17), w, int(h * 0.35))).save('c:/laragon/www/project-kmid/scratch/renders/crop2_riset.png')
# Section 3: Sejarah KMID (timeline + 3 cards) (34% to 52%)
img.crop((0, int(h * 0.34), w, int(h * 0.53))).save('c:/laragon/www/project-kmid/scratch/renders/crop3_sejarah.png')
# Section 4: Visi & Misi (52% to 66%)
img.crop((0, int(h * 0.52), w, int(h * 0.66))).save('c:/laragon/www/project-kmid/scratch/renders/crop4_visi_misi.png')
# Section 5: Struktur Kepengurusan - Dewan Pembina & BPH (65% to 82%)
img.crop((0, int(h * 0.65), w, int(h * 0.83))).save('c:/laragon/www/project-kmid/scratch/renders/crop5_bph.png')
# Section 6: Struktur Kepengurusan - Kepala Divisi (81% to 92%)
img.crop((0, int(h * 0.81), w, int(h * 0.93))).save('c:/laragon/www/project-kmid/scratch/renders/crop6_kadiv.png')
# Section 7: Footer (92% to 100%)
img.crop((0, int(h * 0.92), w, h)).save('c:/laragon/www/project-kmid/scratch/renders/crop7_footer.png')

print('Cropped sections saved!')
