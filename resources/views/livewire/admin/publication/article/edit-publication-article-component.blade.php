@section('title')
    Dashboard - Articles
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Edit Article</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Publication</li>
                        <li class="breadcrumb-item active">Edit Article</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="font-weight-bold float-left">Article Details</h6>
                                    <a href="{{ route('admin.articles') }}" class="btn btn-primary btn-sm float-right"><i
                                            class="fa fa-list"></i>
                                        All Articles</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="storeData">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="title"
                                            wire:keyup="generateSlug" placeholder="Enter title" />
                                        @error('title')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="slug"
                                            placeholder="Enter slug" />
                                        @error('slug')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">News Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="news_link"
                                            placeholder="Enter link" />
                                        @error('news_link')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Content</label>
                                    <div class="col-sm-9">
                                        <div wire:ignore>
                                            <textarea class="form-control" id="summernoteContent"
                                                wire:model="content"></textarea>
                                        </div>
                                        @error('content')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-sm btn-primary">
                                            {!! loadingStateWithText('storeData', 'Submit') !!}
                                        </button>
                                        <button class="btn btn-sm btn-danger ml-1" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $('#summernoteContent').summernote({
                height: 250,
                width: '100%',
                toolbar: [
                    ['style', ['style', 'undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Enter Content',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('content', contents);
                    }
                }
            });

        });
    </script>
@endpush
