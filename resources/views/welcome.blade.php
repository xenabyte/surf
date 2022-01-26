<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Thomas Adewumi University| Internet - Manage Internet Activity</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Thomas Adewumi University| Internet - Manage Internet Activity" name="description" />
        <meta content="Damilare Ogundele" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
        .modal-backdrop{
            opacity:0.9 !important;
        }
        </style>

        @if(!empty($user))
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#dataBalance').modal('show');
                });
            </script>
        @endif
    </head>

    <body>
        @include('sweet::alert')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Check Data Balance</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="{{ url('/') }}" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('logo.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="{{ url('/') }}" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('logo.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="{{ route('checkBalance') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" required placeholder="Enter username">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control" required placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3 d-grid">
                                            @if(empty($user))
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Check Data Balance</button>
                                            @else
                                                <a href="{{ url('/') }}"  class="btn btn-primary waves-effect waves-light">Back Home</a> 
                                            @endif
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#changePassword"><i class="mdi mdi-lock me-1"></i> Change Internet Access Password</a>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>© <script>document.write(new Date().getFullYear())</script> TAU Internet Services. Crafted with <i class="mdi mdi-heart text-danger"></i> by TAU ICT</p>
                            </div>
                        </div>

                        <!-- Change Password Modal -->
                        <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="changePassword" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-2">
                                            <form class="form-horizontal" action="{{ route('updatePassword') }}" method="POST">
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" name="username" required class="form-control" placeholder="Enter username">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Old Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" name="old_password" required class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                </div>
                        
                                                <hr>
                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" name="new_password" required class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" name="confirm_password" required class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <!-- Data Balance Modal -->
                        @if(!empty($user))
                        <div class="modal fade" id="dataBalance" tabindex="-1" role="dialog" aria-labelledby="dataBalance" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Data Balance</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-2">
                                            <div class="user-thumb text-center mb-4">
                                                <img src="{{asset('assets/images/users/avatar.png')}}" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                                <h5 class="font-size-15 mt-3">{{ $user->firstname .' '. $user->lastname }}</h5>
                                                <h3 class="mt-3">Data Balance: {{ $user->dataBalance }}</h3> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>

</html>
