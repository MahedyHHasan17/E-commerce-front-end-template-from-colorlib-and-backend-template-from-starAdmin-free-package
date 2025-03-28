<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <!-- <li class="nav-item {{ request()->routeIs('admin.widget') ? 'active' : '' }}"> -->
            <a class="nav-link">
                <i class="mdi mdi-tune menu-icon"></i>
                <span class="menu-title">Widget</span>
            </a>
        </li>



        <li class="nav-item nav-category">Product</li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product"
                aria-expanded="{{ request()->routeIs('admin.product.*') ? 'true' : 'false' }}"
                aria-controls="product">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{ request()->routeIs('admin.product.*') ? 'show' : '' }}" id="product">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.list.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.list.index') }}">
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.category.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.category.index') }}">
                            Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.sub-category.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.sub-category.index') }}">
                            Sub Category
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.brand.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.brand.index') }}">
                            Brand
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.coupon.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.coupon.index') }}">
                            Coupon
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item nav-category">Site Settings</li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#site_setting"
                aria-expanded="{{ request()->routeIs('admin.site_setting.*') ? 'true' : 'false' }}"
                aria-controls="site_setting">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Site Settings</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse {{ request()->routeIs('admin.site_setting.*') ? 'show' : '' }}" id="site_setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.site_setting.newsletter.*') ? 'active' : '' }}"
                            href="{{ route('admin.site_setting.newsletter.index') }}">
                            NewsLetter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.sub-category.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.sub-category.index') }}">
                            Sub Category
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.brand.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.brand.index') }}">
                            Brand
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.product.coupon.*') ? 'active' : '' }}"
                            href="{{ route('admin.product.coupon.index') }}">
                            Coupon
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/basic_elements.html">Elements</a>
                    </li>
                </ul>
            </div>
        </li>


        <!-- <li class="nav-item nav-category">UI Elements</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="menu-icon mdi mdi-layers-outline"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> -->
    </ul>
</nav>