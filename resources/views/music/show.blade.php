@include('music.layout')
@extends('admin.layout.index')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show food</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('music.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $music->name }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Lyric:</strong>

                {{ $music->lyrics }}

            </div>

        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Type of food:</strong>

                {{ $music->singer }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Image:</strong>

                <img src="{{ asset('image/music/' . $music->image) }}" alt="" border=3 height=150 width=150>

            </div>

        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Category:</strong>

                {{ $music->category->name }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Price:</strong>

                {{ $music->price }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Details:</strong>

                {{ $music->description }}

            </div>

        </div>

    </div>
@endsection
