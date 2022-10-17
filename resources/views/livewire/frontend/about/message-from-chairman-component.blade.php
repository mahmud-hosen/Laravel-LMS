<div>
    <!-- Govertment Title Section  -->
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Chairman’s Foreword</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Govertment Staff Section  -->
    <section class="govertment_staff_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="staff_item text-center">
                        <img src="{{ asset('uploads/all') }}/{{ $msg->image }}" alt="Teacher img" />
                        <h4>{{ $msg->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Govertment Title Section  -->
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Message from the Chairman</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <div class="row mt-4 mb-5">
                <div class="col-12">
                    <p>
                        {!! $msg->message !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Govertment Title Section  -->
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Roll of Honour</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Govertment Inner Staff Section  -->
    <section class="govertment_role_staff_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="role_img_area">
                        @foreach ($rolls as $item)
                            <div class="text-center mb-3">
                                <img src="{{ asset('uploads/all') }}/{{ $item->image }}" alt="staff img" />
                                <h6 class="mt-2">{{ $item->name }}</h6>
                                <small>{{ Carbon\Carbon::parse($item->date_from)->format('d M, Y') }} - {{ Carbon\Carbon::parse($item->date_to)->format('d M, Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
