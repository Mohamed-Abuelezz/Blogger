            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item nav-category">Core</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Categories</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="categories">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('categories.index') }}">categories</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('categories.create') }}">add
                                        category</a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#articals" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Articals</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="articals">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('articals.index') }}">articals</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('articals.create') }}">add
                                        articals</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminLogout') }}">
                            <i class="mdi mdi-grid-large mdi-logout text-danger"></i>
                            <span class="menu-title text-danger">Logout</span>
                        </a>
                    </li>

                </ul>
            </nav>
