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
                    <form action="{{route('update.user.profile')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" id="name" name="name" value="{{$user['name']}}" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="email" id="email" name="email" value="{{$user['email']}}" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 

