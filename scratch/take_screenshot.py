import subprocess
import os

chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
out_dir = r'c:\laragon\www\project-kmid\scratch\activities_renders'
os.makedirs(out_dir, exist_ok=True)
out_png = os.path.join(out_dir, 'live_activities_full.png')

cmd = [
    chrome,
    '--headless=new',
    f'--screenshot={out_png}',
    '--window-size=1920,4920',
    '--hide-scrollbars',
    '--no-sandbox',
    'http://127.0.0.1:8008/activities'
]

print("Taking screenshot of live activities page...")
res = subprocess.run(cmd, capture_output=True, text=True, timeout=30)
print("Return code:", res.returncode)
print("Stderr:", res.stderr[:300])
if os.path.exists(out_png):
    print("Screenshot exists! Size:", os.path.getsize(out_png), "bytes")
else:
    print("Screenshot failed to create.")
