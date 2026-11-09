import subprocess
import os

chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
svg_file = r'c:\laragon\www\project-kmid\public\images\desainKMID\Hi-fi-design\About.svg'
out_dir = r'c:\laragon\www\project-kmid\scratch\renders'
os.makedirs(out_dir, exist_ok=True)

out_png = os.path.join(out_dir, 'About_full.png')

result = subprocess.run(
    [chrome, '--headless=new', f'--screenshot={out_png}',
     '--window-size=1920,6000', '--hide-scrollbars', '--no-sandbox',
     f'file:///{svg_file.replace(chr(92), "/")}'],
    capture_output=True, text=True, timeout=30, cwd=out_dir
)
print(f"Return code: {result.returncode}")
print(f"Stderr: {result.stderr[:500]}")
print(f"File exists: {os.path.exists(out_png)}")
if os.path.exists(out_png):
    print(f"Size: {os.path.getsize(out_png)} bytes")
