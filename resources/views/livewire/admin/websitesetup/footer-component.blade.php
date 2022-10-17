@section('title')
    Dashboard - Website Setup (Header)
@endsection
<div>
    <style>
        .scrn992 {
            width: 15%;
        }

        .slscrn992 {
            text-align: center;
            width: 4%;
        }

        .actionscrn992 {
            width: 15%;
            text-align: center;
        }

        @media only screen and (max-width: 992px) {
            .scrn992 {
                display: none;
            }

            .slscrn992 {
                display: none;
            }

            .actionscrn992 {
                width: 35%;
                text-align: center;
            }
        }

        .dropdown-item {
            color: black;
            margin-bottom: 5px;
        }

        .dropdown-item:hover {
            color: #046A70;
            transition-duration: .2s;
        }

    </style>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Footer</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Website Setup</li>
                        <li class="breadcrumb-item active">Footer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h6 class="font-weight-bold">Details</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form wire:submit.prevent="storeData">

                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Location</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="" class="font-weight-normal" style="font-size: 13px;">Line
                                                1</label>
                                            <input type="text" class="form-control" wire:model="location_line1"
                                                placeholder="location line 1" />
                                            @error('location_line1')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="font-weight-normal" style="font-size: 13px;">Line
                                                2</label>
                                            <input type="text" class="form-control" wire:model="location_line2"
                                                placeholder="location line 2" />
                                            @error('location_line2')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Hours</label>
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="" class="font-weight-normal" style="font-size: 13px;">Time
                                                    (From)</label>
                                                <input type="time" class="form-control" wire:model="time_from" />
                                                @error('time_from')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-1 text-center">
                                                <label for="" class="font-weight-normal"
                                                    style="font-size: 13px;"></label>
                                                <div class="mt-3">to</div>
                                            </div>

                                            <div class="col-4">
                                                <label for="" class="font-weight-normal" style="font-size: 13px;">Time
                                                    (to)</label>
                                                <input type="time" class="form-control" wire:model="time_to" />
                                                @error('time_to')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-4">
                                                <label for="" class="font-weight-normal" style="font-size: 13px;">Day
                                                    (From)</label>
                                                <select class="form-control" wire:model="day_from">
                                                    <option value="">-- Select --</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednessday">Wednessday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                </select>
                                                @error('day_from')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-1 text-center">
                                                <label for="" class="font-weight-normal"
                                                    style="font-size: 13px;"></label>
                                                <div class="mt-3">to</div>
                                            </div>

                                            <div class="col-4">
                                                <label for="" class="font-weight-normal" style="font-size: 13px;">Day
                                                    (to)</label>
                                                <select class="form-control" wire:model="day_to">
                                                    <option value="">-- Select --</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednessday">Wednessday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                </select>
                                                @error('day_to')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="phone"
                                            placeholder="phone" />
                                        @error('phone')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="email"
                                            placeholder="email" />
                                        @error('email')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Copyright Text</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="copyright_text"
                                            placeholder="copyright text" />
                                        @error('copyright_text')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary pl-4 pr-4 pt-1 pb-1">
                                            {!! loadingStateWithText('storeData', 'Submit') !!}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="font-weight-bold float-left">Important Links</h6>
                                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                        data-target="#addModal" style="padding: 1px 12px;"><i class="fa fa-plus"></i> Add Link</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div class="row mb-3">
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
                            </div> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13.5px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>link</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($links->count() > 0)
                                            @foreach ($links as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
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
                                                                    wire:click="editLink({{ $item->id }})"><i
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
                                                <td colspan="4" style="text-align: center; padding: 30px 0px;">No Data
                                                    Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $links->links('pagination-links') }}
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
                    <h6 class="modal-title font-weight-bold">Add New Link</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form wire:submit.prevent="storeLink">
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
                                    <label for="name" class="col-sm-3 font-weight-normal">Link</label>
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
                                            {!! loadingStateWithText('storeLink', 'Submit') !!}
                                        </button>
                                        <button class="btn btn-sm btn-danger ml-2" data-dismiss="modal">Cancel</button>
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
                    <h6 class="modal-title font-weight-bold">Edit Link</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form wire:submit.prevent="updateLink">
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
                                    <label for="name" class="col-sm-3 font-weight-normal">Link</label>
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
                                            {!! loadingStateWithText('updateLink', 'Submit') !!}
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
    </script>
@endpush
