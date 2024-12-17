@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Subject List</h1>
                    </div>

                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary">New Assign Subject</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Assign Subject</h3>
                        </div>
                        <form method="get" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Class Name</label>
                                    <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}"
                                     placeholder="Enter your class name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Subject Name</label>
                                    <input type="text" class="form-control" name="subjec_name" value="{{ Request::get('subject_name') }}"
                                     placeholder="Enter your subject name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}"
                                     placeholder="">
                                </div>

                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 30px">Search</button>
                                    <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>


                    @include('alert')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assign Subject List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->subject_name }}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                <button type="button" style="background-color: #04AA6D; border: none; color:white; border-radius: 6px;" disabled>Active</button>
                                                @else
                                                <button type="button" style="background-color: #631704; border: none; color:white; border-radius: 6px;" disabled>Inactive</button>
                                                @endif
                                            </td>
                                            <td>{{ $value->created_by_name }}</td>
                                            <td>{{ date('d-m-Y', Strtotime($value->created_at)) }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ url('admin/assign_subbject/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/assign_subbject/delete/' . $value->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 15px; float:right">
                                {{-- {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
