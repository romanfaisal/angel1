@extends('layouts.master')
@section('title', 'Members')
@section('content')
@php
$i=1;
@endphp
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Members</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Member</a>

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
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Details</th>
        	</tr>
        </thead>
 		<tbody>
        	@foreach ($members as $member)
	        <tr>
				<td>
	                <form action="{{ route('members.destroy',$member->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
		                @csrf
	                    @method('DELETE')
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td>{{ $i++ }}</td>
            	<td>{{ $member->name }}</td>
                <td>{{ $member->mobile }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->details }}</td>
        	</tr>
        	@endforeach
        </tbody>
		<tfoot>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Details</th>
        	</tr>
        </tfoot>
    </table>
      

@endsection