<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.index') ? '' : 'collapsed' }}" href="{{ route('admin.index') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.resident*') ? '' : 'collapsed' }}" data-bs-target="#residents-nav"
            data-bs-toggle="collapse" href="#">
            <i class="bi bi-people"></i><span>Resident</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="residents-nav" class="nav-content collapse {{ Route::is('admin.resident*') ? 'show' : '' }}"
            data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('admin.resident.birth.index') }}"
                    class="nav-link
                {{ Route::is('admin.resident.birth*') ? '' : 'collapsed' }}">
                    <i class="bi bi-circle"></i><span>Resident Birth</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.resident.registered.index') }}"
                    class="nav-link
                {{ Route::is('admin.resident.registered*') ? '' : 'collapsed' }}">
                    <i class="bi bi-circle"></i><span>Registered Resident</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- @dd(Route::is('admin.service*')) --}}
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.service*') ? '' : 'collapsed' }}" data-bs-target="#services-nav"
            data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Service</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content collapse {{ Route::is('admin.service*') ? 'show' : '' }}"
            data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('admin.service.service.index') }}"
                    class="nav-link
                {{ Route::is('admin.service.service*') ? '' : 'collapsed' }}">
                    <i class="bi bi-circle"></i><span>Service</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.service.category.index') }}"
                    class="nav-link
                {{ Route::is('admin.service.category*') ? '' : 'collapsed' }}">
                    <i class="bi bi-circle"></i><span>Service Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.service.requirement.index') }}"
                    class="nav-link
                {{ Route::is('admin.service.requirement*') ? '' : 'collapsed' }}">
                    <i class="bi bi-circle"></i><span>Service Requirement</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.index') ? '' : 'collapsed' }}" href="{{ route('admin.index') }}">
            <i class="bi bi-journal-arrow-down"></i>
            <span>Submission</span>
        </a>
    </li>
</ul>
