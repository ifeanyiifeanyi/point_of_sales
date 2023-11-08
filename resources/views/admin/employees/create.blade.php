@extends('admin.layouts.admin')

@section('title', auth()->user()->username . ' Profile')

@section('admin')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">

                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="tab-pane" id="settings">
                                <form enctype="multipart/form-data" method="POST" action="">
                                    @csrf
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                                        Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    value="">
                                                    @error('name')
                                                        <i class="text-danger">{{$message}}</i>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" id="username"
                                                    value="">
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
                                                    value="">
                                                    @error('email')
                                                        <i class="text-danger">{{$message}}</i>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" name="phone" class="form-control" id="phone"
                                                    value="">
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
                                                    value="">
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
