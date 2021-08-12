<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a href="/admin" class="@yield('dashboard')">
                    <i class="metismenu-icon feather-home"></i>
                    Dashboard 
                </a>
            </li>
            <li class="app-sidebar__heading">UI Components</li>
            <li>
                <a href="/admin/category" class="@yield('category')">
                    <i class="metismenu-icon feather-grid"></i>
                    Category
                </a>

            </li>

            <li>
                <a href="/admin/subcat" class="@yield('subcat')">
                    <i class="metismenu-icon feather-credit-card"></i>
                    Sub Category
                </a>

            </li>
            {{-- <li>
                <a href="#" class="@yield('category')">
                    <i class="metismenu-icon feather-grid"></i>
                    Category
                    <i class="metismenu-state-icon feather-chevron-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="elements-buttons-standard.html">
                            <i class="metismenu-icon"></i>
                            Buttons
                        </a>
                    </li>
                    <li>
                        <a href="elements-dropdowns.html">
                            <i class="metismenu-icon">
                            </i>Dropdowns
                        </a>
                    </li>
                   
                </ul>
            </li> --}}
        </ul>
    </div>
</div>