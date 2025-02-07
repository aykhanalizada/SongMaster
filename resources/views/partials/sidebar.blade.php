<aside class="sidebar d-flex flex-column flex-shrink-0 position-fixed">
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-chevron-left"></i>
    </button>

    <div class="p-4">
        <h4 class="logo-text fw-bold mb-0">Admin Panel</h4>
        <p class="text-muted small hide-on-collapse">Dashboard</p>
    </div>

    <div class="nav flex-column flex-grow-1">
        <a href="{{route('songs.index')}}" class="sidebar-link active text-decoration-none p-3">
            <i class="fas fa-home me-3"></i>
            <span class="hide-on-collapse">Songs</span>
        </a>

    </div>

    <a href="{{ route('logout') }}" class="sidebar-link text-decoration-none p-3">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span class="hide-on-collapse">Logout</span>
    </a>

</aside>
