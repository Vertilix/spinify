<div class="navbar">
    <h1 class="logo" style="color: #FFFFFF;">Spinify</h1>
    <a class="item" href="">Premium</a>
    <a class="item" href="">Download</a>
    <a class="item" href="">Support</a>
    <?php if(!isset($_SESSION['user'])) { ?>
        <a href="/login" class="item" style="padding-left:5px; border-left: 5px solid white;">Login</a>
        <a href="/login/register" class="item">Sign up</a>
    <?php } else { ?>
        <a href="/login" class="item">Logout</a>
    <?php } ?>
</div>