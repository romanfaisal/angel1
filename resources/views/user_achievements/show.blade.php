@extends('layouts.master')
@section('title', 'Achievement Info')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Achievement Info </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('user_achievements.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>User:</strong>

                {{ $user_achievement->user_id }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Month:</strong>

                {{ $user_achievement->month_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Year:</strong>

                {{ $user_achievement->year }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Type:</strong>

                {{ $user_achievement->target_type_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Unit:</strong>

                {{ $user_achievement->target_unit_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Amount:</strong>

                {{ $user_achievement->achievement_amount }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strongMember Name:</strong>

                {{ $user_achievement->member_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Client Info:</strong>

                {{ $user_achievement->client_info }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Note:</strong>

                {{ $user_achievement->note }}

            </div>

        </div>
        

    </div>

@endsection