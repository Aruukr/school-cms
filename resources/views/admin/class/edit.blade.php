@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Class</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">



                            <form method="post" action="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <input type="class name" class="form-control" name="name" value="{{ $getRecord->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option {{ ($getRecord->name == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ ($getRecord->name == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                        </select>
                                    </div>

                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
