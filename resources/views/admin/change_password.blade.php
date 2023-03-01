@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change password Page</h4>
                        @if(count($errors))
                        @foreach($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                        @endforeach
                        @endif
                        <form action="{{ route('update.password')}}" method="post">
                            @csrf
                            <!-- we use form multipart/form-data cz we need to upload some images -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old passsword</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="oldpassword" type="password" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="newpassword" type="password" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Password
                                    Confirmation</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="passwordconfirmation" type="password" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" class="btn btn-primary waves-effect waves-light active" value="Change Password">
                        </form>


                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection