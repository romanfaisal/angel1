@foreach($childs as $child)

   <option value="{{ $child->id }}"  @if($select_id==$child->id) selected="selected" @endif >

     {{ $tree_view }}{{ $child->name }}

   @if(count($child->childs))
			@php
               	$tree_view.="= = = = = = = =>";
            @endphp	
            @include('layouts.manageChild',['childs' => $child->childs,'tree_view'])

        @endif

   </option>

@endforeach

