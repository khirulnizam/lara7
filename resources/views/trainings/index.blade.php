@extends('layouts.sbadmin2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Training Index
                
                    <div class="float-right">
                        <form class="form-inline" method="get"
                        action="{{route('training:index')}}">
                            <input type="text" name="keyword"
                            class="form-control">
                            <button type="submit" 
                            class="btn btn-primary"
                            title="Search training">
                                <i class="fa fa-search">
                                </i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                
                <table class="table table-striped">
                    <thead><tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Task</th>
                        <th>Delete</th>
                    </tr></thead>

                    <tbody>
                    @foreach($trainings as $training)
                    <tr>
                        <td>{{ $training->id }}</td>
                        <td>{{ $training->title }}</td>
                        <td><a class="btn btn-success btn-sm" href="{{ action('TrainingController@show', 
                            $training->id) }}">
                            <i class="fa fa-list-alt">
                            </i>
                        </a>
                        <!-- button edit -->
                        <a href="{{ action('TrainingController@edit', 
                            $training->id) }}" class="btn btn-warning btn-sm">
                        
                            <i class="fa fa-edit">
                            </i>
                        </a>
                        </td>
                        <td><!-- form with button delete -->
                            <form method="POST"
                            action="{{action('TrainingController@delete',
                            $training->id) }}">
                            @csrf
                                <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure to delete record id:{{$training->id}}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $trainings->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
