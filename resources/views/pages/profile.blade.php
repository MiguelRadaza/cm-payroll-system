@extends('layout.app-v2')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">

            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" height="380px" class="rounded " alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{ auth()->user()->name }}</span>
                            <span class="thumb-info-type">{{ auth()->user()->roles[0]->name }}</span>
                        </div>
                    </div>

                    <div class="widget-toggle-expand mb-3">
                        <div class="widget-header">
                            <h5 class="mb-2 font-weight-semibold text-dark">Profile Completion</h5>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content-collapsed">
                            <div class="progress progress-xs light">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ auth()->user()->email_verified_at? 100 : 0}}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ auth()->user()->email_verified_at? '100%' : '0%'}};">
                                    {{ auth()->user()->email_verified_at? '100%' : '0%'}}
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-expanded">
                            <ul class="simple-todo-list mt-3">
                                <li class="{{ auth()->user()->email_verified_at? 'completed' : '' }}">Verify Email Address</li>
                            </ul>
                        </div>
                    </div>

                    <hr class="dotted short">

                    <h5 class="mb-2 mt-3">About</h5>
                    <p class="text-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam.
                        Interdum et malesuada</p>
                    <div class="clearfix">
                        <a class="text-uppercase text-muted float-end" href="#">(View All)</a>
                    </div>

                    <hr class="dotted short">

                    <div class="social-icons-list">
                        <a rel="tooltip" data-bs-placement="bottom" target="_blank" href="http://www.facebook.com"
                            data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                        <a rel="tooltip" data-bs-placement="bottom" href="http://www.twitter.com"
                            data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                        <a rel="tooltip" data-bs-placement="bottom" href="http://www.linkedin.com"
                            data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                    </div>

                </div>
            </section>
        </div>

        <div class="col-lg-8 col-xl-6" style="opacity: 30%;">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Overview</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-target="#edit" data-bs-toggle="tab">Edit</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">

                        <div class="p-3">

                            <h4 class="mb-3 font-weight-semibold text-dark">Update Status</h4>

                            <section class="simple-compose-box mb-3">
                                <form method="get" action="/">
                                    <textarea name="message-text" data-plugin-textarea-autosize placeholder="What's on your mind?" rows="1"></textarea>
                                </form>
                                <div class="compose-box-footer">
                                    <ul class="compose-toolbar">
                                        <li>
                                            <a href="#"><i class="fas fa-camera"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                                        </li>
                                    </ul>
                                    <ul class="compose-btn">
                                        <li>
                                            <a href="#" class="btn btn-primary btn-xs">Post</a>
                                        </li>
                                    </ul>
                                </div>
                            </section>

                            <h4 class="mb-3 pt-4 font-weight-semibold text-dark">Timeline</h4>

                            <div class="timeline timeline-simple mt-3 mb-3">
                                <div class="tm-body">
                                    <div class="tm-title">
                                        <h5 class="m-0 pt-2 pb-2 text-dark font-weight-semibold text-uppercase">November
                                            2021</h5>
                                    </div>
                                    <ol class="tm-items">
                                        <li>
                                            <div class="tm-box">
                                                <p class="text-muted mb-0">7 months ago.</p>
                                                <p>
                                                    It's awesome when we find a good solution for our projects, Porto Admin
                                                    is <span class="text-primary">#awesome</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tm-box">
                                                <p class="text-muted mb-0">7 months ago.</p>
                                                <p>
                                                    What is your biggest developer pain point?
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tm-box">
                                                <p class="text-muted mb-0">7 months ago.</p>
                                                <p>
                                                    Checkout! How cool is that!
                                                </p>
                                                <div class="thumbnail-gallery">
                                                    <a class="img-thumbnail lightbox" href="img/projects/project-4.jpg"
                                                        data-plugin-options='{ "type":"image" }'>
                                                        <img class="img-fluid" width="215"
                                                            src="img/projects/project-4.jpg">
                                                        <span class="zoom">
                                                            <i class="bx bx-search"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="edit" class="tab-pane">

                        <form class="p-3">
                            <h4 class="mb-3 font-weight-semibold text-dark">Personal Information</h4>
                            <div class="row row mb-4">
                                <div class="form-group col">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="1234 Main St">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col">
                                    <label for="inputAddress2">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Apartment, studio, or floor">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4 border-top-0 pt-0">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 border-top-0 pt-0">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div>

                            <hr class="dotted tall">

                            <h4 class="mb-3 font-weight-semibold text-dark">Change Password</h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">New Password</label>
                                    <input type="password" class="form-control" id="inputPassword4"
                                        placeholder="Password">
                                </div>
                                <div class="form-group col-md-6 border-top-0 pt-0">
                                    <label for="inputPassword5">Re New Password</label>
                                    <input type="password" class="form-control" id="inputPassword5"
                                        placeholder="Password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-end mt-3">
                                    <button class="btn btn-primary modal-confirm">Save</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3">

            <h4 class="mb-3 mt-0 font-weight-semibold text-dark">Company Stats</h4>
            <ul class="simple-card-list mb-3">
                <li class="primary">
                    <h3>{{ count(auth()->user()->company->employee) }}</h3>
                    <p class="text-light">Employees.</p>
                </li>
            </ul>

            
        </div>
    </div>
   
@endsection
@section('scripts')
    <script>
        $(function() {


        });
    </script>
@endsection
