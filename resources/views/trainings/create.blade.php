@extends('layouts.sbadmin2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Insert New Record</div>

                <div class="card-body">
                    <!-- show validation error messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- form start -->
                    <form action="{{ action('TrainingController@store')}}" 
                    method="POST" 
                    enctype="multipart/form-data">
                        @csrf
                        Title 
                        <input name="title" type="text"
                        class="form-control">
                        Description 
                        <input name="description" type="text"
                        class="form-control">
                        Trainer 
                        <input name="trainer" type="text"
                        class="form-control">
                        Upload image file only
                        <!-- input type=file -->
                        <input type="file"
                        name="attachment"
                        class="form-control">

                        <!-- submit button -->
                        <button type="submit" class="btn btn-primary">
                        Submit Record</button>
                    </form>

                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
