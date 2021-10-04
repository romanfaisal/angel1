@extends('layouts.master')
@section('title', 'Update Payment Info')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Update Payment Info</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>

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

  

    <form action="{{ route('payments.update',$payment->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">
         
         <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>User:</strong>
                    <select name="user_id" class="form-control">
                    	@foreach ($users as $user)
                               <option value="{{ $user->id }}" @if($payment->user_id==$user->id)  selected="selected" 
                               @endif >{{ $user->name }}</option>
                        @endforeach
                    </select>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Month:</strong>
                    <select name="month_id" class="form-control">
                    	@foreach ($months as $month)        
                               <option value="{{ $month->id }}" @if($payment->month_id==$month->id) selected="selected" @endif >{{ $month->month_name }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Year:</strong>

                    <input type="text" name="year" value="{{ $payment->year }}" class="form-control" placeholder="Year" required="required" />

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
                            <option  value="{{ $load_target_cat->id }}" @if($payment->target_type_id==$load_target_cat->id) 
                                 		selected="selected" @endif >
                               {{ $tree_view }} {{ $load_target_cat->name }}
                                @if(count($load_target_cat->childs))
									@php
                                    	$tree_view.="= = = = = = = =>";
                                        $select_id=$payment->target_type_id;
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
                            <option  value="{{ $load_target_unit->id }}" @if($payment->target_unit_id ==
                               $load_target_unit->id) selected="selected" @endif >
                               {{ $tree_view }} {{ $load_target_unit->name }}
                                @if(count($load_target_unit->childs))
									@php
                                    	$tree_view.="= = = = = = = =>";
                                        $select_id=$payment->target_unit_id;
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

                    <input type="text" name="payment_amount" value="{{ $payment->payment_amount }}" class="form-control" placeholder="Amount" required="required" />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Member:</strong>
                    <select name="member_id" class="form-control">
                    	<option value="0">Select Member</option>
                        @foreach ($members as $member) 
                        		<option value="{{ $member->id }}" @if($payment->member_id==$member->id)
                                	selected="selected" @endif >{{ $member->name }}</option>
                        @endforeach
                    </select>

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Client Info :</strong>

                   <textarea name="client_info" class="form-control" placeholder="Client Info" >
                   {{ $payment->client_info }}</textarea>

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Note :</strong>

                   <textarea name="note" class="form-control" placeholder="Note" >
                   {{ $payment->note }}</textarea>

                </div>

            </div>
            
            

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

   

    </form>

@endsection