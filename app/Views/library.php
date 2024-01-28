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
                    <div class="libary-center">
                        <h1>You don't have a playlist yet</h1>
                        <a href="library/add" class="button">Create one</a>
                    </div>
                <?php } ?>
                <div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>