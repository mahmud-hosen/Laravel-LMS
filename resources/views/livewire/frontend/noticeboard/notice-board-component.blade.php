<div>
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Notice</h2>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="hero_notice_area">
                        <h3>Notice Board</h3>
                        <h5>SMS from MGSC</h5>
                        <ul>
                            @if ($notices->count() > 0)
                                @foreach ($notices as $item)
                                    <li>
                                        <a href="{{ $item->link }}" target="_blank"> {{ $item->title }}</a>
                                        <br />
                                        <span class="text-muted"> {{ Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</span>
                                    </li>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <small>No notice found</small>
                                    </div>
                                </div>
                            @endif
                        </ul>
                        {{ $notices->links('pagination-links-front') }}
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
