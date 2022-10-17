@section('title')
    Dashboard - Faculty
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Article</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Publication</li>
                        <li class="breadcrumb-item active">Article</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="font-weight-bold float-left">All Articles</h6>
                                    <a href="{{ route('admin.addArticle') }}"
                                        class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>
                                        Add Article</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 mb-2 sort_cont">
                                    <label class="font-weight-normal" style="">Show</label>
                                    <select name="sortuserresults" class="sinput" id=""
                                        wire:model="sortingValue">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <label class="font-weight-normal" style="">entries</label>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 search_cont">
                                    <label class="font-weight-normal mr-2">Search:</label>
                                    <input type="search" class="sinput" placeholder="Search"
                                        wire:model="searchTerm" />
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13.5px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ID</th>
                                            <th>Title</th>
                                            <th>News Link</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($articles->count() > 0)
                                            @foreach ($articles as $item)
                                                <tr>
                                                    <td style="width: 5%; text-align: center;">{{ $item->id }}</td>

                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->news_link }}</td>
                                                    <td style="text-align: center;">
                                                        <div class="btn-group">
                                                            <button type="button" data-toggle="dropdown"
                                                                class="btn btn-primary btn-xs"
                                                                style="border-radius: 5px; padding: 1px 10px 2px 10px;">Option
                                                                <i class="fa fa-caret-down"></i></button>

                                                            <div class="dropdown-menu dropdown-menu-right" role="menu"
                                                                style="font-size: 13.5px;">

                                                                <a class="dropdown-item" href="{{ route('admin.editArticle', ['id'=>$item->id]) }}"><i
                                                                        class="bi bi-pencil-square"></i> Edit</a>

                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                    wire:click="deleteConfirmation({{ $item->id }})"><i
                                                                        class="bi bi-trash"></i> Delete</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" style="text-align: center; padding: 30px 0px;">No Data
                                                    Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $articles->links('pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@push('scripts')
    <script>
        window.addEventListener('showEditModal', event => {
            $('#editModal').modal('show');
        });

        window.addEventListener('closeModal', event => {
            $('#addModal').modal('hide');
            $('#editModal').modal('hide');
        });


        $('.table-responsive').on('show.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "inherit");
        });

        $('.table-responsive').on('hide.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "auto");
        });

        $('.slno').change(function() {
            var id = $(this).data('id');
            var value = $(this).val();

            @this.changeSL(id, value);
        })
    </script>
@endpush
