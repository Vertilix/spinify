<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/navbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/form.css'); ?>">
    <title>Upload</title>
</head>
<body>

<div class="main">
        <div class="main-content">
            <form method="POST" enctype="multipart/form-data" class="upload-form">
                <h1>Upload a song</h1>

                <div class="form-inputs">
                    <label for="songFile">Audio file (.mp3 only)</label>
                    <input type="file" name="songFile" class="input-text input-file" accept=".mp3" value="<?= set_value('songFile') ?>">
                    
                    <label for="songFile">Song picture (.png / .jpeg / .jpg)</label>
                    <img id="preview-image" class="input-text centered" style="justify-self:center; display:none" src="" width="200" height="200">
                    <input type="file" id="file-selector" name="songPicture" class="input-text input-file" accept="image/png, image/jpg, image/jpeg" value="<?= set_value('songPicture') ?>">

                    <label for="songName">Song name</label>
                    <input type="text" name="songName" class="input-text" value="<?= set_value('songName') ?>">
                    
                    <label for="songDesc">Song description</label>
                    <input type="text" name="songDesc" class="input-text" value="<?= set_value('songDesc') ?>">
                </div>

                <p class="error" id="status"><?= session()->getFlashdata('error') ?? ""; ?></p>
                <p class="success"><?= session()->getFlashdata('success') ?? ""; ?></p>

                <input class="submit-button" type="submit" value="Upload">
            </form>
        </div>
    </div>

    <script>
        const status = document.getElementById('status');
        const output = document.getElementById('preview-image');
        if (window.FileList && window.File && window.FileReader) {
            document.getElementById('file-selector').addEventListener('change', event => {
                output.src = '';
                status.textContent = '';
                const file = event.target.files[0];
                if (!file.type) {
                    status.textContent = 'The file you are trying to upload is not a photo';
                    return;
                }
                if (!file.type.match('image.*')) {
                    status.textContent = 'The file you are trying to upload is not a photo';
                    return;
                }
                const reader = new FileReader();
                reader.addEventListener('load', event => {
                    output.src = event.target.result;
                    output.style = 'display: block';
                });
                reader.readAsDataURL(file);
            });
        }

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>