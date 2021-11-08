@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12"></div>
    <div class="card">
        <div class="card-header">
            Fill
        </div>
        <div class="card-body">
            <form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Name</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection