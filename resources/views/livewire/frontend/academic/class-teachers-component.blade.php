<div>
    <section class="govertment_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page_title">Class Teachers</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Teacher Tabel  -->
    <section class="teacher_table_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_wrapper">


                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SLName</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Photo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->id }}. {{ $teacher->name }}</td>
                                            <td>{{ $teacher->designation }}</td>
                                            <td>{{ $teacher->mobile }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/all') }}/{{ $teacher->image }}"
                                                    alt="teacher img" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pagination_area">
                        <nav aria-label="Page navigation example">
                            {{ $teachers->links('pagination-links') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
