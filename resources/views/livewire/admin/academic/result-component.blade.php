@section('title')
    Dashboard - Faculty
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">Result</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Academic</li>
                        <li class="breadcrumb-item active">Result</li>
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
                                    <h6 class="font-weight-bold float-left">All Results</h6>
                                    <button type="button" class="btn btn-primary btn-sm float-right ml-2"
                                        data-toggle="modal" data-target="#settingModal"><i class="fa fa-cog"></i>
                                        Settings</button>
                                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                        data-target="#addModal"><i class="fa fa-plus"></i>
                                        Add Result</button>
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
                                            <th>Student ID</th>
                                            <th>Session</th>
                                            <th>Exam</th>
                                            <th>Class</th>
                                            <th>Result</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($results->count() > 0)
                                            @foreach ($results as $item)
                                                <tr>
                                                    <td>{{ $item->student_id }}</td>
                                                    <td>{{ $item->session }}</td>
                                                    <td>{{ $item->exam }}</td>
                                                    <td>{{ $item->class }}</td>
                                                    <td>{{ $item->gpa }}</td>
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
                            {{ $results->links('pagination-links') }}
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
                    <h6 class="modal-title font-weight-bold">Add New Result</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form wire:submit.prevent="storeData">
                                <div class="form-group row">
                                    <label for="student_id" class="col-sm-3 font-weight-normal">Student ID</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" wire:model="student_id"
                                            placeholder="Enter id" />
                                        @error('student_id')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Session</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" wire:model="session">
                                            <option value="">-- Select --</option>
                                            @foreach ($sessions as $item)
                                                <option value="{{ $item->session }}">{{ $item->session }}</option>
                                            @endforeach
                                        </select>
                                        @error('session')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Exam</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" wire:model="exam">
                                            <option value="">-- Select --</option>
                                            @foreach ($exams as $item)
                                                <option value="{{ $item->exam }}">{{ $item->exam }}</option>
                                            @endforeach
                                        </select>
                                        @error('exam')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Class</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" wire:model="class">
                                            <option value="">-- Select --</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->class }}">{{ $item->class }}</option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gpa" class="col-sm-3 font-weight-normal">Result (CGPA)</label>
                                    <div class="col-sm-9">
                                        <input type="number" step="any" class="form-control" wire:model="cgpa"
                                            placeholder="Enter cgpa" />
                                        @error('cgpa')
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
                                    <label for="student_id" class="col-sm-3 font-weight-normal">Student ID</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" wire:model="student_id"
                                            placeholder="Enter id" />
                                        @error('student_id')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Session</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" wire:model="session">
                                            <option value="">-- Select --</option>
                                            @foreach ($sessions as $item)
                                                <option value="{{ $item->session }}">{{ $item->session }}</option>
                                            @endforeach
                                        </select>
                                        @error('session')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Exam</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" wire:model="exam">
                                            <option value="">-- Select --</option>
                                            @foreach ($exams as $item)
                                                <option value="{{ $item->exam }}">{{ $item->exam }}</option>
                                            @endforeach
                                        </select>
                                        @error('exam')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 font-weight-normal">Class</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" wire:model="class">
                                            <option value="">-- Select --</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->class }}">{{ $item->class }}</option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <span class="text-danger"
                                                style="font-size: 12.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gpa" class="col-sm-3 font-weight-normal">Result (CGPA)</label>
                                    <div class="col-sm-9">
                                        <input type="number" step="any" class="form-control" wire:model="cgpa"
                                            placeholder="Enter cgpa" />
                                        @error('cgpa')
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
    <div wire:ignore.self class="modal fade" id="settingModal" data-backdrop="static" data-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Result Settings</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 50vh;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="float-left"><strong>Sessions</strong></h6>
                                    <button class="btn btn-sm btn-primary float-right"
                                        style="padding: 1px 7px; font-size: 12.5px;"
                                        wire:click.prevent="changeUI('session')">
                                        <i class="fa fa-plus"></i>
                                        Add New
                                    </button>
                                </div>
                                <div class="card-body">
                                    @if ($uiStatus == 'session')
                                        <form wire:submit.prevent="addSession">
                                            <div class="form-group">
                                                <label for="" class="font-weight-normal">Enter Session</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="session" placeholder="eg. 2000-2021" />
                                                @error('session')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </div>
                                            <div class="dropdown-divider mt-3"></div>
                                        </form>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-group">
                                                @foreach ($sessions as $key => $session)
                                                    <li class="list-group-item">
                                                        {{ $key + 1 }}. {{ $session->session }}

                                                        <a href="" style="float: right;"
                                                            wire:click.prevent="deleteSession({{ $session->id }})"><i
                                                                class="fa fa-times text-danger" title="Delete"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="float-left"><strong>Exam</strong></h6>
                                    <button class="btn btn-sm btn-primary float-right"
                                        style="padding: 1px 7px; font-size: 12.5px;"
                                        wire:click.prevent="changeUI('exam')">
                                        <i class="fa fa-plus"></i>
                                        Add New
                                    </button>
                                </div>
                                <div class="card-body">
                                    @if ($uiStatus == 'exam')
                                        <form wire:submit.prevent="addExam">
                                            <div class="form-group">
                                                <label for="" class="font-weight-normal">Enter Exam</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="exam" placeholder="eg. 1st Term" />
                                                @error('exam')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </div>
                                            <div class="dropdown-divider mt-3"></div>
                                        </form>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-group">
                                                @foreach ($exams as $key => $exam)
                                                    <li class="list-group-item">
                                                        {{ $key + 1 }}. {{ $exam->exam }}

                                                        <a href="" style="float: right;"
                                                            wire:click.prevent="deleteExam({{ $exam->id }})"><i
                                                                class="fa fa-times text-danger" title="Delete"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="float-left"><strong>Class</strong></h6>
                                    <button class="btn btn-sm btn-primary float-right"
                                        style="padding: 1px 7px; font-size: 12.5px;"
                                        wire:click.prevent="changeUI('class')">
                                        <i class="fa fa-plus"></i>
                                        Add New
                                    </button>
                                </div>
                                <div class="card-body">
                                    @if ($uiStatus == 'class')
                                        <form wire:submit.prevent="addClass">
                                            <div class="form-group">
                                                <label for="" class="font-weight-normal">Enter Class</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="class" placeholder="eg. Class IV" />
                                                @error('class')
                                                    <span class="text-danger"
                                                        style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </div>
                                            <div class="dropdown-divider mt-3"></div>
                                        </form>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-group">
                                                @foreach ($classes as $key => $class)
                                                    <li class="list-group-item">
                                                        {{ $key + 1 }}. {{ $class->class }}

                                                        <a href="" style="float: right;"
                                                            wire:click.prevent="deleteClass({{ $class->id }})"><i
                                                                class="fa fa-times text-danger" title="Delete"></i></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
