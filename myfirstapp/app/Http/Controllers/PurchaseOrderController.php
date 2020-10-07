<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Input;
use App\PurchaseOrder;
use Obs\Validpackage\Validpackage;


class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::all();

        return view('purchaseOrder.index', compact('purchaseOrders'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchaseOrder.create');
    }


public function store(Request $request) {

    $validation = new Validpackage();
        $message = $validation->emailvalidate($request->email);
        return redirect('/purchaseOrder/create')
            ->with('message',$message);
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecopy(Request $request)
    {
       $rules = array(
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|digits:10',
            'items_purchased'=>'required|integer',
            'total'=>'required|integer',
            'gst'=>'required|integer',
            'amount'=>'required|integer',
        );
$validator = Validator::make($request->all(), $rules);
 if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return redirect('/purchaseOrder/create')
            ->withErrors($validator)->withInput($request->input());

    } else {
        // validation successful ---------------------------

        // our duck has passed all tests!
        // let him enter the database

        // create the data for our duck
       $purchaseOrder = new PurchaseOrder([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'items_purchased' => $request->get('items_purchased'),
            'total' => $request->get('total'),
            'gst' => $request->get('gst'),
            'amount' => $request->get('amount')
        ]);
$purchaseOrder->save();
        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return redirect('/purchaseOrder')->with('success', 'Purchase Order saved!');

    }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $purchaseOrders = PurchaseOrder::find($id);
        return view('purchaseOrder.edit', compact('purchaseOrders'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // echo "hi"; exit;
       $rules = array(
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|digits:10',
            'items_purchased'=>'required|integer',
            'total'=>'required|integer',
            'gst'=>'required|integer',
            'amount'=>'required|integer',
        );
$validator = Validator::make($request->all(), $rules);
 if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return redirect('/purchaseOrder/'.$id.'/edit/')
            ->withErrors($validator)->withInput($request->input());

    } else {
        // validation successful ---------------------------

        // our duck has passed all tests!
        // let him enter the database
 $purchaseOrder = PurchaseOrder::find($id);
  $purchaseOrder->first_name =  $request->get('first_name');
  $purchaseOrder->last_name =  $request->get('last_name');
  $purchaseOrder->email =  $request->get('email');
  $purchaseOrder->mobile =  $request->get('mobile');
  $purchaseOrder->items_purchased =  $request->get('items_purchased');
  $purchaseOrder->total =  $request->get('total');
  $purchaseOrder->gst =  $request->get('gst');
  $purchaseOrder->amount =  $request->get('amount');
       
       
$purchaseOrder->save();
        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return redirect('/purchaseOrder')->with('success', 'Purchase Order updated!');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->delete();

        return redirect('/purchaseOrder')->with('success', 'Purchase Order deleted!');
    }
}
