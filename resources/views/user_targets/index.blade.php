@extends('layouts.master')
@section('title', 'User Targets')
@section('content')
@php
$i=1;
@endphp
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>User Targets</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('user_targets.create') }}"> Create New User Target</a>

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
        	@foreach ($user_targets as $user_target)
	        <tr>
				<td>
	                <form action="{{ route('user_targets.destroy',$user_target->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('user_targets.show',$user_target->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('user_targets.edit',$user_target->id) }}">Edit</a>
		                @csrf
	                    @method('DELETE')
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td>{{ $i++ }}</td>
            	<td>{{ $user_target->user_id  }}</td>
                <td>{{ $user_target->month_id }}</td>
                <td>{{ $user_target->year  }}</td> 
                <td>{{ $user_target->target_type_id  }}</td>
                <td>{{ $user_target->target_unit_id }}</td>
                <td>{{ $user_target->target_amount  }}</td>               
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