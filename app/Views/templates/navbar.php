<div class="navbar">
    <h1 class="logo" style="color: #FFFFFF;">Spinify</h1>
    <a class="item" href="">Premium</a>
    <a class="item">Download</a>
    <a class="item">Support</a>
    <?php if($_SESSION['user']) { ?>
        <a href="/login" class="item">Login</a>
        <a href="/login/register" class="item">Sign up</a>
    <?php } else { ?>
        <a href="/login" class="item">Logout</a>
    <?php } ?>
</div>