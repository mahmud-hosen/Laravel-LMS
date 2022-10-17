<div>
    <section class="result_wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="result_logo_area">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/header/logo.png') }}" alt="Logo" />
                        </div>

                        <h2 class="page_title">Morning Glory School & College</h2>
                        <p>
                            Morning Glory School & College Test / Pre-Test / Model Test /
                            Term End Exam Results
                        </p>
                    </div>
                    <form wire:submit.prevent="getResult" class="result_form_area">
                        <div class="form-group row mb-3 mt-4">
                            <label for="" class="col-sm-3">
                                Session:</label>
                            <div class="col-sm-6">
                                <select class="form-control" aria-label="Default select example" wire:model="session">
                                    <option selected>-- Select --</option>
                                    @foreach ($sessions as $item)
                                        <option value="{{ $item->session }}">{{ $item->session }}</option>
                                    @endforeach
                                </select>
                                @error('session')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-3">
                                Exam:</label>
                            <div class="col-sm-6">
                                <select class="form-control" aria-label="Default select example" wire:model="exam">
                                    <option selected>-- Select --</option>
                                    @foreach ($exams as $item)
                                        <option value="{{ $item->exam }}">{{ $item->exam }}</option>
                                    @endforeach
                                </select>
                                @error('exam')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-3">
                                Class:</label>
                            <div class="col-sm-6">
                                <select class="form-control" aria-label="Default select example" wire:model="class">
                                    <option selected>-- Select --</option>
                                    @foreach ($classes as $item)
                                        <option value="{{ $item->class }}">{{ $item->class }}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-3">Student ID: </label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="" id="" placeholder="Enter Your ID"
                                    wire:model="student_id">
                                @error('student_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="input_row">
                            <button type="submit">
                                Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="resultModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Result</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5" wire:poll>
                    @if ($result != '')
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $student_id }}</td>
                                    <th>Session</th>
                                    <td>{{ $session }}</td>
                                </tr>

                                <tr>
                                    <th>Exam</th>
                                    <td>{{ $exam }}</td>
                                    <th>Class</th>
                                    <td>{{ $class }}</td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="pt-4" style="text-align: center;">Result <br> <h4 class="mt-2">{{ $result->gpa }}</h4></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    @else
                        <div class="text-center mt4">
                            <p>No result found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('showResult', event => {
            $('#resultModal').modal('show');
        });
    </script>
@endpush
