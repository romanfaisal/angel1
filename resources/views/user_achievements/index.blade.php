@extends('layouts.master')
@section('title', 'User Achievements')
@section('content')
@php
$i=1;
@endphp
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>User Achievements</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('user_achievements.create') }}"> Create New User Achievement</a>

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
        	@foreach ($user_achievements as $user_achievement)
	        <tr>
				<td>
	                <form action="{{ route('user_achievements.destroy',$user_achievement->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('user_achievements.show',$user_achievement->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('user_achievements.edit',$user_achievement->id) }}">Edit</a>
		                @csrf
	                    @method('DELETE')
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td>{{ $i++ }}</td>
            	<td>{{ $user_achievement->user_id  }}</td>
                <td>{{ $user_achievement->month_id }}</td>
                <td>{{ $user_achievement->year  }}</td> 
                <td>{{ $user_achievement->target_type_id  }}</td>
                <td>{{ $user_achievement->target_unit_id }}</td>
                <td>{{ $user_achievement->achievement_amount  }}</td>               
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