<div>
    @section('title')
        Admin Login
    @endsection

    <section id="SignupForm">
        <div class="container">
            <div class="row justify-content-center content">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}"
                                        class="rounded-circle logo" alt="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h5 class="font-weight-bold title">Admin Login</h5>

                                    <div class="dropdown-divider mt-4"></div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="col-md-10">
                                    @auth
                                        {{ Auth::user()->id }}
                                    @endauth
                                    @if (session()->has('errorMessage'))
                                        <div class="alert alert-danger text-center pt-2 pb-2">{{ session('errorMessage') }}
                                        </div>
                                    @endif
                                    <form wire:submit.prevent="adminLogin">
                                        <div class="form-group">
                                            <label for="email" class="text-muted"><i class="fa fa-envelope"></i>
                                                Email</label>
                                            <input type="email" class="form-control" placeholder="Enter email"
                                                wire:model="email" />

                                            @error('email')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                            @if (session()->has('email_error'))
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ session('email_error') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="text-muted"><i class="fa fa-lock"></i>
                                                Password</label>
                                            <input type="password" class="form-control" placeholder="Enter password"
                                                wire:model="password" />

                                            @error('password')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center mt-4">
                                            <button type="submit">
                                                {!! loadingStateWithText('adminLogin', 'Login') !!}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    {{-- Toaster --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-bottom-right"
            }

            $('.select2').select2({
                dropdownAutoWidth: true,
            });
        });

        window.addEventListener('success', event => {
            toastr.success(event.detail.message);
        });
        window.addEventListener('warning', event => {
            toastr.warning(event.detail.message);
        });
        window.addEventListener('error', event => {
            toastr.error(event.detail.message);
        });
    </script>
@endpush
