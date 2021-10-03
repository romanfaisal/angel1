@extends('layouts.master')
@section('title', 'Target Catss')
@section('content')
@php
$i=1;
@endphp
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Target Catss</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('target_cats.create') }}"> Create New Target Cats</a>

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
                <th>Details</th>
                <th>Parent</th>                
        	</tr>
        </thead>
 		<tbody>
        	@foreach ($target_cats as $target_cat)
	        <tr>
				<td>
	                <form action="{{ route('target_cats.destroy',$target_cat->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('target_cats.show',$target_cat->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('target_cats.edit',$target_cat->id) }}">Edit</a>
		                @csrf
	                    @method('DELETE')
		                <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		        </td>
            	<td>{{ $i++ }}</td>
            	<td>{{ $target_cat->name }}</td>
                <td>{{ $target_cat->details }}</td>
                <td>{{ $target_cat->parent_id }}</td>               
        	</tr>
        	@endforeach
        </tbody>
		<tfoot>
        	<tr>
				<th width="280px">Action</th>
            	<th>Si</th>
            	<th>Name</th>
                <th>Description</th>
                <th>Parent</th> 
        	</tr>
        </tfoot>
    </table>
      

@endsection