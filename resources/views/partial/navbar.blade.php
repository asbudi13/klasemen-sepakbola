<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Liga Indonesia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Input Klub' ? 'active' : '' }}" aria-current="page" href="{{ route('inputKlub') }}">Input Klub</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Input Skor' ? 'active' : '' }}" href="{{ route('inputSkor') }}">Input Skor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Klasemen' ? 'active' : '' }}" href="{{ route('klasemen') }}">Klasemen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
