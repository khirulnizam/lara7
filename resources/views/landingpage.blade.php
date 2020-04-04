@extends('layouts.templet-landingpage')

@section('maincontent')
<div>
	&nbsp;
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Trainings provided
                
                   
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
                        <th>Show</th>
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

@endsection