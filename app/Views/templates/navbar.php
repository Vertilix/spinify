<div class="navbar">
    <h1 class="logo" style="color: #FFFFFF;">Spinify</h1>
    <a class="item" href="">Premium</a>
    <a class="item" href="">Download</a>
    <?php if(!isset($_SESSION['user'])) { ?>
        <a href="/login" class="item">Login</a>
        <a href="/register" class="item">Sign up</a>
    <?php } else { ?>
        <a href="/logout" class="item">Logout</a>
    <?php } ?>
</div>