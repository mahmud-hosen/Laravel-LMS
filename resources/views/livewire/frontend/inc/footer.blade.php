<div>
    <!-- Footer Section  -->
    <footer class="footer_wrapper default_section_gap">
        <div class="footer_news_bg_area"
            style="background-image: url({{ asset('assets/images/footer/footerBG.png') }})">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page_title">Your Child’s future starts here</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-sm-6">
                        <div class="footer_menu_item">
                            <h3>Important Links</h3>
                            <ul>
                                @foreach ($footerlinks as $link)
                                    <li><a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer_menu_item">
                            <h3 class="mb-2">Location</h3>
                            <ul>
                                <li><p>{{ $footer->location_line1 }}</p></li>
                                <li><p>{{ $footer->location_line2 }}</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer_menu_item">
                            <h3>Our Hours</h3>
                            <ul>
                                <li>{{ Carbon\Carbon::parse($footer->hours_time_from)->format('h:i A') }} – {{ Carbon\Carbon::parse($footer->hours_time_to)->format('h:i A') }}</li>
                                <li>{{ $footer->hours_day_from }} – {{ $footer->hours_day_to }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer_menu_item">
                            <h3>Contact us</h3>
                            <ul>
                                <li>
                                    Phone:
                                    <a href="tel:+ {{ $footer->phone }}"> {{ $footer->phone }}</a>
                                </li>
                                <li>
                                    Email:
                                    <a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright_item_area d-flex align-items-center justify-content-between flex-wrap">
                            <h6>{{ $footer->copyright_text }}</h6>
                            <ul class="d-flex align-items-center flex-wrap">
                                <li><a href="index.html">Home</a></li>
                                <li>
                                    <a href="notice.html">Notice Board</a>
                                </li>
                                <li>
                                    <a href="privacy.html">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Mobile Menu -->
    <div class="mobile_menu_area">
        <div class="mobile_menu_overlay"></div>
        <div class="close_icon">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <ul class="mobile_menu_list">
            <li class="active_menu"><a href="/">Home</a></li>
        </ul>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        ABOUT
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="overview.html">Overview</a>
                            </li>
                            <li>
                                <a href="governing-body.html">Governing Body</a>
                            </li>
                            <li>
                                <a href="message-chairman.html">Massage From the Chairman</a>
                            </li>
                            <li>
                                <a href="message-patron.html">Massage From the Chair Patron</a>
                            </li>
                            <li>
                                <a href="principle-desk.html">From the principle's desk</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        ACADEMIC
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="pre-primary.html">Pre-primary school
                                </a>
                            </li>
                            <li>
                                <a href="coordinator.html">Coordinator</a>
                            </li>
                            <li>
                                <a href="class-teachers.html">Class Teachers</a>
                            </li>
                            <li>
                                <a href="Result.html">Result</a>
                            </li>
                            <li>
                                <a href="principle-desk.html">From the principle's desk</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        ONLINE CLASSROOM
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="overview.html">Overview</a>
                            </li>
                            <li>
                                <a href="online-routine.html">Online Class Routine</a>
                            </li>
                            <li>
                                <a href="online-record.html">Recorded Online Class</a>
                            </li>
                            <li>
                                <a href="online-vacation.html">Online Vacation Homework</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="mobile_menu_list">
            <li><a href="#">ADMISSION</a></li>
            <li><a href="#">FACULTY</a></li>
            <li><a href="publication.html">PUBLICATION</a></li>
            <li><a href="notice.html">NOTICE BOARD</a></li>
            <li><a href="campus.html">ON CAMPUS</a></li>
            <li><a href="#">ALUMNI</a></li>
        </ul>

        <div class="mobile_contact_button">
            <a href="#">Contact</a>
        </div>
    </div>
</div>
