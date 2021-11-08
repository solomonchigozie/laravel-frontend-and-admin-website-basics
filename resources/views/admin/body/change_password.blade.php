@extends('admin.admin_master')

@section('admin')


<div class="container"></div>
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="m-4 alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Change Password</div>
            
                <div class="card-body">
                    <form action="{{route('password.update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="oldpassword" class="form-control">
                            @error('oldpassword')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 

