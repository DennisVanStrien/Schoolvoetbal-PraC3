<header class="flex bg-[#009fe3] items-end relative pb-[10px] shadow-lg">
    <img src="../img/logo.jpg" alt="Logo" class="max-w-[250px]">
    <div class="headerContent">
        <nav class="nav flex items-end w-[100%]">
            <a href="/" class="m-[10px] text-white text-sm uppercase tracking-wide px-4 py-2 rounded-md bg-[#007bb3] hover:bg-[#005f8a] hover:scale-105 transition duration-300 ease-in-out">
                Home
            </a>
            <a href="/teams" class="m-[10px] text-white text-sm uppercase tracking-wide px-4 py-2 rounded-md bg-[#007bb3] hover:bg-[#005f8a] hover:scale-105 transition duration-300 ease-in-out">
                Teams
            </a>
            <a href="/dashboard" class="m-[10px] text-white text-sm uppercase tracking-wide px-4 py-2 rounded-md bg-[#007bb3] hover:bg-[#005f8a] hover:scale-105 transition duration-300 ease-in-out">
                Dashboard
            </a>
            <a href="/" class="m-[10px] text-white text-sm uppercase tracking-wide px-4 py-2 rounded-md bg-[#007bb3] hover:bg-[#005f8a] hover:scale-105 transition duration-300 ease-in-out">
                Wedstrijden
            </a>
            <a href="/weddenschappen" class="m-[10px] text-white text-sm uppercase tracking-wide px-4 py-2 rounded-md bg-[#007bb3] hover:bg-[#005f8a] hover:scale-105 transition duration-300 ease-in-out">
                Weddenschappen
            </a>
        </nav>

        @if (Route::has('login'))
        <div class="auth-buttons absolute top-4 right-4">
            @auth
                <!-- Dropdown for Account -->
                <div class="relative group">
                    <button class="mx-5 px-4 py-2 bg-white text-[#009fe3] border-2 border-[#009fe3] rounded-md transition duration-300 ease-in-out">
                        Account <i class="fa-solid fa-caret-down"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute left-0 hidden group-hover:block w-full bg-white border-2 border-[#009fe3] rounded-md shadow-lg">
                        <a href="/profile" class="block px-4 py-2 text-[#009fe3] text-sm transition duration-300 ease-in-out">
                            Profiel
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="block w-full">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block w-full px-4 py-2 text-[#009fe3] bg-white text-sm text-start leading-5 rounded-md focus:outline-none transition duration-300 ease-in-out">
                            {{ __('Log Out') }}
                            </a>

                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="auth-link mx-2 px-4 py-2 bg-white text-[#009fe3] border-2 border-[#009fe3] rounded-md transition duration-300 ease-in-out">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-link mx-2 px-4 py-2 bg-white text-[#009fe3] border-2 border-[#009fe3] rounded-md transition duration-300 ease-in-out">
                        Register
                    </a>
                @endif
            @endauth
        </div>
        @endif
    </div>
</header>
