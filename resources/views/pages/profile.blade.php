@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid rounded-circle" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ Str::ucfirst(auth()->user()->name) }}</h3>
                        <p class="text-muted text-center">{{ Str::ucfirst(auth()->user()->company->name) }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Employees</b> <a class="float-right">{{ $employeeCount }}</a>
                            </li>
                        </ul>
                        <a href="#" onclick="alert('Coming Soon..')" class="btn btn-danger btn-block"><b>Delete Account</b></a>
                        <a href="#" onclick="alert('Coming Soon..')" class="btn btn-info btn-block"><b>Request Exported Company Data</b></a>
                    </div>

                </div>
            </div>
            {{-- <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>

                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">Malibu, California</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                            neque.</p>
                    </div>

                </div>
            </div> --}}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {


        });
    </script>
@endsection
