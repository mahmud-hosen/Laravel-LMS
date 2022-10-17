@section('title')
    Admin - Dashboard
@endsection
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 font-weight-bold">{{ Auth::user()->name }}</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Teachers</span>
                            <span class="info-box-number">{{ $totalTeacher }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.academicClassTeachers') }}" style="color: white;"><small>View
                                        All Teachers <i class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Governing Body</span>
                            <span class="info-box-number">{{ $totalGoverningBody }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.aboutMenuGoverningBody') }}"
                                    style="color: white;"><small>View All Governing Body <i
                                            class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Alumni</span>
                            <span class="info-box-number">{{ $totalAlumni }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.alumni') }}" style="color: white;"><small>View All Alumni <i
                                            class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Article</span>
                            <span class="info-box-number">{{ $totalArticle }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.articles') }}" style="color: white;"><small>View All Article
                                        <i class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Magazine</span>
                            <span class="info-box-number">{{ $totalMagazines }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.magazines') }}" style="color: white;"><small>View All
                                        Magazine <i class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Event</span>
                            <span class="info-box-number">{{ $totalEvents }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.homeEvents') }}" style="color: white;"><small>View All Event <i
                                            class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Faculty College</span>
                            <span class="info-box-number">{{ $totalFacultyCollege }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.facultyCollege') }}" style="color: white;"><small>View All Faculty College <i
                                            class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Faculty High School</span>
                            <span class="info-box-number">{{ $totalFacultyHighSchool }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.facultyHighSchool') }}" style="color: white;"><small>View All Faculty High School <i
                                            class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Faculty Primary</span>
                            <span class="info-box-number">{{ $totalFacultyPrimary }}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                            <span class="progress-description">
                                <a href="{{ route('admin.facultyPrimary') }}" style="color: white;"><small>View All Faculty Primary <i
                                            class="fas fa-arrow-circle-right"></i></small></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>

    </script>
@endpush
