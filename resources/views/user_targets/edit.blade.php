@extends('layouts.master')
@section('title', 'Update Target Info')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Update Target Info</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('user_targets.index') }}"> Back</a>

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

  

    <form action="{{ route('user_targets.update',$user_target->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">
         
         <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>User:</strong>
                     <select name="user_id" class="form-control">
                    	@foreach ($users as $user)
                               <option value="{{ $user->id }}"  @if($user_target->user_id==$user->id)                             
                               selected="selected" @endif  >{{ $user->name }}</option>
                        @endforeach
                    </select>
                    

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Month:</strong>
                    <select name="month_id" class="form-control">
                    	@foreach ($months as $month)        
                               <option value="{{ $month->id }}" @if($user_target->month_id==$month->id)
                               selected="selected" @endif  >{{ $month->month_name }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Year:</strong>

                    <input type="text" name="year" value="{{ $user_target->year }}" class="form-control" placeholder="Year" required="required" />

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Target Type:</strong>
                    <select name="target_type_id" class="form-control">
                    	@foreach($load_target_cats as $load_target_cat)
							@php
                               $tree_view="= = = = = = = =>";
                        	@endphp
                            <option  value="{{ $load_target_cat->id }}" @if($user_target->target_type_id==$load_target_cat->id) 
                                 		selected="selected" @endif >
                               {{ $tree_view }} {{ $load_target_cat->name }}
                                @if(count($load_target_cat->childs))
									@php
                                    	$tree_view.="= = = = = = = =>";
                                        $select_id=$user_target->target_type_id;
                                    @endphp
                                    @include('layouts.manageChild',['childs' => $load_target_cat->childs,'tree_view','select_id' ])

                                @endif

                            </option>

                         @endforeach  
                    </select>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Target Unit:</strong>
                    <select name="target_unit_id" class="form-control">
                    	@foreach($load_target_units as $load_target_unit)
							@php
                               $tree_view="= = = = = = = =>";
                        	@endphp
                            <option  value="{{ $load_target_unit->id }}" @if($user_target->target_unit_id ==
                               $load_target_unit->id) selected="selected" @endif >
                               {{ $tree_view }} {{ $load_target_unit->name }}
                                @if(count($load_target_unit->childs))
									@php
                                    	$tree_view.="= = = = = = = =>";
                                        $select_id=$user_target->target_unit_id;
                                    @endphp
                                    @include('layouts.manageChild',['childs' => $load_target_unit->childs,'tree_view','select_id' ])

                                @endif

                            </option>

                         @endforeach
                    </select>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Amount:</strong>

                    <input type="text" name="target_amount" value="{{ $user_target->target_amount }}" class="form-control" placeholder="Amount" required="required" />

                </div>

            </div>
            
            
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Note :</strong>

                   <textarea name="note" class="form-control" placeholder="Note" >
                   {{ $user_target->note }}</textarea>

                </div>

            </div>
            
            

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

   

    </form>

@endsection