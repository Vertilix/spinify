<div class="nav-container">
    <div class="navbar">
        <div class="nav-brand">
            <a href="index.php" class="nav-tab">Spinify</a>
        </div>
        <div class="nav-tabs">
            <form class="nav-search nav-search-tab" method="POST" action="<?= base_url('navSearch'); ?>">
                <input type="text" name="navSearchText" placeholder="Search for song">
                <input type="submit" name="navSearch">
            </form>
            <?php if (!isset($_SESSION['user'])) { ?>
                <a href="/login" class="nav-tab">Login</a>
                <a href="/register" class="nav-tab">Sign up</a>
            <?php } else { ?>
                <a href="index.php" class="nav-tab">Download</a>
                <a href="index.php" class="nav-tab">Premium</a>
                <a href="/logout" class="nav-tab">Logout</a>
            <?php } ?>
        </div>
    </div>
</div>