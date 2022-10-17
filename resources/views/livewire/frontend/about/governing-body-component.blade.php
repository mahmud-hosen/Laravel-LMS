<div>
    <!-- Govertment Title Section  -->
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Governing Body</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Govertment Staff Section  -->
    <section class="govertment_staff_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($items as $item)
                    @if ($item->serial == 1)
                        <div class="col-12 d-flex align-items-center justify-content-center mb-5 pb-5">
                            <div class="staff_item text-center">
                                <img src="{{ asset('uploads/all') }}/{{ $item->image }}" alt="Teacher img" />
                                <h4>{{ $item->name }} </h4>
                                <p>({{ $item->designation }})</p>
                            </div>
                        </div>
                    @elseif($item->serial == 2 || $item->serial == 3 || $item->serial == 4)
                        <div class="col-4 mb-5 pb-5">
                            <div class="inner_staff_item_area">
                                <div class="staff_item text-center">
                                    <img src="{{ asset('uploads/all') }}/{{ $item->image }}" alt="Teacher img" />
                                    <h4>{{ $item->name }} </h4>
                                    <p>({{ $item->designation }})</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-4">
                            <div class="bottom_staff_area">
                                <div class="bottom_staff_row">
                                    <div class="staff_item text-center">
                                        <img src="{{ asset('uploads/all') }}/{{ $item->image }}" alt="Teacher img" />
                                        <h4>{{ $item->name }} </h4>
                                        <p>({{ $item->designation }})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
