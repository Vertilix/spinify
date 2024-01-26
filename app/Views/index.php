<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <title>Home</title>
</head>

<body>
    <div class="flex">
        <div class="sidebar">
            <div class="navbar">
                <div>
                    <img class="nav-logo" src="<?php echo base_url('assets/media/svgs/spinify.svg'); ?>" alt="">
                </div>
                <a href="#" class="nav-a-hover">
                    <div>
                        <img src="<?php echo base_url('assets/media/svgs/home.svg'); ?>" width="35" height="35">
                        <p>Home</p>
                    </div>
                </a>
                <a href="#" class="nav-a-hover">
                    <div>
                        <img src="<?php echo base_url('assets/media/svgs/search.svg'); ?>" width="35" height="35">
                        <p>Search</p>
                    </div>
                </a>
            </div>
            <div class="library">
                <div class="lib-top">
                    <a href="#" class="nav-a-hover">
                        <div class="library-flex">
                            <img src="<?php echo base_url('assets/media/svgs/library.svg'); ?>" width="35" height="35">
                            <p>Library</p>
                        </div>
                    </a>
                    <a href="#" class="nav-a-hover">+</a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-top">
                <form class="main-search" method="POST">
                    <input type="image" src="<?php echo base_url('assets/media/svgs/search.svg'); ?>" width="20" height="20" value="Search">
                    <input type="text" placeholder="What do you want to listen to?" class="main-search-text">
                </form>

                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['role'] != 'guest') { ?>
                        <a href="#" class="nav-a-hover">Upload</a>
                        <a href="#" class="nav-a-hover">Support</a>
                        <a href="#" class="nav-a-hover">Premium</a>
                        <a href="#" class="nav-a-hover main-border-right">Download</a>
                        <a href="#" class="nav-a-hover">Profile</a>
                        <a href="/logout" class="nav-a-hover-login">Logout</a>
                    <?php } else { ?>
                        <a href="#" class="nav-a-hover">Support</a>
                        <a href="#" class="nav-a-hover">Premium</a>
                        <a href="#" class="nav-a-hover main-border-right">Download</a>
                        <a href="#" class="nav-a-hover">Profile</a>
                        <a href="/logout" class="nav-a-hover-login">Logout</a>
                    <?php }
                } else { ?>
                    <a href="#" class="nav-a-hover">Support</a>
                    <a href="#" class="nav-a-hover">Premium</a>
                    <a href="#" class="nav-a-hover main-border-right">Download</a>
                    <a href="/register" class="nav-a-hover">Sign Up</a>
                    <a href="/login" class="nav-a-hover-login">Log in</a>
                <?php } ?>
            </div>

            <div class="main-content">

            </div>
        </div>
    </div>

</body>

</html>