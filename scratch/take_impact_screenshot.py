import subprocess
import os

chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
out_dir = r'c:\laragon\www\project-kmid\scratch\impact_renders'
os.makedirs(out_dir, exist_ok=True)
out_png = os.path.join(out_dir, 'live_impact_full.png')

cmd = [
    chrome,
    '--headless=new',
    f'--screenshot={out_png}',
    '--window-size=1920,3800',
    '--hide-scrollbars',
    '--no-sandbox',
    'http://127.0.0.1:8008/impact'
]

print("Taking screenshot of live impact page...")
res = subprocess.run(cmd, capture_output=True, text=True, timeout=30)
print("Return code:", res.returncode)
if os.path.exists(out_png):
    print("Screenshot exists! Size:", os.path.getsize(out_png), "bytes")
else:
    print("Screenshot failed to create.")
