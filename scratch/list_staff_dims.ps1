Add-Type -AssemblyName System.Drawing
$dir = (Resolve-Path 'public/images/desainKMID/staff').Path

Get-ChildItem $dir -Filter *.png | ForEach-Object {
    $img = [System.Drawing.Image]::FromFile($_.FullName)
    [PSCustomObject]@{
        Name = $_.Name
        Width = $img.Width
        Height = $img.Height
        SizeKB = [math]::Round($_.Length / 1KB, 1)
    }
    $img.Dispose()
} | Sort-Object -Property Width -Descending | Format-Table -AutoSize
