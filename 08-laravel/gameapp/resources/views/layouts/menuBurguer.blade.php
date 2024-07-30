@auth
    <!-- Contenido para usuarios autenticados -->
    <nav class="nav">
        <menu class="menu">
            <a href="{{ route('profile.index', ['id' => Auth::user()->id]) }}" class="menu-option">
                <img src="{{ asset('images/ico-profile.svg') }}" class="menu-option-img" alt="Profile">
                <span class="menu-option-span">My Profile</span>
            </a>
            <a href="{{ url('/dashboard') }}" class="menu-option">
                <img src="{{ asset('images/ico-dashboard.svg') }}" class="menu-option-img" alt="Dashboard">
                <span class="menu-option-span">Dashboard</span>
            </a>
            <a href="javascript:;" onclick="document.getElementById('logout-form').submit();" class="menu-option">
                <img src="{{ asset('images/ico-logout.svg') }}" class="menu-option-img" alt="Logout">
                <span class="menu-option-span">Logout</span>
            </a>
        </menu>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth

@guest
    <!-- Contenido para usuarios no autenticados -->
    <nav class="nav">
        <menu class="menu">
            <a href="{{ route('login') }}" class="menu-option">
                <img src="{{ asset('images/ico-login.svg') }}" class="menu-option-img" alt="Login">
                <span class="menu-option-span">Login</span>
            </a>
            <a href="{{ route('register') }}" class="menu-option">
                <img src="{{ asset('images/ico-register.svg') }}" class="menu-option-img" alt="Register">
                <span class="menu-option-span">Register</span>
            </a>
        </menu>
    </nav>
@endguest
