@extends('layouts.master')
@section('title', 'Target Info')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Target Info </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('user_targets.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>User:</strong>

                {{ $user_target->user_id }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Month:</strong>

                {{ $user_target->month_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Year:</strong>

                {{ $user_target->year }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Type:</strong>

                {{ $user_target->target_type_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Unit:</strong>

                {{ $user_target->target_unit_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Amount:</strong>

                {{ $user_target->target_amount }}

            </div>

        </div>
        
        
        
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Note:</strong>

                {{ $user_target->note }}

            </div>

        </div>
        

    </div>

@endsection