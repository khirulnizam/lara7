@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Training Index
                
                    <div class="float-right">
                        <form class="form-inline" method="get"
                        action="{{route('training:index')}}">
                            <input type="text" name="keyword"
                            class="form-control">
                            <button type="submit" 
                            class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                
                <table class="table table-striped">
                    <thead><tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Task</th>
                    </tr></thead>

                    <tbody>
                    @foreach($trainings as $training)
                    <tr>
                        <td>{{ $training->id }}</td>
                        <td>{{ $training->title }}</td>
                        <td><a class="btn btn-success btn-sm" href="{{ action('TrainingController@show',
                            $training->id) }}">
                            show</a>
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
