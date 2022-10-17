<div>
    <!-- Hero Section  -->
    <section class="hero_wrapper"
        style="background-image: url({{ asset('uploads/all') }}/{{ $topSection->image }})">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        @foreach ($featuredNotices as $fnotice)
                            <li>
                                <svg width="37" height="32" viewBox="0 0 37 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_184_79)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.909 3.00013V8.00013H19.217C19.217 8.00013 11.158 9.00013 7.10399 13.0001C2.40399 17.8901 3.04997 29.0001 3.04997 29.0001C3.04997 29.0001 3.061 14.0001 19.278 14.0001H25.909V19.0001L33.964 11.0001L26.126 3.00013H25.909ZM26.126 0.000130203C27.0352 -0.00763446 27.913 0.332143 28.58 0.950081L36.18 8.95008C36.4532 9.2357 36.6665 9.57304 36.8075 9.94227C36.9485 10.3115 37.0142 10.7052 37.0009 11.1002C36.9876 11.4952 36.8954 11.8835 36.7299 12.2424C36.5644 12.6013 36.3288 12.9235 36.037 13.1901L27.432 21.1901C26.9967 21.5909 26.4547 21.8572 25.8714 21.9566C25.2881 22.0559 24.6884 21.9843 24.145 21.7501C23.035 21.2801 22.9 20.1901 22.9 19.0001V17.0001H19.276C6.05598 17.0001 6.11495 28.7001 6.08195 29.2001C6.02476 29.9639 5.6801 30.6776 5.11741 31.1973C4.55472 31.7169 3.81589 32.0038 3.04997 32.0001H2.90001C2.10794 31.966 1.36105 31.6219 0.820539 31.0419C0.280033 30.4619 -0.0107658 29.6927 0.0109688 28.9002C0.0839688 26.6402 -0.712038 16.1501 4.95396 10.8801C9.62696 6.27014 17.836 5.13015 18.881 5.02015C18.992 5.01015 19.105 5.00013 19.217 5.00013H22.9V3.00013C22.9296 2.38086 23.1433 1.78453 23.5139 1.28748C23.8845 0.790434 24.3949 0.415248 24.98 0.210091C25.3455 0.0717847 25.7331 0.000681894 26.124 0.000130203H26.126Z"
                                            fill="#686363" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_184_79">
                                            <rect width="37" height="32" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <a href="{{ $fnotice->link }}" target="_blank"> {{ $fnotice->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Notice Section  -->
    <section class="hero_notice_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="hero_notice_content">
                        <h2>{{ $topSection->title }}</h2>
                        <p>
                            {{ $topSection->text }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hero_notice_area">
                        <h3>Notice Board</h3>
                        <h5>SMS from MGSC</h5>
                        <ul>
                            @foreach ($notices as $notice)
                                <li>
                                    <a href="{{ $notice->link }}" target="_blank"> {{ $notice->title }}</a>
                                    <br />
                                    <span
                                        class="text-muted">{{ Carbon\Carbon::parse($notice->created_at)->format('F d, Y') }}</span>
                                </li>
                            @endforeach
                        </ul>
                        @if ($notices->count() > 5)
                            <div class="text-center">
                                <a href="{{ route('noticeBoard') }}"><small>View All</small></a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Section  -->

    <section class="event_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Events</h2>
                </div>
                <div class="col-12">
                    <div class="event_slider_area">
                        <!-- Swiper -->
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($events as $event)
                                    <div class="swiper-slide">
                                        <div class="event_slider_item">
                                            <div>
                                                <img class="img_scale_hover"
                                                    src="{{ asset('uploads/all') }}/{{ $event->image }}"
                                                    alt="Event image" />
                                            </div>

                                            <div class="event_slider_content">
                                                <h3 class="mb-1">{{ $event->title }}</h3>
                                                <span>{{ Carbon\Carbon::parse($event->created_at)->format('M d Y') }}</span>
                                                <br />
                                                <p>{{ $event->place }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next event_next_icon"></div>
                            <div class="swiper-button-prev event_prev_icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Counter Section  -->

    <section class="counter_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Members</h2>
                </div>
            </div>
        </div>
        <div class="counter_bg_area" style="background-image: url(assets/images/Home/counterBG.png)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="counter_item" id="counters_1">
                            <h2 class="counter" data-TargetNum="{{ $member->student }}"></h2>
                            <h3>Students</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="counter_item" id="counters_2">
                            <h2 class="counter" data-TargetNum="{{ $member->classroom }}"></h2>
                            <h3>Class Rooms</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="counter_item" id="counters_3">
                            <h2 class="counter" data-TargetNum="{{ $member->teacher }}"></h2>
                            <h3>Teachers</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="counter_item" id="counters_2">
                            <h2 class="counter" data-TargetNum="{{ $member->admin_staff }}"></h2>
                            <h3>Admin Staff</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Facilities Section  -->
    <section class="facilities_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Facilities</h2>

                    <div class="facilitites_slier_area">
                        <!-- Swiper -->
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($facilities as $facility)
                                    <div class="swiper-slide">
                                        <div class="facilities_slider_item">
                                            <img src="{{ asset('uploads/all') }}/{{ $facility->image }}"
                                                alt="facilities img" />
                                            <h3>{{ $facility->title }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next facilities_next_icon"></div>
                            <div class="swiper-button-prev facilities_prev_icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Achievements Section  -->
    <section class="achievements_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Achievements</h2>
                </div>
            </div>
        </div>
        <div class="achievement_content_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="achivement_item_area">
                            @foreach ($achievements as $achievement)
                                <div class="achievement_item">
                                    <img src="{{ asset('uploads/all') }}/{{ $achievement->image }}"
                                        alt="achievement image" />
                                    <p>
                                        {{ $achievement->description }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
