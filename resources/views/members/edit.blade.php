@extends('layouts.master')
@section('title', $member->name)
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Update{{ $member->name }} Info</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('members.index') }}"> Back</a>

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

  

    <form action="{{ route('members.update',$member->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="{{ $member->name }}" class="form-control" placeholder="Member Name" required="required" />

                </div>

            </div> 
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Mobile:</strong>

                    <input type="text" name="mobile" value="{{ $member->mobile }}" class="form-control" placeholder="Member Mobile" required="required" />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="email" name="email" value="{{ $member->email }}" class="form-control" placeholder="Member Email"  />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Address:</strong>

                    <input type="text" name="address" value="{{ $member->address }}" class="form-control" placeholder="Member Address" />

                </div>

            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Details:</strong>
<textarea name="details" class="form-control" placeholder="Member Details" >{{ $member->details }}</textarea>
                    

                </div>

            </div>
            

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

   

    </form>

@endsection