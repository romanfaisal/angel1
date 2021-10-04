@extends('layouts.master')
@section('title', 'User Payments')
@section('content')
@php
$i=1;
@endphp
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>User Payments</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('payments.create') }}"> Create New User Payment</a>

            </div>

        </div>

    </div>
    
     @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
    
    <table class="table table-bordered" id="example" width="100%" border="1" cellspacing="0" cellpadding="0">
		<thead>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>User</th>
                <th>Month</th>
                <th>Year</th>   
                <th>Target Type</th>   
                <th>Target Unit</th>
                <th>Amount</th>           
        	</tr>
        </thead>
 		<tbody>
        	@foreach ($payments as $payment)
	        <tr>
				<td>
	                <form action="{{ route('payments.destroy',$payment->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('payments.show',$payment->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('payments.edit',$payment->id) }}">Edit</a>
		                @csrf
	                    @method('DELETE')
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td>{{ $i++ }}</td>
            	<td>{{ $payment->user_id  }}</td>
                <td>{{ $payment->month_id }}</td>
                <td>{{ $payment->year  }}</td> 
                <td>{{ $payment->target_type_id  }}</td>
                <td>{{ $payment->target_unit_id }}</td>
                <td>{{ $payment->payment_amount  }}</td>            
        	</tr>
        	@endforeach
        </tbody>
		<tfoot>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>User</th>
                <th>Month</th>
                <th>Year</th>   
                <th>Target Type</th>   
                <th>Target Unit</th>
                <th>Amount</th>    
        	</tr>
        </tfoot>
    </table>
      

@endsection