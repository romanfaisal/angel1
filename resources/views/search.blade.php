@extends('layouts.master')
@section('title', 'Report Details')
@section('content')
@php
$month_id="";
$year="";
$user_id=array();
$target_type_id="";
$target_unit_id="";
if(isset($_GET['month_id'])){
	$month_id=$_GET['month_id'];
}
if(isset($_GET['year'])){
	$year=$_GET['year'];
}
if(isset($_GET['user_id'])){
	$user_id=$_GET['user_id'];
}
if(isset($_GET['target_type_id'])){
	$target_type_id=$_GET['target_type_id'];
}
if(isset($_GET['target_unit_id'])){
	$target_unit_id=$_GET['target_unit_id'];
}
$si=1;
@endphp
     <div class="row">
    	<div class="col-sm-12">
        
<form action="{{ route('search') }}" method="GET">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Month</td>
    <td align="center">: </td>
    <td>   
    <select name="month_id">
    <option value='0'> All </option>
   		@foreach ($months as $item )
            	<option value='{{ $item->id }}' @if($month_id==$item->id) selected='selected' @endif  > {{ $item->month_name }} 
                </option>
        @endforeach	
    </select>
    </td>
  </tr>
   <tr>
    <td>Year </td>
    <td align="center">: </td>
    <td>
    <select name="year">    
        <option value='0'> All </option>
   		@foreach ($years as $item )
            	<option value='{{ $item->year }}' @if($year==$item->year) selected='selected' @endif  > {{ $item->year }} 
                </option>
        @endforeach	
    </select>	
    </select>
    
    
    </td>
  </tr>
  <tr>
    <td>User</td>
    <td align="center">: </td>
    <td>
    @foreach ($users as $item )
    <input name='user_id[{{ $item->id }}]' type='checkbox' value='{{ $item->id }}' @if(in_array($item->id, $user_id)) checked='checked' @endif  /> {{ $item->name }}<br/>
    @endforeach	
    </td>
  </tr>
  <tr>
    <td>Type</td>
    <td align="center">: </td>
    <td>
    <select name="target_type_id"> 
    <option value='0'> All </option>
    	@foreach($load_target_cats as $load_target_cat)
			@php
               $tree_view="= = = = = = = =>";
            @endphp
            <option  value="{{ $load_target_cat->id }}" @if($target_type_id==$load_target_cat->id) 
                                 		selected="selected" @endif >
                 {{ $tree_view }} {{ $load_target_cat->name }}
                 @if(count($load_target_cat->childs))
						@php
                           	$tree_view.="= = = = = = = =>";
                            $select_id=$target_type_id;
                        @endphp
                        @include('layouts.manageChild',['childs' => $load_target_cat->childs,'tree_view','select_id' ])
                   @endif
             </option>
        @endforeach	    	
    </select>
    </td>
  </tr>
  <tr>
    <td>Unit</td>
    <td align="center">: </td>
    <td>
    <select name="target_unit_id">
    	<option value='0'> All </option>
        @foreach($load_target_units as $load_target_unit)
			@php
                $tree_view="= = = = = = = =>";
            @endphp
            <option  value="{{ $load_target_unit->id }}" @if($target_unit_id ==$load_target_unit->id) selected="selected" @endif >
                  {{ $tree_view }} {{ $load_target_unit->name }}
                      @if(count($load_target_unit->childs))
							@php
                               	$tree_view.="= = = = = = = =>";
                                $select_id=$target_unit_id;
                            @endphp
                            @include('layouts.manageChild',['childs' => $load_target_unit->childs,'tree_view','select_id' ])
                       @endif
             </option>
         @endforeach   	
    </select>
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td> <input name="btnSubmit" type="submit" value="Search" /></td>
  </tr>
</table>


</form>
</div>	
    </div>
 <div class="row">
    	<div class="col-sm-12">
<h2> View Target and Achivement</h2>

<table id="example" width="100%" border="1" cellspacing="0" cellpadding="0">
 <thead>
  <tr>
    <th align='center'>Si</th>
    <th  align='center'>Name</th>
    <th  align='center'>Email</th>
    <th  align='center'>Year</th>
    <th  align='center'>Month</th>
    <th  align='center'>Target Type</th>
    <th  align='center'>Target Unit </th>
    <th  align='center'>Target Amount</th>
    <th  align='center'>Achive Amount</th>
    <th  align='center'>
      (Achive Amount/Target Amount)*100
    </th>
    
  </tr>
 </thead>
 <tbody>
  @foreach ($search_resault as $item )
   <tr>
    <td  align='center'>{{ $si++ }}</td>
    <td  align='center'> {{ $item["user_name"] }} </td>
    <td  align='center'>{{ $item["user_email"] }}</td>
    <td  align='center'>{{ $item["year"] }}</td>
     <td  align='center'>{{ $item["month_name"] }}</td>      
     <td  align='center'>{{ $item["target_type_name"] }}</td>
	<td  align='center'>{{ $item["target_unit_name"] }}</td>
    <td  align='center'>{{ $item["total_target_amount"] }}</td>
	<td  align='center'>{{ $item["total_achievements_amount"] }}</td>
    <td  align='center'>{{ $item["achive_percentage"] }} % </td>  
  </tr>
  @endforeach	
 
  
</tbody> 
<tfoot>

	<tr>
    	<th align='center'>Si</th>
    	<th  align='center'>Name</th>
    	<th  align='center'>Email</th>
        <th  align='center'>Year</th>
        <th  align='center'>Month</th>
    	<th  align='center'>Target Type</th>
    	<th  align='center'>Target Unit </th>
    	<th  align='center'>Target Amount</th>
    	<th  align='center'>Achive Amount</th>
    	<th  align='center'>
      		(Achive Amount/Target Amount)*100
    	</th>
  </tr>
</tfoot>
</table>
</div>	
    </div>
    @endsection
