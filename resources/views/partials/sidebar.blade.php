<div class="d-flex">
    <nav class="sidebar d-flex flex-column flex-shrink-0 position-fixed">
        <button class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="p-4">
            <h4 class="logo-text fw-bold mb-0">NexusFlow</h4>
            <p class="text-muted small hide-on-collapse">Dashboard</p>
        </div>

        <div class="nav flex-column">
            <a href="#" class="sidebar-link active text-decoration-none p-3">
                <i class="fas fa-home me-3"></i>
                <span class="hide-on-collapse">Dashboard</span>
            </a>
            <a href="#" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-chart-bar me-3"></i>
                <span class="hide-on-collapse">Analytics</span>
            </a>
            <a href="#" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-users me-3"></i>
                <span class="hide-on-collapse">Customers</span>
            </a>

            <a href="#" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-box me-3"></i>
                <span class="hide-on-collapse">Products</span>
            </a>
            <a href="#" class="sidebar-link text-decoration-none p-3">
                <i class="fas fa-gear me-3"></i>
                <span class="hide-on-collapse">Settings</span>
            </a>
        </div>

        <div class="profile-section mt-auto p-4">
            <div class="d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/women/70.jpg" style="height:60px" class="rounded-circle"
                     alt="Profile">
                <div class="ms-3 profile-info">
                    <h6 class="text-white mb-0">Alex Morgan</h6>
                    <small class="text-muted">Admin</small>
                </div>
            </div>
        </div>
    </nav>



    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</div>
