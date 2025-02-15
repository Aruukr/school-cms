@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin List</h1>
                    </div>

                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New</a>
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
                            <h3 class="card-title">Search Admin</h3>
                        </div>
                        <form method="get" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}"
                                     placeholder="Enter your name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}"
                                     placeholder="Enter email">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}"
                                     placeholder="">
                                </div>

                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 30px">Search</button>
                                    <a href="{{ url('admin/admin/list') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>


                    @include('alert')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin List Total : {{ $getRecord->total() }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td style="text-align: center">{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ date('d-m-y H:i A', strtotime($value->created_at))  }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ url('admin/admin/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/admin/delete/' . $value->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 15px; float:right">
                                {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
