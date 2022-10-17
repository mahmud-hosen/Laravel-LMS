@section('title')
    Dashboard - Members
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Members</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Homepage</li>
                        <li class="breadcrumb-item active">Members</li>
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
                                    <label for="" class="col-sm-3">Students</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="student" placeholder="Total student" />
                                        @error('student')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Teachers</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="teacher" placeholder="Total teacher" />
                                        @error('teacher')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Classrooms</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="classroom" placeholder="Total classroom" />
                                        @error('classroom')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Admin Staffs</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="admin_staff" placeholder="Total admin staff" />
                                        @error('admin_staff')
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
        window.addEventListener('view_edit_modal', event => {
            $('#edit_category_modal').modal('show');
        });

        window.addEventListener('close-modal', event => {
            $('#add_category_modal').modal('hide');
            $('#edit_category_modal').modal('hide');
        });


        $('.table-responsive').on('show.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "inherit");
        });

        $('.table-responsive').on('hide.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "auto");
        });
    </script>
@endpush
