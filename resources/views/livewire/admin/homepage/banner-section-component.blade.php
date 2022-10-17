@section('title')
    Dashboard - Homepage
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Top Section</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Homepage</li>
                        <li class="breadcrumb-item active">Top Section</li>
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
                                <div class="col-md-12">
                                    <h6 class="font-weight-bold float-left">Details</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="storeDetails">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Cover Image</label>
                                    <div class="col-sm-9">
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
                                    <label for="" class="font-weight-normal col-sm-3">Title</label>
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
                                    <label for="" class="font-weight-normal col-sm-3">Text</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" wire:model="text" placeholder="Enter text"
                                            style="height: 120px;"></textarea>
                                        @error('text')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary pt-1 pb-1 pl-4 pr-4">
                                            {!! loadingStateWithText('storeDetails', 'Submit') !!}
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
                                    <h6 class="font-weight-bold float-left">Featured Notices</h6>
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                        data-target="#addModal">
                                        <i class="fa fa-plus"></i> Add New</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13.5px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">ID</th>
                                            <th>Title</th>
                                            <th style="text-align: center;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($featuredNotices->count() > 0)
                                            @foreach ($featuredNotices as $item)
                                                <tr>
                                                    <td style="width: 5%; text-align: center;">{{ $item->id }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td style="text-align: center;">
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs"
                                                            style="border-radius: 5px; padding: 1px 10px 2px 10px;" wire:click="removeFeatured({{ $item->id }})">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style="text-align: center; padding: 30px 0px;">No Data
                                                    Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
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
                    <h6 class="modal-title font-weight-bold">All Notices</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body" style="max-height: 65vh; overflow-y: scroll;">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <small class="text-muted">Click on list item to add as featured</small>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="list-group">
                                @foreach ($allNotices as $notice)
                                    <a href=""
                                        class="list-group-item list-group-item-action mb-2 @if ($notice->featured == 1) active @endif"
                                        wire:click.prevent="makeFeatured({{ $notice->id }})">{{ $notice->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    {{-- <div wire:ignore.self class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false"
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
                                    <label for="name" class="col-sm-3 font-weight-normal">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="roll_name"
                                            placeholder="Enter name" />
                                        @error('roll_name')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-3 font-weight-normal">Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" wire:model="roll_image"
                                            style="padding: 5px; font-size: 13.5px;" />

                                        @error('roll_image')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror

                                        <br>

                                        <div wire:loading wire:target="roll_image" wire:key="roll_image"
                                            style="font-size: 12.5px;" class="mr-2"><i
                                                class="fa fa-spinner fa-spin mt-3 ml-2"></i>
                                            Uploading</div>

                                        @if ($roll_image)
                                            <img src="{{ $roll_image->temporaryUrl() }}" width="120"
                                                class="mt-2 mb-2" />
                                        @elseif($uploadedRollImage != '')
                                            <img src="{{ asset('uploads/all') }}/{{ $uploadedRollImage }}"
                                                width="120" class="mt-2 mb-2" />
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Time</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label for="" class="font-weight-normal">From</label>
                                            <input type="date" class="form-control" wire:model="date_from" />
                                            @error('date_from')
                                                <span class="text-danger"
                                                    style="font-size: 12.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="font-weight-normal">To</label>
                                            <input type="date" class="form-control" wire:model="date_to" />
                                            @error('date_to')
                                                <span class="text-danger"
                                                    style="font-size: 12.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
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
    </div> --}}
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
