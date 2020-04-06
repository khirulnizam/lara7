@extends('layouts.sbadmin2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Display Complete Record</div>

                <div class="card-body">
                    
                    <!-- form start -->
                    <form >
                        ID 
                        <input name="title" type="text"
                        class="form-control"
                        value="{{ $training->id }}"
                        readonly>
                        Title 
                        <input name="title" type="text"
                        class="form-control"
                        value="{{ $training->title }}"
                        readonly>
                        Description 
                        <input name="description" type="text"
                        class="form-control"
                        value="{{ $training->description }}"
                        readonly>
                        Trainer 
                        <input name="trainer" type="text"
                        class="form-control"
                        value="{{ $training->trainer }}"
                        readonly>
                        Filename 
                        <input name="filename" type="text"
                        class="form-control"
                        value="{{ $training->filename }}"
                        readonly>

                        <!-- display poster image if available-->
                        @if ($training->filename == null)
                            <h4>Image not available!</h4>
                        @else
                            <img src="{{env('APP_URL')}}/storage/{{$training->filename}}" width="300">
                        @endif
                        <br>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary">
                            Back</button>
                        </div>
                    </form>

                    <!-- form ends -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
