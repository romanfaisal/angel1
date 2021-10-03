@extends('layouts.master')
@section('title', $target_cat->name)
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show {{ $target_cat->name }} Info </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('target_cats.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $target_cat->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Details:</strong>

                {{ $target_cat->details }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Parent:</strong>

                {{ $target_cat->parent_id }}

            </div>

        </div>
        
        
        

    </div>

@endsection