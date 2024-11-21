<img src="img/logo.jpg" alt="Logo" class="headerImage">
    <div class="headerContent">
        <nav class="nav">
            <a href="/">Button</a>
            <a href="/">Button</a>
            <a href="/">Button</a>
            <a href="/">Button</a>
        </nav>

        @if (Route::has('login'))
        <div class="auth-buttons">
            @auth
                <a href="{{ url('/dashboard') }}" class="auth-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="auth-link">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-link">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
