@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12"></div>
    <div class="card">
        <div class="card-header">
            Add About
        </div>
        <div class="card-body">
            <form action="{{route('store.about')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="short_dis">Short Description</label>
                    <textarea name="short_dis" id="short_dis" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="long_dis">Long Description</label>
                    <textarea name="long_dis" id="long_dis" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection