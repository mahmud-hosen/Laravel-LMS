<div>
    <!-- Govertment Title Section  -->
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Faculty - Pre Primary</h2>
                </div>
            </div>
        </div>
    </section>



    <!-- Govertment bottom inner staff section -->
    <section class="govertment_bottom_staff_wrapper alumni_staff_wrapper default_section_gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Principal</h2>
                    <div class="bottom_staff_area">
                        <div class="bottom_staff_row">
                            <div class="staff_item text-center">
                                <img src="{{ asset('uploads/all') }}/{{ $principal->image }}" alt="" />
                                <h4>{{ $principal->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <h2 class="page_title">Vice Principal</h2>
                    <div class="bottom_staff_area">
                        <div class="bottom_staff_row">
                            <div class="staff_item text-center">
                                <img src="{{ asset('uploads/all') }}/{{ $vicePrincipal->image }}" alt="" />
                                <h4>{{ $vicePrincipal->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <h2 class="page_title">Teachers</h2>
                    <div class="bottom_staff_area">
                        <div class="bottom_staff_row">
                            @foreach ($teachers as $teacher)
                                <div class="staff_item text-center">
                                    <img src="{{ asset('uploads/all') }}/{{ $teacher->image }}" alt="" />
                                    <h4>{{ $teacher->name }}</h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
