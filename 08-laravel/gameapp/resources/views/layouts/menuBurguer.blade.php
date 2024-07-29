<!-- ESTO ES EL MENÚ DEL MENÚ HAMBURGUESA -->
@guest
    <nav class="nav">
        <menu class="menu">
            <a href="{{ url('login') }}" class="menu-option">
                <img src="images/ico-login.svg" class="menu-option-img" alt="Login">
                <span class="menu-option-span">Login</span>
            </a>
            <a href={{ url('register') }} class="menu-option">
                <img src="images/ico-register.svg" class="menu-option-img" alt="Register">
                <span class="menu-option-span">Register</span>
            </a>
            <a href={{ url('catalogue') }} class="menu-option">
                <img src="images/ico-catalogue.svg" class="menu-option-img" alt="Catalogue">
                <span class="menu-option-span">Catalogue</span>
            </a>
        </menu>
    </nav>
@endguest

@auth
    <nav class="nav">
        <menu class="menu">
            <a href={{ url('profile/show/' . $userLoged->id) }} class="menu-option">
                <img src={{ asset('images/ico-profile.svg') }} class="menu-option-img" alt="Catalogue">
                <span class="menu-option-span"> My Profile</span>
            </a>
            <a href={{ url('/dashboard') }} class="menu-option">
                <img src={{ asset('images/ico-dashboard.svg') }} class="menu-option-img" alt="Catalogue">
                <span class="menu-option-span">Dashboard</span>
            </a>
            <a href="javascript:;" onclick="logit.submit();" class="menu-option">
                <img src={{ asset('images/ico-logout.svg') }} alt="" class="logout menu-option-img">
                <span class="menu-option-span">Logout</span>
            </a>
            </footer>

        </menu>
    </nav>
    <form action={{ route('logout') }} id="logit" method="post">
        @csrf
    </form>
@endauth
