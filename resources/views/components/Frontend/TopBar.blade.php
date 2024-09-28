<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('page') }}">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('page') ? 'active' : '' }}">
                    <a href="{{ route('page') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item {{ request()->is('rental') ? 'active' : '' }}">
                    <a href="{{ route('car') }}" class="nav-link">Car</a>
                </li>
                <li class="nav-item {{ request()->is('rental') ? 'active' : '' }}">
                    <a href="{{ route('rental') }}" class="nav-link">Rental</a>
                </li>

                <li class="nav-item {{ request()->is('car.filter') ? 'active' : '' }}">
                    <a href="{{ route('car.filter') }}" class="nav-link">Car Filter</a>
                </li>

                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item {{ request()->is('signup') ? 'active' : '' }}">
                    <a href="{{ route('signup') }}" class="nav-link">Signup</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
