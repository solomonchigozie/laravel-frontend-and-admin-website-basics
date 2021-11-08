@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <a href="{{route('add.about')}}" class="btn btn-info">Add About</a>

                <div class="col-12">
                    <div class="card">
                        @if(session('success'))
                        <div class="m-4 alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif
                        <div class="card-header">
                            All slider
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($homeabout as $about)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$about->title}}</td>
                                        <td>{{$about->short_dis}}</td>
                                        <td>{{$about->long_dis}}</td>
                                        <td>
                                            <a href="{{url('slider/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{url('slider/delete/'.$about->id) }}" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection