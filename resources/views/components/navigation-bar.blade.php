<nav>
    <div>
        <a href="{{ route('item.all') }}">Art Vendor</a>
    </div>
    @if (!$isLoggedIn)
        <div>
            <a href="{{ route('auth.login.form') }}">Login</a>
        </div>
        <div>
            <a href="{{ route('auth.register.form') }}">Register</a>
        </div>
    @elseif ($isLoggedIn)
        <div>
            <a href="{{ route('logout.user') }}">Logout</a>
        </div>
    @endif
</nav>