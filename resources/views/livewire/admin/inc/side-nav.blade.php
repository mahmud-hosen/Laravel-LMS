<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222E33;">
        <!-- Brand Logo -->
        <a href="{{ route('admin.dashboard') }}" class="brand-link"
            style="background: #222E33; text-align: center;">
            <span class="brand-text"><strong>M.GlorY</strong></span>
        </a>

        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2" style="user-select: none;">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home" style="font-size: 14px;"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>


                    {{-- About --}}
                    <li
                        class="nav-item {{ request()->is('dashboard/homepage') || request()->is('dashboard/homepage/*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-link {{ request()->is('dashboard/homepage') || request()->is('dashboard/homepage/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt" style="font-size: 14px;"></i>
                            <p>
                                Home Page
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('dashboard/homepage') || request()->is('dashboard/homepage/*')? 'display: block;': 'display: none;' }} background: #192428;">
                            <li class="nav-item">
                                <a href="{{ route('admin.homeTopSection') }}"
                                    style="{{ request()->is('dashboard/homepage/top-section') || request()->is('dashboard/homepage/top-section/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Top Section</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.homeEvents') }}"
                                    style="{{ request()->is('dashboard/homepage/events') || request()->is('dashboard/homepage/events/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Events</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.homeMembers') }}"
                                    style="{{ request()->is('dashboard/homepage/members') || request()->is('dashboard/homepage/members/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Members</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.homeFacilities') }}"
                                    style="{{ request()->is('dashboard/homepage/facilities') || request()->is('dashboard/homepage/facilities/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Facilities</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.homeAchievements') }}"
                                    style="{{ request()->is('dashboard/homepage/achievements') || request()->is('dashboard/homepage/achievements/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Achievements</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- About --}}
                    <li
                        class="nav-item {{ request()->is('dashboard/about-menu') || request()->is('dashboard/about-menu/*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-link {{ request()->is('dashboard/about-menu') || request()->is('dashboard/about-menu/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt" style="font-size: 14px;"></i>
                            <p>
                                About Menu
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('dashboard/about-menu') || request()->is('dashboard/about-menu/*')? 'display: block;': 'display: none;' }} background: #192428;">
                            <li class="nav-item">
                                <a href="{{ route('admin.aboutMenuOverview') }}"
                                    style="{{ request()->is('dashboard/about-menu/overview') || request()->is('dashboard/about-menu/overview/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Overview</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.aboutMenuGoverningBody') }}"
                                    style="{{ request()->is('dashboard/about-menu/governing-body') ||request()->is('dashboard/about-menu/governing-body/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Governing Body</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.aboutMessageFromChairman') }}"
                                    style="{{ request()->is('dashboard/about-menu/message-from-chairman') ||request()->is('dashboard/about-menu/message-from-chairman/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Message From Chairman</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Academic --}}
                    <li
                        class="nav-item {{ request()->is('dashboard/academic') || request()->is('dashboard/academic/*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-link {{ request()->is('dashboard/academic') || request()->is('dashboard/academic/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt" style="font-size: 14px;"></i>
                            <p>
                                Academic Menu
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('dashboard/academic') || request()->is('dashboard/academic/*')? 'display: block;': 'display: none;' }} background: #192428;">
                            <li class="nav-item">
                                <a href="{{ route('admin.academicClassTeachers') }}"
                                    style="{{ request()->is('dashboard/academic/class-teachers') || request()->is('dashboard/academic/class-teachers/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Class Teachers</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.academicResult') }}"
                                    style="{{ request()->is('dashboard/academic/result') || request()->is('dashboard/academic/result/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Results</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- Faculty --}}
                    <li
                        class="nav-item {{ request()->is('dashboard/faculty') || request()->is('dashboard/faculty/*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-link {{ request()->is('dashboard/faculty') || request()->is('dashboard/faculty/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt" style="font-size: 14px;"></i>
                            <p>
                                Faculty
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('dashboard/faculty') || request()->is('dashboard/faculty/*')? 'display: block;': 'display: none;' }} background: #192428;">
                            <li class="nav-item">
                                <a href="{{ route('admin.facultyPrePrimary') }}"
                                    style="{{ request()->is('dashboard/faculty/pre-primary') || request()->is('dashboard/faculty/pre-primary/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Pre Primary</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.facultyPrimary') }}"
                                    style="{{ request()->is('dashboard/faculty/primary') || request()->is('dashboard/faculty/primary/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Primary</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.facultyHighSchool') }}"
                                    style="{{ request()->is('dashboard/faculty/high-school') || request()->is('dashboard/faculty/high-school/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>High School</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.facultyCollege') }}"
                                    style="{{ request()->is('dashboard/faculty/college') || request()->is('dashboard/faculty/college/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>College</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ request()->is('dashboard/publications') || request()->is('dashboard/publications/*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-link {{ request()->is('dashboard/publications') || request()->is('dashboard/publications/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt" style="font-size: 14px;"></i>
                            <p>
                                Publication
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('dashboard/publications') || request()->is('dashboard/publications/*')? 'display: block;': 'display: none;' }} background: #192428;">
                            <li class="nav-item">
                                <a href="{{ route('admin.magazines') }}"
                                    style="{{ request()->is('dashboard/publications/magazines') || request()->is('dashboard/publications/magazines/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Magazines</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.articles') }}"
                                    style="{{ request()->is('dashboard/publications/articles') || request()->is('dashboard/publications/articles/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Articles</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Alumni --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.alumni') }}"
                            class="nav-link {{ request()->is('dashboard/alumni') || request()->is('dashboard/alumni/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users" style="font-size: 14px;"></i>
                            <p>Alumni</p>
                        </a>
                    </li>

                    {{-- Notice --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.notice') }}"
                            class="nav-link {{ request()->is('dashboard/notices') || request()->is('dashboard/notices/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-exclamation" style="font-size: 14px;"></i>
                            <p>Notice</p>
                        </a>
                    </li>

                    {{-- Campus --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.imageGallery') }}"
                            class="nav-link {{ request()->is('dashboard/on-campus') || request()->is('dashboard/on-campus/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-images" style="font-size: 14px;"></i>
                            <p>On Campus</p>
                        </a>
                    </li>

                    {{-- Website Setup --}}
                    <li
                        class="nav-item {{ request()->is('dashboard/website-setup') || request()->is('dashboard/website-setup/*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0)"
                            class="nav-link {{ request()->is('dashboard/website-setup') || request()->is('dashboard/website-setup/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs" style="font-size: 14px;"></i>
                            <p>
                                Website Setup
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview"
                            style="{{ request()->is('dashboard/website-setup') || request()->is('dashboard/website-setup/*')? 'display: block;': 'display: none;' }} background: #192428;">
                            <li class="nav-item">
                                <a href="{{ route('admin.websiteHeaderSetup') }}"
                                    style="{{ request()->is('dashboard/website-setup/header') || request()->is('dashboard/website-setup/header/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Header</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.websiteFooterSetup') }}"
                                    style="{{ request()->is('dashboard/website-setup/footer') || request()->is('dashboard/website-setup/footer/*')? 'color: white;': '' }}"
                                    class="nav-link">
                                    <i class="" style="margin-left: 32px; font-size: 11px;"></i>
                                    <p>Footer</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
</div>
