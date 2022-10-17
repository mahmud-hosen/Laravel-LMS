<div>
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">{{ $article->title }}</h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <small
                        class="text-muted">{{ Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}</small>

                    <br>

                    <div class="mt-4">
                        @if ($article->news_link != '')
                            <a href="{{ $article->news_link }}" target="_blank">View News</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </section>
</div>
