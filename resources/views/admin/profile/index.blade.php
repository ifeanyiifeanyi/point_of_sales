@extends('admin.layouts.admin')

@section('title', auth()->user()->username . ' Profile')

@section('admin')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ !empty($user->photo) ? asset($user->photo) : asset('default.png') }}"
                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                            <h4 class="mb-0">{{ $user->name }}</h4>
                            <p class="text-muted">{{ $user->email }}</p>


                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">Address :</h4>
                                <p class="text-muted font-13 mb-3">
                                    {{ $user->address }}
                                </p>
                                <p class="text-muted mb-2 font-13"><strong>Userame :</strong> <span
                                        class="ms-2">{{ $user->username }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                        class="ms-2">{{ $user->name }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                        class="ms-2">{{ $user->phone }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                        class="ms-2">{{ $user->email }}</span></p>

                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span
                                        class="ms-2">USA</span></p>
                            </div>

                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                            class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                            class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"
                                        class="social-list-item border-secondary text-secondary"><i
                                            class="mdi mdi-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end card -->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">


                            <div class="tab-pane" id="settings">
                                <form enctype="multipart/form-data" method="POST" action="{{ route("admin.profile.update", $user) }}">
                                    @csrf
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                                        Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    value="{{ old('name', $user->name) }}">
                                                    @error('name')
                                                        <i class="text-danger">{{$message}}</i>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" id="username"
                                                    value="{{ old('username', $user->username) }}">
                                                    @error('username')
                                                        <i class="text-danger">{{$message}}</i>
                                                    @enderror
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                        <i class="text-danger">{{$message}}</i>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" name="phone" class="form-control" id="phone"
                                                    value="{{ old('phone', $user->phone) }}">
                                                    @error('phone')
                                                    <i class="text-danger">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input name="address" type="text" class="form-control" id="address"
                                                    value="{{ old('address', $user->address) }}">
                                                    @error('address')
                                                    <i class="text-danger">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="photo" class="form-label">Profile Image</label>
                                                @error('photo')
                                                        <i class="text-danger">{{$message}}</i>
                                                    @enderror
                                                <input type="file" name="photo" class="form-control"
                                                    id="fileInput">
                                                <div class="container text-center mt-3">
                                                    <img src="{{ !empty($user->photo) ? asset($user->photo) : asset('default.png') }}" class="img-fluid w-50"
                                                        alt="" id="selectedImage">
                                                </div>

                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->

                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>


        </div> <!-- container -->

    </div> <!-- content -->

@endsection
@section('js')
    <script>
        function displaySelectedImage() {
            const fileInput = document.getElementById("fileInput");
            const selectedImage = document.getElementById("selectedImage");

            fileInput.addEventListener("change", function(event) {
                const selectedFile = event.target.files[0];

                if (selectedFile) {
                    const objectURL = URL.createObjectURL(selectedFile);
                    selectedImage.src = objectURL;
                }
            });
        }

        // Call the function to set up the event listener
        displaySelectedImage();
    </script>
@endsection
