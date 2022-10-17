@section('title')
    Dashboard - Notice
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Notice</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notice</li>
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
                                    <h6 class="font-weight-bold float-left">All Notices</h6>
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                        data-target="#addModal"><i class="fa fa-plus"></i>
                                        Add New Notice</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                            <th>title</th>
                                            <th>Link</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($notices->count() > 0)
                                            @foreach ($notices as $item)
                                                <tr>
                                                    <td style="width: 5%; text-align: center;">{{ $item->id }}</td>

                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->link }}</td>
                                                    <td style="text-align: center;">
                                                        <div class="btn-group">
                                                            <button type="button" data-toggle="dropdown"
                                                                class="btn btn-primary btn-xs"
                                                                style="border-radius: 5px; padding: 1px 10px 2px 10px;">Option
                                                                <i class="fa fa-caret-down"></i></button>

                                                            <div class="dropdown-menu dropdown-menu-right" role="menu"
                                                                style="font-size: 13.5px;">

                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                    wire:click="editData({{ $item->id }})"><i
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
                                                <td colspan="6" style="text-align: center; padding: 30px 0px;">No Data
                                                    Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $notices->links('pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div wire:ignore.self class="modal fade" id="addModal" data-backdrop="static" data-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Add Notice</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form wire:submit.prevent="storeData">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 font-weight-normal">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="title"
                                            placeholder="Enter title" />
                                        @error('title')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="link" class="col-sm-3 font-weight-normal">Google Drive Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="link"
                                            placeholder="Enter link" />
                                        @error('link')
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

    <!-- Add Modal -->
    <div wire:ignore.self class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Edit Faculty</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form wire:submit.prevent="updateData">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 font-weight-normal">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="title"
                                            placeholder="Enter title" />
                                        @error('title')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="link" class="col-sm-3 font-weight-normal">Google Drive Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="link"
                                            placeholder="Enter link" />
                                        @error('link')
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
                                        <button class="btn btn-sm btn-danger ml-2" wire:click="close" data-dismiss="modal">Cancel</button>
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
