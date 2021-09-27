<?php

namespace App\Http\Controllers;
use\App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchase.index', compact('purchases'));


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Purchase.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'Item_name' => 'required',
            'Price' => 'required',
            'Date' => 'required',
            'Supplier_name' => 'required',
            'Supplier_contact' => 'required',
            'other_Cost' => 'required',
        ]);

        purchase::create([
            'Item_name' => $request->Item_name,
            'Price' => $request->Price,
            'Date' => $request->Date,
            'Supplier_name' => $request->Supplier_name,
            'Supplier_contact' => $request->Supplier_contact,
            'other_Cost' => $request->other_Cost,
        ]);

        return redirect()->back()->with('success', 'purchase saved!');
        //
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
        $purchase =  Purchase::find($id);

        return view('purchase.edit', compact('purchase'));
        //
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
        $request->validate([
            'Item_name' => 'required',
            'Price' => 'required',
            'Date' => 'required',
            'Supplier_name' => 'required',
            'Supplier_contact' => 'required',
            'other_Cost' => 'required',
        ]);

        $update = Purchase::findOrFail($id);
        $update->Item_name = $request->Item_name;
        $update->Price = $request->Price;
        $update->Date = $request->Date;
        $update->Supplier_name = $request->Supplier_name;
        $update->Supplier_contact = $request->Supplier_contact;
        $update->other_Cost = $request->other_Cost;
        $update->save();

        return redirect()->back()->with('success', 'purchase updated!');
    

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Purchase::find($id)->delete();

        return response(['status' => true, 'message' => 'Purchase deleted!']);

        //
    }
}
