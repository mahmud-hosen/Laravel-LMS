@section('title')
    Dashboard - Website Setup (Header)
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Header</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Website Setup</li>
                        <li class="breadcrumb-item active">Header</li>
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
                                    <label for="" class="col-sm-3">Logo <small
                                            class="text-muted">(Size:120x94)</small></label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" wire:model="logo"
                                            style="padding: 5px; font-size: 13.5px;" />

                                        @error('logo')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror

                                        <br>

                                        <div wire:loading wire:target="logo" wire:key="logo" style="font-size: 12.5px;"
                                            class="mr-2"><i class="fa fa-spinner fa-spin mt-3 ml-2"></i>
                                            Uploading</div>

                                        @if ($logo)
                                            <img src="{{ $logo->temporaryUrl() }}" width="120"
                                                class="mt-2 mb-2" />
                                        @elseif($uploadedLogo != '')
                                            <img src="{{ asset('uploads/all') }}/{{ $uploadedLogo }}" width="120"
                                                class="mt-2 mb-2" />
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="title" />
                                        @error('title')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Sub Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="sub_title" />
                                        @error('sub_title')
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
            </div>
        </div>
    </div>


</div>

@push('scripts')
    <script>
        $('#selectThis').on('click', function() {
            var name = $('#ffilename').val();

            @this.set('image', name);

            $('#filemanagerModal').modal('hide');

        })
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '.show_more', function() {

                var id = $(this).data('id');
                @this.showMore(id);
            });

            $(document).on('click', '.delete_btn', function() {
                var id = $(this).data('id');
                @this.deleteConfirmation(id);
            });
        });

        window.addEventListener('view_edit_modal', event => {
            $('#edit_category_modal').modal('show');
        });

        window.addEventListener('close-modal', event => {
            $('#add_category_modal').modal('hide');
            $('#edit_category_modal').modal('hide');
        });

        function copyToClipboard() {
            document.getElementById('reglink').select();
            document.execCommand('copy');

            toastr.success('Link copied to clipboard');
        }


        $('.table-responsive').on('show.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "inherit");
        });

        $('.table-responsive').on('hide.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "auto");
        });
    </script>
@endpush
