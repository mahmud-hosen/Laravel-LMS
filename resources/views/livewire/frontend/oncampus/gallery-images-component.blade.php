<div>
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row g-lg-5 g-lg-3">
                <div class="col-12">
                    <h2 class="page_title">{{ $gallery->title }}</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <small>{{ Carbon\Carbon::parse($gallery->created_at)->format('F d, Y') }}</small>
                </div>
            </div>
            <div class="row mt-3">
                @foreach ($images as $item)
                    <div class="col-md-3 mb-4">
                        <img src="{{ asset('uploads/all') }}/{{ $item->image }}" class="img-fluid rounded" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
