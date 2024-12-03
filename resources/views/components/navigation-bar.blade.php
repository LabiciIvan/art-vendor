<nav>
    <div>
        <a href="{{ route('item.all') }}">Art Vendor</a>
    </div>
    <div>
        <a href="{{ route('cart.index') }}">
            Cart
            @session('cart')
                {{ count($value) }} 
            @endsession
        </a>
    </div>
    @if (!$isLoggedIn)
        <div>
            <a href="{{ route('auth.login.form') }}">Login</a>
        </div>
    @elseif ($isLoggedIn)
        @can('onlyAdmins', Auth::user())
            <div>
                <a href="{{ route('admin.panel') }}">Admin Panel</a>
            </div>
        @endcan
        <div>
            <a href="{{ route('logout.user') }}">Logout</a>
        </div>
    @endif
</nav>