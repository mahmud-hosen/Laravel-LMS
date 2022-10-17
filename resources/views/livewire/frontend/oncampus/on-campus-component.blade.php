<div>
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row g-lg-5 g-lg-3">
                <div class="col-12">
                    <h2 class="page_title">On Campus</h2>
                </div>

            </div>
            <div class="row">
                @foreach ($gallaries as $item)
                    <div class="col-md-6">
                        <div class="campus_item">
                            <a href="{{ route('onCampusImages', ['slug'=>$item->slug]) }}">
                                <img src="{{ asset('uploads/all') }}/{{ $item->image }}" alt="campus image">
                                <div class="p-3">
                                    <h4 class="mb-1">{{ $item->title }}</h4>

                                    <span style="color: black;">{{ $item->description }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
