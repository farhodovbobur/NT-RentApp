<!-- Navbar -->

<header class="container">

    <div class="menu">
        <h2 class="logo">
            <a href="/">Flat rent</a>
        </h2>
        <input type="checkbox" id="check">
        <label for="check" class="icon-menu">
            <ion-icon name="menu-outline" id="open-menu"></ion-icon>
            <ion-icon name="close-outline" id="close-menu"></ion-icon>
        </label>

        <nav class="navbar">
            <a href="/">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </nav>
    </div>

    <div class="button">
        <?php if (!isset($_SESSION['user'])):?>
            <a class="btn-login" href="/login">Login</a>
            <a class="btn-login" href="/register">Register</a>

        <?php else: echo $_SESSION['user'];?>
            <a class="btn-login" href="/logout">Logout</a>

        <?php endif;?>
    </div>

</header>


