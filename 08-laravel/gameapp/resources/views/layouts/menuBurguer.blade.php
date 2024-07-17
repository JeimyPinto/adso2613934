<!-- ESTO ES EL MENÚ DEL MENÚ HAMBURGUESA -->
@guest
    <nav class="nav">
        <menu>
            <a href="{{ url('login') }}">
                <img src="images/ico-login.svg" alt="Login">
                <span>Login</span>
            </a>
            <a href={{ url('register') }}>
                <img src="images/ico-register.svg" alt="Register">
                <span>Register</span>
            </a>
            <a href={{ url('catalogue') }}>
                <img src="images/ico-catalogue.svg" alt="Catalogue">
                <span>Catalogue</span>
            </a>
        </menu>
    </nav>
@endguest

@auth
    <nav class="nav">
        <menu>
            <a href="profile-admin.html">
                <img src="images/ico-users-module.svg" alt="Catalogue">
                <span>Profile</span>
            </a>
            <a href="catalogue.html">
                <img src="images/ico-catalogue.svg" alt="Catalogue">
                <span>Catalogue</span>
            </a>
            <a href="javascript:;" onclick="logit.submit();">
                <img src="images/ico-login.svg" alt="" class="logout">
                <span>Logout</span>
            </a>
            </footer>

        </menu>
    </nav>
    <form action={{ route('logout') }} id="logit" method="post">
        @csrf
    </form>
@endauth
