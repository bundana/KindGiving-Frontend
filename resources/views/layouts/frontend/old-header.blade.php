<!-- Navbar START -->
<nav class="navbar navbar-expand-lg navbar-light bg-white menu menu__scroll">
    <div class="container p-sm-0">
        <a class="navbar-brand menu__logo p-0 m-0" href="index.html">
            <img class="menu__logo-img" src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
        <button class="navbar-toggler menu__toggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto menu__list my-3 my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle menu__list-link menu__list-link--active" href="#"
                       id="navbarDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Discover
                    </a>
                    <ul class="dropdown-menu menu__list-dropdown--ul overflow-hidden" aria-labelledby="navbarDrop">
                        <li><a class="dropdown-item" href="index.html">Campaigns</a></li>
                        <li><a class="dropdown-item" href="home-1.html">Payer Request</a></li>
                        <li><a class="dropdown-item" href="home-1.html">Categories</a></li>
                        <li><a class="dropdown-item" href="home-1.html">Blog</a></li>
                        <li><a class="dropdown-item" href="home-1.html">Payer Request</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu__list-link" href="cases.html">Why Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu__list-link" href="about.html">about us</a>
                </li>

                <li class="nav-item">
                    <a href="#"
                       class="nav-link menu__list-link search-toggler"><i class="icon-magnifying-glass"></i> Search</a>
                </li>
            </ul>


            <a href="singin.html" class="btn menu__btn menu__btn-in mb-3 mb-lg-0">sign in</a>
            <a href="signup.html" class="btn menu__btn menu__btn-up mb-3 mb-lg-0">Start</a>
        </div>
    </div>
</nav>

