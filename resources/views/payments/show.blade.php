@extends('layouts.master')
@section('title', 'Payment Info')
@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Payment Info </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>User:</strong>

                {{ $payment_single_row->user_id }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Month:</strong>

                {{ $payment_single_row->month_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Year:</strong>

                {{ $payment_single_row->year }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Type:</strong>

                {{ $payment_single_row->target_type_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Target Unit:</strong>

                {{ $payment_single_row->target_unit_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Amount:</strong>

                {{ $payment_single_row->payment_amount }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Member Name:</strong>

                {{ $payment_single_row->member_id }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Client Info:</strong>

                {{ $payment_single_row->client_info }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Note:</strong>

                {{ $payment_single_row->note }}

            </div>

        </div>
        

    </div>

@endsection