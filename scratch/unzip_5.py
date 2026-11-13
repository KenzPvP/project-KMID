import zipfile
import os

zip_path = r'C:\Users\ASUS\.gemini\antigravity\brain\446c1fca-b512-48f9-9b1a-e554e8e24a33\.user_uploaded\media_1794535148164_ee6d31ab.zip'
out_dir = r'C:\laragon\www\project-kmid\scratch\kmid_ui_5'

os.makedirs(out_dir, exist_ok=True)
with zipfile.ZipFile(zip_path, 'r') as zip_ref:
    zip_ref.extractall(out_dir)

print("Files extracted:")
for root, dirs, files in os.walk(out_dir):
    for f in files:
        full_path = os.path.join(root, f)
        print(os.path.relpath(full_path, out_dir), os.path.getsize(full_path))
