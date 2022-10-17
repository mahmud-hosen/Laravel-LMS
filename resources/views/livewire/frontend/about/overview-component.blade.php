<div>
    <section class="hero_wrapper" style="background-image: url({{ asset('assets/images/Home/hero_img.png') }})">

    </section>
    <div class="overview_text">
        <h2 class="page_title">Overview</h2>
    </div>
    <!-- Histroy Section  -->
    <section class="history_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">HISTORY</h2>
                    <h5>
                        {!! $overview->history !!}
                    </h5>
                </div>
            </div>
        </div>
    </section>
    <!-- Histroy Section  -->
    <section class="history_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">MOTTO</h2>
                    <h5>{!! $overview->motto !!}</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- Histroy Section  -->
    <section class="history_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">VISION</h2>
                    {!! $overview->vision !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Histroy Section  -->
    <section class="history_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">MISSION</h2>
                    {!! $overview->mission !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Histroy Section  -->
    <section class="history_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">OBJECTIVES</h2>
                    {!! $overview->objectives !!}
                </div>
            </div>
        </div>
    </section>
</div>
