<div>
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Publication</h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    @foreach ($magazines as $magazine)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('uploads/all') }}/{{ $magazine->image }}"
                                            class="img-fluid" style="width: 100%;" alt="">

                                        <h5 class="mt-3">{{ $magazine->title }}</h5>
                                        <p class="mt-3 mb-4" style="font-size: 13.5px;">
                                            {{ $magazine->description }}</p>

                                        <a href="{{ $magazine->link }}" target="_blank">CLICK HERE TO READ »</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-md-8">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            @foreach ($articles as $article)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card" style="height: 30vh;">
                                            <div class="card-body">
                                                <h5 class="mt-3">{{ $article->title }}</h5>
                                                <p class="mt-3 mb-4" style="font-size: 13.5px;">
                                                    {{ $article->description }}</p>

                                                <p class="text-muted">{{ Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}</p>

                                                <div class="dropdown-divider"></div>

                                                <div class="text-center">
                                                    <a href="{{ route('publicationReadArticle', ['slug' => $article->slug]) }}"
                                                        class="btn btn-secondary btn-sm mt-5">Read Article »</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-11">
                    <div class="publication_post_area">
                        <div class="publication_item publication_first_item">
                            <img src="{{ asset('assets/images/classes/publication_img1.png') }}"
                                alt="publication img" />
                            <div class="publication_content">
                                <h4>
                                    MGSC Quest 2021 (15th Edition) Yearly Magazine of Morning
                                    Glory School & College 15th Edition View
                                </h4>
                                <a href="">REA MORE »</a>
                            </div>
                        </div>
                        <div class="publication_item">
                            <div class="publication_content">
                                <h4>
                                    ডিজিটাল বাংলাদেশের অবদান করোনা মহিমারীতেও থেমে নেই মর্নিং
                                    গ্লোরি স্কুল এন্ড কলেজের পাঠদান – দৈনিক নাগরিক দাবি
                                </h4>
                                <a href="">REA MORE »</a>
                                <h6>March 25, 2020</h6>
                            </div>
                        </div>
                        <div class="publication_item">
                            <div class="publication_content">
                                <h4>
                                    করোনাকালে শিশুর যত্ন-পড়াশোনা কীভাবে? লেখক: জয়ী জেসমিন,
                                    শিক্ষক, মর্নিং গ্লোরি স্কুল অ্যান্ড কলেজ এবং শিশু শিক্ষা
                                    মনস্তত্ত্ব ব্যবস্থপনা বিশ্লেষক। ২৫ এপ্রিল ২০২০, প্রথম আলো
                                    করোনাকালে শিশুর যত্ন-পড়াশোনা কীভাবে?
                                </h4>
                                <a href="">REA MORE »</a>
                                <h6>April 25, 2020</h6>
                            </div>
                        </div>
                        <div class="publication_item publication_last_item">
                            <div class="publication_content">
                                <h4>
                                    বয়ঃসন্ধিকালে শিশুর মানবিক বিকাশে মা–বাবা ও শিক্ষকের ভূমিকা
                                    লেখক: জয়ী জেসমিন, শিক্ষক, মর্নিং গ্লোরি স্কুল অ্যান্ড কলেজ
                                    এবং শিশু শিক্ষা মনস্তত্ত্ব ব্যবস্থপনা বিশ্লেষক। ২২ জুন ২০২০,
                                    প্রথম আলো বয়ঃসন্ধিকালে শিশুর মানবিক বিকাশে মা–বাবা
                                </h4>
                                <a href="">REA MORE »</a>
                                <h6>June 22, 2020</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</div>
