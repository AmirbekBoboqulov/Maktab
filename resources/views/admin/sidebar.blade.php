<aside id="layout-menu" class="layout-menu menu-vertical menu bg-light border-end">
        <div class="app-brand demo p-3 text-center border-bottom">
            <a href="{{ url('/') }}" class="app-brand-link text-decoration-none d-flex justify-content-center align-items-center">
                <span class="fw-bold fs-5 text-primary">{{ __('message.school') }}</span>
            </a>
        </div>
        <div class="d-flex justify-content-center gap-3 py-2 border-bottom" aria-label="{{ __('message.language') }}">
            <a href="{{ url('/lang/uz') }}" lang="uz">UZ</a>
            <a href="{{ url('/lang/ru') }}" lang="ru">RU</a>
        </div>

        <div class="menu-divider mt-0"></div>
        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner nav flex-column pt-2">
            <!-- Dashboard -->
            <li class="menu-item active">
                <a href="{{ url('/admin/dashboard') }}" class="menu-link d-flex align-items-center text-dark mb-1 px-3 py-2 rounded">
                    <i class="bx bx-home-smile me-2"></i> <span>{{ __('message.admin_panel') }}</span>
                </a>
            </li>

            <!-- Menu Items -->
            <li class="menu-item">
                <a href="{{ route('admin.category.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-grid-alt me-2"></i> {{ __('message.categories') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.employee.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-user me-2"></i> {{ __('message.employees') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.position.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-briefcase me-2"></i> {{ __('message.positions') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.empCategory.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-category me-2"></i> {{ __('message.employee_categories') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.CategoryTop.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-star me-2"></i> {{ __('message.top_categories') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.posts.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-news me-2"></i> {{ __('message.news') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.statictik.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-bar-chart-alt-2 me-2"></i> {{ __('message.statistics') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-image me-2"></i> {{ __('message.gallery') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.infografika.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-pie-chart-alt me-2"></i> {{ __('message.infographics') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.smenatype.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-time me-2"></i> {{ __('message.shifts') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.schedule.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-calendar me-2"></i> {{ __('message.schedule') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.lesson.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-book me-2"></i> {{ __('message.lessons') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.categorychildren.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-dice-1 me-2"></i> {{ __('message.child_categories') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.HomePageImageTag.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-image-alt me-2"></i> {{ __('message.homepage_images') }}
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.parentInfo.index') }}" class="menu-link d-flex align-items-center mb-1 px-3 py-2 rounded">
                    <i class="bx bx-group me-2"></i> {{ __('message.parents') }}
                </a>
            </li>
        </ul>
    </aside>

<style>
    #layout-menu {
        width: 250px;
        height: 100vh;
        position: fixed;
        overflow-y: auto;
        z-index: 1030;
    }

    /* Sidebar hover va active effekt */
    .menu-link {
        transition: all 0.2s ease;
    }
    .menu-link:hover {
        background-color: #e7f1ff;
        color: #0d6efd;
    }
    .menu-item.active .menu-link {
        background-color: #0d6efd;
        color: #fff;
    }

</style>
