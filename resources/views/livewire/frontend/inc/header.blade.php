<div>
    <!-- Navbar Secstion  -->
    <section class="header_wrapper">
        <div class="top_marque_area">
            <div class="container">
                <div class="row">
                    <div class="col-11">
                        <div class="marque_content_area d-flex align-items-center">
                            <a class="top_mail" href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                            <marquee direction="left">
                                <ul>
                                    <li>
                                        <img src="{{ asset('assets/images/header/logo.png') }}" alt="Logo" />
                                        Maintain COVID-19 health protocol
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/images/header/logo.png') }}" alt="Logo" />
                                        Maintain COVID-19 health protocol
                                    </li>
                                </ul>
                            </marquee>
                            <a href="mahmud.php" >Mahmud</a>
                            <a href="mahmud.php" >Mahmud</a>
                        </div>
                    </div>
                     <div class="col-2">
                        <div class="text-center">
                            <a href="mahmud.php" >Admin Login</a>
                            <a href="mahmud.php" >Teacher Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tobar_logo_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="logo_text_area">
                            <div class="tobar_bar_logo d-flex align-items-center">
                                <img src="{{ asset('uploads/all') }}/{{ $header->logo }}" alt="Logo" />
                                <div>
                                    <h3>{{ $header->title }}</h3>
                                    <h4>
                                        {{ $header->subtitle }}
                                    </h4>
                                </div>
                            </div>
                            <img src="{{ asset('assets/images/header/shekh-mojibur.png') }}" alt="shekh mojibur"
                                class="shekh_mojibur_img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar_area">
            <div class="container">
                <div class="row">
                    <div class="co-12">
                        <nav class="d-flex align-items-center justify-content-between flex-wrap">
                            <ul class="d-flex align-items-center flex-wrap menu_list">
                                <li class="{{ request()->is('/') ? 'active_menu' : '' }}"><a href="/">HOME</a></li>
                                <li class="dropdown_menu {{ request()->is('about/*') ? 'active_menu' : '' }}">ABOUT
                                    <i class="fa-solid fa-caret-right"></i>
                                    <ul>
                                        <li class="{{ request()->is('about/overview') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.aboutOverview') }}">Overview</a>
                                        </li>
                                        <li class="{{ request()->is('about/governing-body') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.aboutGoverningBody') }}">Governing Body</a>
                                        </li>
                                        <li
                                            class="{{ request()->is('about/message-from-the-chairman') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.aboutMessageFromChairman') }}">Massage From the
                                                Chairman</a>
                                        </li>
                                        <li
                                            class="{{ request()->is('about/message-from-the-chair-patron') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.aboutMessageFromChairPatron') }}">Massage From
                                                the
                                                Chair Patron</a>
                                        </li>
                                        <li
                                            class="{{ request()->is('about/from-the-principles-desk') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.aboutFromPrinciplesDesk') }}">From the
                                                principle's
                                                desk</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ request()->is('admission/*') ? 'active_menu' : '' }}">
                                    <a href="{{ route('home.admission') }}">
                                        ADMISSION
                                    </a>
                                </li>
                                <li class="dropdown_menu {{ request()->is('academic/*') ? 'active_menu' : '' }}">
                                    ACADEMIC <i class="fa-solid fa-caret-right"></i>
                                    <ul>
                                        <li
                                            class="{{ request()->is('academic/pre-primary-aschool') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.academicPrePrimarySchool') }}">Pre-primary school
                                            </a>
                                        </li>
                                        <li class="{{ request()->is('academic/coordinator') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.academicCoordinator') }}">Coordinator</a>
                                        </li>
                                        <li
                                            class="{{ request()->is('academic/class-teachers') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.academicClassTeachers') }}">Class Teachers</a>
                                        </li>
                                        <li class="{{ request()->is('academic/result') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.academicResult') }}">Result</a>
                                        </li>
                                        <li
                                            class="{{ request()->is('academic/from-the-principles-desk') ? 'active_menu' : '' }}">
                                            <a href="{{ route('home.academicFromPrinciplesDesk') }}">From the
                                                principle's desk</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown_menu {{ request()->is('faculty/*') ? 'active_menu' : '' }}">
                                    FACULTY <i class="fa-solid fa-caret-right"></i>
                                    <ul>
                                        <li class="{{ request()->is('faculty/pre-primary') ? 'active_menu' : '' }}">
                                            <a href="{{ route('facultyPrePrimary') }}">Pre Primary</a>
                                        </li>
                                        <li class="{{ request()->is('faculty/primary') ? 'active_menu' : '' }}">
                                            <a href="{{ route('facultyPrimary') }}">Primary</a>
                                        </li>
                                        <li class="{{ request()->is('faculty/high-school') ? 'active_menu' : '' }}">
                                            <a href="{{ route('facultyHighSchool') }}">High School</a>
                                        </li>
                                        <li class="{{ request()->is('faculty/college') ? 'active_menu' : '' }}">
                                            <a href="{{ route('facultyCollege') }}">College</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown_menu">ONLINE CLASSROOM <i class="fa-solid fa-caret-right"></i>
                                    <ul>
                                        <li>
                                            <a href="{{ route('onlineClassroom.overview') }}">Overview</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('onlineClassroom.routine') }}">Online Class Routine</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('onlineClassroom.records') }}">Recorded Online
                                                Class</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('onlineClassroom.vacationHomework') }}">Online Vacation
                                                Homework</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="{{ request()->is('publication') || request()->is('publication/*') ? 'active_menu' : '' }}"><a href="{{ route('publication') }}">PUBLICATION</a></li>

                                <li class="{{ request()->is('notice-board') ? 'active_menu' : '' }}"><a
                                        href="{{ route('noticeBoard') }}">NOTICE BOARD</a></li>

                                <li class="{{ request()->is('campus') || request()->is('campus/*') ? 'active_menu' : '' }}"><a href="{{ route('onCampus') }}">ON CAMPUS</a></li>

                                <li class="{{ request()->is('alumni') ? 'active_menu' : '' }}"><a
                                        href="{{ route('alumni') }}">ALUMNI</a></li>
                            </ul>
                            <div class="mobile_menu_icon">
                                <i class="fa-solid fa-bars-staggered" id="mobile_navbar_icon"></i>
                            </div>
                            {{-- <div class="login_area">
                                <ul class="d-flex align-items-center flex-wrap">
                                    <li>
                                        <a href="#">Log In</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
