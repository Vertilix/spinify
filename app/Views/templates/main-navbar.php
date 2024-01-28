<div class="main-top">
    <form class="main-search" method="POST">
        <input type="image" src="<?= base_url('assets/media/svgs/search.svg') ?>" width="20" height="20" value="Search">
        <input type="text" placeholder="What do you want to listen to?" class="main-search-text">
    </form>

    <?php if (isset($_SESSION['user'])) { ?>
        <?php if ($_SESSION['user']['role'] != 'guest') { ?>
            <a href="/upload" class="nav-a-hover">Upload</a>
        <?php } ?>
        <a href="#" class="nav-a-hover">Support</a>
        <a href="#" class="nav-a-hover">Premium</a>
        <a href="#" class="nav-a-hover main-border-right">Download</a>
        <a href="#" class="nav-a-hover">Profile</a>
        <a href="/logout" class="nav-a-hover-login">Logout</a>
    <?php  } else { ?>
        <a href="#" class="nav-a-hover">Support</a>
        <a href="#" class="nav-a-hover">Premium</a>
        <a href="#" class="nav-a-hover main-border-right">Download</a>
        <a href="/register" class="nav-a-hover">Sign Up</a>
        <a href="/login" class="nav-a-hover-login">Log in</a>
    <?php } ?>
</div>