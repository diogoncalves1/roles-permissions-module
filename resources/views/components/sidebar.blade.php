<aside class="main-sidebar elevation-4 sidebar-dark-primary">

    <a href="{{ route('admin.permissions.index') }}" class="brand-link bg-primary bg-indigo bg-dark bg-gray-dark">
        <span class="brand-text font-weight-light">Permissions</span>
    </a>

    <div
        class="sidebar os-host os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden os-theme-light">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 874px;"></div>
        <div class="os-padding mt-1">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                        <div class="sidebar-search-results">
                            <div class="list-group"><a href="#" class="list-group-item">
                                    <div class="search-title"><strong class="text-light"></strong>N<strong
                                            class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                            class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                            class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                            class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                            class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                            class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                            class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                            class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                            class="text-light"></strong></div>
                                    <div class="search-path"></div>
                                </a></div>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                            role="menu" data-accordion="false">
                            @if(auth()->user() && auth()->user()->hasPermission('viewAdminHome'))
                            <li class="nav-item">
                                <a href="/admin" class="nav-link <?= $_SESSION['page'] == 'home' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user() && auth()->user()->hasPermission('viewAdminCurrencies'))
                            <li class="nav-item">
                                <a href="/admin/currencies"
                                    class="nav-link <?= $_SESSION['page'] == 'currencies' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-coins"></i>
                                    <p>
                                        Moedas
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user() && auth()->user()->hasPermission('viewCategoriesAdmin'))
                            <li class="nav-item">
                                <a href="/admin/categories"
                                    class="nav-link <?= $_SESSION['page'] == 'categories' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-tags"></i>
                                    <p>
                                        Categorias
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user() && auth()->user()->hasPermission('viewSharedRoles'))
                            <li class="nav-item">
                                <a href="/admin/shared-roles"
                                    class="nav-link <?= $_SESSION['page'] == 'shared roles' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-people-arrows"></i>
                                    <p>
                                        Papeis de Partilha
                                    </p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user() && auth()->user()->hasPermission('viewUsersAdmin'))
                            <li class="nav-item">
                                <a href="/admin/users"
                                    class="nav-link <?= $_SESSION['page'] == 'users' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Utilizadores
                                    </p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="/logout" class="nav-link">
                                    <i class="nav-icon fas fa-door-open"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}"
                                    class="nav-link {{ session('page') == 'roles' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-shield"></i>
                                    <p>
                                        Papeis de Utilizador
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.permissions.index') }}"
                                    class="nav-link {{ session('page') == 'permissions' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-shield"></i>
                                    <p>
                                        Permissões de Utilizador
                                    </p>
                                </a>
                            </li>
                            @if(auth()->user() && auth()->user()->hasPermission('viewSharedPermissions'))
                            <li class="nav-item">
                                <a href="/admin/shared-permissions"
                                    class="nav-link <?= $_SESSION['page'] == 'shared permissions' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-share-alt"></i>
                                    <p>
                                        Permissões de Partilha
                                    </p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 68.680913%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
</aside>