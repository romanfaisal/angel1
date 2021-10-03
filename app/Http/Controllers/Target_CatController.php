<?php

namespace App\Http\Controllers;

use App\Models\Target_Cat;
use Illuminate\Http\Request;

class Target_CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target_cats = Target_Cat::ALL();
		foreach ($target_cats as $target_cat){
			if($target_cat->parent_id==0){
					$target_cat->parent_id="Parent";
				}
			else{
					$target_cat_data= Target_Cat::where('id', $target_cat->parent_id)->first();
					$target_cat->parent_id=$target_cat_data->name;				
				}
				
			}
		return view('target_cats.index', compact('target_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		return view('target_cats.create', compact('load_target_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);	
		Target_Cat::create($request->all());
	    return redirect()->route('target_cats.index')->with('success','Target Cat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target_Cat  $target_Cat
     * @return \Illuminate\Http\Response
     */
    public function show(Target_Cat $target_cat)
    {
		//dd($target_Cat);
		if($target_cat->parent_id==0){
			$target_cat->parent_id="Parent";
		}
		else{
			$target_cat_data= Target_Cat::where('id', $target_cat->parent_id)->first();
			$target_cat->parent_id=$target_cat_data->name;				
		}
        return view('target_cats.show',compact('target_cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Target_Cat  $target_Cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Target_Cat $target_cat)
    {
         $load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		 return view('target_cats.edit',compact('target_cat','load_target_cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target_Cat  $target_Cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target_Cat $target_cat)
    {
        $request->validate(['name' => 'required',]);

        $target_cat->update($request->all());
        return redirect()->route('target_cats.index')->with('success','Target Cat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target_Cat  $target_Cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target_Cat $target_cat)
    {
       $target_cat->delete();
       return redirect()->route('target_cats.index')->with('success','Target Cat deleted successfully');
    }
}
