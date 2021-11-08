@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <a href="{{route('add.slider')}}" class="btn btn-info">Add Slider</a>

                <div class="col-12">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success">
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
                                    <th scope="col">Slider title</th>
                                    <th scope="col">Slider Image</th>
                                    <th scope="col">Slider Description</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$slider->title}}</td>
                                        <td><img src="{{asset($slider->image)}}" style="height:40px; width:70px" alt=""></td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            <a href="{{url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger">Delete</a>
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