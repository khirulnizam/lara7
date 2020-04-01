@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Record</div>

                <div class="card-body">
                    
                    <!-- form start -->
                    <form action="{{action('TrainingController@update',
                    $training->id )}}" method="POST">
                        @csrf
                        Title 
                        <input name="title" type="text"
                        class="form-control"
                        value="{{ $training->title }}"
                        >
                        Description 
                        <input name="description" type="text"
                        class="form-control"
                        value="{{ $training->description }}"
                        >
                        Trainer 
                        <input name="trainer" type="text"
                        class="form-control"
                        value="{{ $training->trainer }}"
                        >
                        <button type="submit" class="btn btn-warning">
                        Save Update</button>
                    </form>

                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
