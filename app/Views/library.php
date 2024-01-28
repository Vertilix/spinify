<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/library.css'); ?>">
    <title>Home</title>
</head>

<body>
    <div class="flex">
        <?= view('templates/sidebar'); ?>

        <div class="main">
            <?= view('templates/main-navbar'); ?>

            <div class="main-content">
                <?php if (!isset($playlists)) { ?>
                    <div class="library-text-center">
                        <h1>You don't have a playlist yet</h1>
                        <a href="library/add" class="button">Create one</a>
                    </div>
                <?php } else { ?>
                    <div class="song-grid"> 
                        <?php if(isset($songsArray)) { foreach($songsArray as $song) { ?>
                            <div class="song-card" id="<?= $song->filename ?>" onclick="getSong(this.id, `<?= $song->songname ?>`, `<?= $song->location ?>`);">
                                <img src="data:image/png;base64, <?= base64_encode($song->songpicture ?? "") ?>">
                                <p><?= ($song->username ?? "") . " - " . ($song->songname ?? "") ?></p>
                            </div>
                        <?php } } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>