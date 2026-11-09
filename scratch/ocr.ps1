[Windows.Globalization.Language, Windows.Foundation, ContentType = WindowsRuntime] | Out-Null
[Windows.Graphics.Imaging.BitmapDecoder, Windows.Foundation, ContentType = WindowsRuntime] | Out-Null
[Windows.Media.Ocr.OcrEngine, Windows.Foundation, ContentType = WindowsRuntime] | Out-Null
[Windows.Storage.StorageFile, Windows.Foundation, ContentType = WindowsRuntime] | Out-Null

function Get-OcrText($path) {
    $absPath = (Resolve-Path $path).Path
    $fileTask = [Windows.Storage.StorageFile]::GetFileFromPathAsync($absPath)
    $asTaskMethod = [System.WindowsRuntimeSystemExtensions].GetMethods() | Where-Object { 
        $_.Name -eq 'AsTask' -and $_.GetParameters().Count -eq 1 -and $_.GetParameters()[0].ParameterType.Name -match 'IAsyncOperation'
    } | Select-Object -First 1
    
    $file = $asTaskMethod.MakeGenericMethod([Windows.Storage.StorageFile]).Invoke($null, @($fileTask)).Result
    $stream = $asTaskMethod.MakeGenericMethod([Windows.Storage.Streams.IRandomAccessStream]).Invoke($null, @($file.OpenAsync([Windows.Storage.FileAccessMode]::Read))).Result
    $decoder = $asTaskMethod.MakeGenericMethod([Windows.Graphics.Imaging.BitmapDecoder]).Invoke($null, @([Windows.Graphics.Imaging.BitmapDecoder]::CreateAsync($stream))).Result
    $bitmap = $asTaskMethod.MakeGenericMethod([Windows.Graphics.Imaging.SoftwareBitmap]).Invoke($null, @($decoder.GetSoftwareBitmapAsync())).Result
    
    $engine = [Windows.Media.Ocr.OcrEngine]::TryCreateFromLanguage([Windows.Globalization.Language]::new('id'))
    if (-not $engine) {
        $engine = [Windows.Media.Ocr.OcrEngine]::TryCreateFromUserProfileLanguages()
    }
    $ocrResult = $asTaskMethod.MakeGenericMethod([Windows.Media.Ocr.OcrResult]).Invoke($null, @($engine.RecognizeAsync($bitmap))).Result
    return $ocrResult.Text
}

Get-OcrText 'public/images/desainKMID/admin/Edit Galeri Aktivitas.png'
