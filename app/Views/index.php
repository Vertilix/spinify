<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <title>Home</title>
</head>

<body>
    <div class="flex">
        <?= view('templates/sidebar'); ?>

        <div class="main">
            <?= view('templates/main-navbar'); ?>

            <div class="main-content">
                <div class="song-grid"> 
                    <?php if(isset($songsArray)) { foreach($songsArray as $song) { ?>
                        <div class="song-card" id="<?= $song->filename ?>" onclick="getSong(this.id, `<?= $song->songname ?>`, `<?= $song->location ?>`);">
                            <img src="data:image/png;base64, <?= base64_encode($song->songpicture ?? "") ?>">
                            <p><?= ($song->username ?? "") . " - " . ($song->songname ?? "") ?></p>
                        </div>
                    <?php } } ?>
                </div>
            </div>

            <div class="content-player-container">
                <h1 id="title">Select a song to start playing music</h1>
                <div class="content-player">
                    <audio id="audio" controls>
                        <source id="player" src="" type="audio/mp3">
                    </audio>
                </div>
            </div>
        </div>
    </div>

<script>
    const player = document.getElementById('player');
    const title = document.getElementById('title');
    function getSong(filename, songname, songlocation) {
        title.innerHTML = songname;

        player.src = "<?= base_url() ?>" + songlocation + filename;
        player.parentNode.load();
        player.parentNode.play();
    }
</script>

</body>

</html>