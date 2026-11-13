import shutil
import os

src_dir = r'C:\laragon\www\project-kmid\scratch\kmid_ui_5'
dest_dir = r'C:\laragon\www\project-kmid\public\images\desainKMID\staff'

os.makedirs(dest_dir, exist_ok=True)
for f in os.listdir(src_dir):
    shutil.copy2(os.path.join(src_dir, f), os.path.join(dest_dir, f))

print(f"Copied {len(os.listdir(dest_dir))} files to {dest_dir}")
