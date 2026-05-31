<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm py-2 dark-navbar" id="mainNavbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center fw-bold fs-5 text-light" href="/">
            <i class="bi bi-droplet-fill me-2" style="color: #ef4444; font-size: 1.6rem;"></i>
            <span>ব্লাড ব্যাংক</span>
        </a>

        <!-- Toggler - Fixed hamburger icon -->
        <button class="navbar-toggler border-0 custom-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarTopNav"
                aria-controls="navbarTopNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon custom-toggler-icon"></span>
        </button>

        <!-- Top Nav Links -->
        <div class="collapse navbar-collapse" id="navbarTopNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                <li class="nav-item">
                        <a class="nav-link top-nav-link {{ request()->is('profile') ? 'active-link' : '' }}" href="{{ url('/profile') }}">
                            <i class="bi bi-person-circle me-1"></i> My Profile
                        </a>
                    </li>

                @auth
                    @if(auth()->user()->is_admin == 1)
                        <li class="nav-item">
                            <a class="nav-link top-nav-link {{ request()->is('admin') ? 'active-link' : '' }}" href="/admin">
                                <i class="bi bi-speedometer2 me-1"></i> Admin Panel
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                            @csrf
                            <button type="submit" class="btn-logout w-100 text-start">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link top-nav-link {{ request()->is('login') ? 'active-link' : '' }}" href="/login">
                            <i class="bi bi-person-circle me-1"></i> Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link signup-btn text-center" href="/register">
                            <i class="bi bi-person-plus me-1"></i> Signup
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<!-- ===== CSS ===== -->
<style>
/* Navbar adjustments */
.dark-navbar {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    transition: all 0.3s ease;
}

.navbar-brand {
    font-size: 1.5rem !important;
    gap: 8px;
    display: flex;
    align-items: center;
}

.top-nav-link {
    color: rgba(255,255,255,0.85) !important;
    font-weight: 500;
    padding: 8px 16px !important;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.top-nav-link:hover {
    color: #fff !important;
    background: rgba(255,255,255,0.1);
    transform: translateY(-1px);
}

.active-link {
    color: #fff !important;
    background: rgba(231,76,60,0.3) !important;
    border-bottom: 2px solid #E74C3C;
}

.signup-btn {
    background: linear-gradient(135deg, #dc2626, #ef4444) !important;
    color: #fff !important;
    padding: 8px 24px !important;
    border-radius: 25px !important;
    font-weight: 600 !important;
    transition: all 0.3s ease !important;
}

.signup-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(231,76,60,0.4);
}

/* Logout button */
.btn-logout {
    background: transparent;
    border: 1px solid rgba(255,255,255,0.3);
    color: rgba(255,255,255,0.85);
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 0.95rem;
}

.btn-logout:hover {
    background: rgba(231,76,60,0.2);
    border-color: #E74C3C;
    color: #fff;
}

/* ===== Fixed Hamburger Icon (White 3 dots) ===== */
.custom-toggler {
    padding: 4px 8px !important;
    background: transparent !important;
}

.custom-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255,255,255,0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2.5' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    width: 28px !important;
    height: 28px !important;
    display: inline-block !important;
    vertical-align: middle !important;
    content: "" !important;
}

.custom-toggler:focus,
.custom-toggler:active {
    outline: none !important;
    box-shadow: none !important;
}

/* Mobile adjustments */
@media (max-width: 991.98px) {
    .dark-navbar {
        padding: 10px 0 !important;
    }

    .navbar-collapse {
        background: rgba(26, 26, 46, 0.98);
        border-radius: 16px;
        padding: 16px;
        margin-top: 12px;
        border: 1px solid rgba(255,255,255,0.08);
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }

    .navbar-nav {
        text-align: center;
        gap: 8px !important;
    }

    .signup-btn, .btn-logout {
        width: 100%;
        text-align: center;
        justify-content: center !important;
    }

    .navbar-brand {
        font-size: 1.25rem !important;
    }
}

@media (max-width: 575.98px) {
    .navbar-brand {
        font-size: 1.1rem !important;
    }
    .navbar-brand i {
        font-size: 1.3rem !important;
    }
}
</style>