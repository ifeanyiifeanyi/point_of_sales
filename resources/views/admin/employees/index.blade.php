@extends('admin.layouts.admin')

@section('title', 'All Employees')

@section('admin')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p><a href="{{ route('employees.create') }}" class="btn btn-blue waves-effect waves-light"><i class=" mdi mdi-account-multiple-plus"></i> Add</a></p>
                            @if (!$employees->count())
                            <div class="alert alert-danger">No Employee record avaliable </div>
                            @else
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>s/n</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Salary</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                       @foreach ($employees as $employee)
                                       <tr>
                                        <td>{{ $iteration->loop }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email  }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td><img src="{{ asset($employee->photo) }}" width="80" alt=""></td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info rounded-pill waves-effect waves-light" title="view user"><i class="mdi mdi-eye-check-outline"></i></a>

                                            <a href="#" class="btn btn-primary rounded-pill waves-effect waves-light" title="edit user"><i class="mdi mdi-account-edit"></i></a>

                                            <a href="#" class="btn btn-danger rounded-pill waves-effect waves-light" title="delete user"><i class="mdi mdi-delete-forever"></i></a
                                        </td>
                                    </tr>

                                       @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->






        </div> <!-- container -->

    </div> <!-- content -->

@endsection
@section('js')


@endsection
