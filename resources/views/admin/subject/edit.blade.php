@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Subject</h1>
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
                                        <label>Subject Name</label>
                                        <input type="subject name" class="form-control" name="name" value="{{ $getRecord->name }}" required
                                            placeholder="Enter your subject name">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Type</label>
                                        <select class="form-control" name="type" required>
                                            <option value="">Select type</option>
                                            <option {{ ($getRecord->type == 'Theory') ? 'selected' : '' }} value="Theory">Theory</option>
                                            <option {{ ($getRecord->type == 'Practical') ? 'selected' : '' }} value="Practical">Practical</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                            <option {{ ($getRecord->status == 1) ? 'selected' : ''}}value="1">Inactive</option>
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
