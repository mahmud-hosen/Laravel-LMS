@section('title')
    Dashboard - Overview
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Overview</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">About Menu</li>
                        <li class="breadcrumb-item active">Overview</li>
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
                                <div class="col-md-12 text-center">
                                    <h5 class="font-weight-bold">Overview Details</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="storeData">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">History</label>
                                        <div wire:ignore>
                                            <textarea id="summernoteHistory" autocomplete="off"
                                                wire:model="history"></textarea>
                                        </div>
                                        @error('history')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Motto</label>
                                        <div wire:ignore>
                                            <textarea id="summernoteMotto" autocomplete="off"
                                                wire:model="motto"></textarea>
                                        </div>
                                        @error('motto')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">Vision</label>
                                        <div wire:ignore>
                                            <textarea class="form-control" id="summernoteVision"
                                                wire:model="vision"></textarea>
                                        </div>
                                        @error('vision')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Mission</label>
                                        <div wire:ignore>
                                            <textarea class="form-control" id="summernoteMission"
                                                wire:model="mission"></textarea>
                                        </div>
                                        @error('mission')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <label for="">Objectives</label>
                                        <div wire:ignore>
                                            <textarea class="form-control" id="summernoteObjectives"
                                                wire:model="objectives"></textarea>
                                        </div>
                                        @error('objectives')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary pl-4 pr-4">Submit</button>
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
            $('#summernoteHistory').summernote({
                height: 250,
                width: '100%',
                toolbar: [
                    ['style', ['style','undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Enter History',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('history', contents);
                    }
                }
            });

            $('#summernoteMotto').summernote({
                height: 250,
                width: '100%',
                toolbar: [
                    ['style', ['style','undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Enter motto',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('motto', contents);
                    }
                }
            });

            $('#summernoteVision').summernote({
                height: 250,
                width: '100%',
                toolbar: [
                    ['style', ['style','undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Enter vision',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('vision', contents);
                    }
                }
            });

            $('#summernoteMission').summernote({
                height: 250,
                width: '100%',
                toolbar: [
                    ['style', ['style','undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Enter Mission',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('mission', contents);
                    }
                }
            });

            $('#summernoteObjectives').summernote({
                height: 250,
                width: '100%',
                toolbar: [
                    ['style', ['style','undo', 'redo']],
                    ['font', ['bold', 'underline', 'clear', 'fontsize', 'fontname']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['view', ['fullscreen']],
                ],
                placeholder: 'Enter objectives',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('objectives', contents);
                    }
                }
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
