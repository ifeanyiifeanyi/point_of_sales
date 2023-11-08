@extends('admin.layouts.admin')

@section('title', 'Update password')

@section('admin')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-sync-alert          me-1"></i> Update User
                                Password</h5>
                            <form action="{{ route('admin.update.password') }}" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="old_password" class="form-label">Current password</label>
                                                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter current password ..">
                                                @error('old_password')
                                                    <i class="text-danger">{{ $message }}</i>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" name="new_password" class="form-control" id="new_password"
                                                placeholder="Enter new password">
                                            @error('new_password')
                                                <i class="text-danger">{{ $message }}</i>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm password</label>
                                            <input type="text" name="new_password_confirmation" class="form-control" id="new_password_confirmation"
                                                placeholder="Confirm new password">
                                            @error('new_password_confirmation')
                                                <i class="text-danger">{{ $message }}</i>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->


                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>

                            <!-- end settings content-->

                        </div>
                    </div> <!-- end card-->

                </div>
            </div>




        </div> <!-- container -->

    </div> <!-- content -->

@endsection
@section('js')


@endsection
