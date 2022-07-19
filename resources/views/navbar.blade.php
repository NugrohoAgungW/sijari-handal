<div class="nav navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/home">
            <img src="/img/Logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav md-3">
                <li class="nav-item">
                    <a href="/mitra" class="nav-link">Mitra</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @if (!session('id'))
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Register</a>
                    </li>
                @endif

                @if (session('id'))
                    <li class="nav-item">
                        @if (session('avatar'))
                            <img src="/img/users/{{ session('avatar') }}" width="32" class="rounded-circle mt-1">
                        @else
                            <img src="{{ Avatar::create(session('name'))->toBase64() }}" width="32"
                                class="mt-1">
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="/user" class="nav-link">{{ session('name') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">Log Out</a>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</div>
