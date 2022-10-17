@section('title')
    Dashboard - Events
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Events</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Homepage</li>
                        <li class="breadcrumb-item active">Events</li>
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
                                    <h6 class="font-weight-bold float-left">Events</h6>
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                        data-target="#addModal"><i class="fa fa-plus"></i>
                                        Add New Event</button>
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Place</th>
                                            <th style="text-align: center;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($events->count() > 0)
                                            @foreach ($events as $item)
                                                <tr>
                                                    <td style="width: 5%; text-align: center;">{{ $item->id }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/all') }}/{{ $item->image }}"
                                                            style="height: 70px;" alt="">
                                                    </td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->place }}</td>
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
                            {{ $events->links('pagination-links') }}
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
                    <h6 class="modal-title font-weight-bold">Add New Event</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form wire:submit.prevent="storeData">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 font-weight-normal">Image <small
                                            class="text-muted">(Size:120x94)</small></label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" wire:model="image"
                                            style="padding: 5px; font-size: 13.5px;" />

                                        @error('image')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror

                                        <br>

                                        <div wire:loading wire:target="image" wire:key="image"
                                            style="font-size: 12.5px;" class="mr-2"><i
                                                class="fa fa-spinner fa-spin mt-3 ml-2"></i>
                                            Uploading</div>

                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="200"
                                                class="mt-2 mb-2" />
                                        @elseif($uploadedImage != '')
                                            <img src="{{ asset('uploads/all') }}/{{ $uploadedImage }}" width="200"
                                                class="mt-2 mb-2" />
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Title</label>
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
                                    <label for="name" class="col-sm-3 font-weight-normal">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" wire:model="date" />
                                        @error('date')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Place</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="place"
                                            placeholder="Enter place" />
                                        @error('place')
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
                    <h6 class="modal-title font-weight-bold">Edit Data</h6>
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
                                    <label for="" class="col-sm-3 font-weight-normal">Image <small
                                            class="text-muted">(Size:120x94)</small></label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" wire:model="image"
                                            style="padding: 5px; font-size: 13.5px;" />

                                        @error('image')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror

                                        <br>

                                        <div wire:loading wire:target="image" wire:key="image"
                                            style="font-size: 12.5px;" class="mr-2"><i
                                                class="fa fa-spinner fa-spin mt-3 ml-2"></i>
                                            Uploading</div>

                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="200"
                                                class="mt-2 mb-2" />
                                        @elseif($uploadedImage != '')
                                            <img src="{{ asset('uploads/all') }}/{{ $uploadedImage }}" width="200"
                                                class="mt-2 mb-2" />
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Title</label>
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
                                    <label for="name" class="col-sm-3 font-weight-normal">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" wire:model="date" />
                                        @error('date')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Place</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="place"
                                            placeholder="Enter place" />
                                        @error('place')
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
                                        <button class="btn btn-sm btn-danger ml-2" data-dismiss="modal" wire:click="close">Cancel</button>
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
