@extends('layouts.master')
@section('title', 'Add New Target Cats')
@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Target Cats</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('target_cats.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('target_cats.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" class="form-control" placeholder="Target Cats Name" required="required" />

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Details:</strong>
<textarea name="details" class="form-control" placeholder="Target Cats Details" ></textarea>
                    

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Parent:</strong>
                    <select name="parent_id" class="form-control">
						<option value="0">Parent</option>
                        
                         @foreach($load_target_cats as $load_target_cat)
						@php
                               $tree_view="= = = = = = = =>";
                               $select_id=0;
                        @endphp
                            <option  value="{{ $load_target_cat->id }}">

                               {{ $tree_view }} {{ $load_target_cat->name }}

                                @if(count($load_target_cat->childs))
									@php
                                    	$tree_view.="= = = = = = = =>";
                                    @endphp
                                    @include('layouts.manageChild',['childs' => $load_target_cat->childs,'tree_view','select_id' ])

                                @endif

                            </option>

                         @endforeach

                       </select>


                </div>

            </div>
            


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

                        
</form>

@endsection
