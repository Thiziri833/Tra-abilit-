<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/img/logo-cevital.png') }}" alt="Cevital Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Cevital</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/admin.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header" style="font-weight: bold;text-transform: uppercase;">Production</li>
                <li class="nav-item">
                    <a href="{{ route('productions.index') }}"
                        class="nav-link {{ request()->routeIs('productions.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: red"></i>
                        <p>Productions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="far fa-circle nav-icon" style="color: red"></i>
                        <p>Impressions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="far fa-circle nav-icon" style="color: red"></i>
                        <p>Palettes</p>
                    </a>
                </li>
                <li class="nav-header" style="font-weight: bold;text-transform: uppercase;">Expédition</li>
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}"
                        class="nav-link {{ request()->routeIs('customers.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: yellow"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}"
                        class="nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon" style="color: yellow"></i>
                        <p>Commandes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="far fa-circle nav-icon" style="color: yellow"></i>
                        <p>Chargements</p>
                    </a>
                </li>
                <li class="nav-header" style="font-weight: bold;text-transform: uppercase;">Configuration</li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                <i class="fas fa-fw fa-user" style="color: cyan"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon" style="color: cyan"></i>
                                <p>Profils</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('structures.index') }}"
                                class="nav-link {{ request()->routeIs('structures.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon" style="color: cyan"></i>
                                <p>Structures</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}"
                                class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon" style="color: cyan"></i>
                                <p>Produits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lines.index') }}"
                                class="nav-link {{ request()->routeIs('lines.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon" style="color: cyan"></i>
                                <p>Lignes</p>
                            </a>
                        </li>


                    </ul>
                </li>
            </ul>

        </nav>
    </div>
</aside>
