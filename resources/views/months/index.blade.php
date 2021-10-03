@extends('layouts.master')
@section('title', 'Months')
@section('content')
@php
$i=1;
@endphp
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Months</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('months.create') }}"> Create New Month</a>

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
            	<th>Name</th>
        	</tr>
        </thead>
 		<tbody>
        	@foreach ($months as $month)
	        <tr>
				<td>
	                <form action="{{ route('months.destroy',$month->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('months.show',$month->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('months.edit',$month->id) }}">Edit</a>
		                @csrf
	                    @method('DELETE')
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td>{{ $i++ }}</td>
            	<td>{{ $month->month_name }}</td>
        	</tr>
        	@endforeach
        </tbody>
		<tfoot>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>Name</th>
        	</tr>
        </tfoot>
    </table>
      

@endsection