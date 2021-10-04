<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Month;
use App\Models\Target_Cat;
use App\Models\Target_Unit;
use App\Models\User;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        $payments = DB::table('payments')
							->join('members', 'payments.member_id', '=', 'members.id')
            				->join('months', 'payments.month_id', '=', 'months.id')
							->join('target_cats', 'payments.target_type_id', '=', 'target_cats.id')
            				->join('target_units', 'payments.target_unit_id', '=', 'target_units.id')
							->join('users', 'payments.user_id', '=', 'users.id')
            				->select('payments.id  as id','payments.payment_amount as payment_amount','payments.year as year', 'members.name as member_id', 'months.month_name as month_id','target_cats.name as target_type_id','target_units.name as target_unit_id', 'users.name as user_id')->get();
		
		return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::ALL();
		$months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
		return view('payments.create',compact('members','months','load_target_cats','load_target_units','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['year' => 'required','payment_amount' => 'required']);	
		$payment_data = Payment::create($request->all());
		$payment_id=$payment_data['id'];
		$created_at=date("Y-m-d H:i:s");
		$updated_at=date("Y-m-d H:i:s");
		DB::table('user_achievements')->insert([
		    ['user_id' => $request->user_id, 'month_id' => $request->month_id,'year' => $request->year, 'target_type_id' => $request->target_type_id, 'target_unit_id' => $request->target_unit_id,'achievement_amount' => $request->payment_amount,'member_id' => $request->member_id, 'client_info' => $request->client_info,'note' => $request->note,'payment_id' => $payment_id,'created_at' => $created_at,'updated_at' => $updated_at],
		]);
	    return redirect()->route('payments.index')->with('success','Payment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
		$payment_single_row = DB::table('payments')
							->join('members', 'payments.member_id', '=', 'members.id')
            				->join('months', 'payments.month_id', '=', 'months.id')
							->join('target_cats', 'payments.target_type_id', '=', 'target_cats.id')
            				->join('target_units', 'payments.target_unit_id', '=', 'target_units.id')
							->join('users', 'payments.user_id', '=', 'users.id')
							->where('payments.id', $payment->id)
            				->select('payments.id  as id','payments.payment_amount as payment_amount','payments.year as year', 'payments.client_info as client_info','payments.note as note','members.name as member_id', 'months.month_name as month_id','target_cats.name as target_type_id','target_units.name as target_unit_id', 'users.name as user_id')->first();	
				
				
        return view('payments.show',compact('payment_single_row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $members = Member::ALL();
		$months = Month::ALL();
		$load_target_cats = Target_Cat::where('parent_id', '=', 0)->get();
		$load_target_units = Target_Unit::where('parent_id', '=', 0)->get();
		$users = User::ALL();
		 return view('payments.edit',compact('payment','members','months','load_target_cats','load_target_units','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
       $request->validate(['year' => 'required','payment_amount' => 'required']);
        $payment->update($request->all());
		DB::table('user_achievements')
              ->where('payment_id', $payment['id'])
              ->update(['user_id' => $request->user_id, 'month_id' => $request->month_id,'year' => $request->year, 'target_type_id' => $request->target_type_id, 'target_unit_id' => $request->target_unit_id,'achievement_amount' => $request->payment_amount,'member_id' => $request->member_id, 'client_info' => $request->client_info,'note' => $request->note]);
        return redirect()->route('payments.index')->with('success','Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $id=$payment->delete();
		DB::table('user_achievements')->where('payment_id', '=', $payment['id'])->delete();
        return redirect()->route('payments.index')->with('success','Payment deleted successfully');
    }
}
