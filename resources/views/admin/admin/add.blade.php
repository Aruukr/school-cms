@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New User</h1>
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
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="name" class="form-control" name="name" value="{{ old('name') }}" required
                                            placeholder="Enter your name">
                                    </div>

                                    <div class="form-group">
                                    </div>

                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter email">
                                            <div style="color:red; font-weight: 800;">{{ $errors->first('email') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required
                                            placeholder="Password">
                                    </div>
                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
