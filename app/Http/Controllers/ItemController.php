<?php

namespace App\Http\Controllers;

use App\Item;
use App\SaleDetail;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use DB;

class ItemController extends Controller
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
        $items = Item::all();
        $s = DB::select('select sum(amount) from sale_details as tot');
        
       dd($s);
  
        
        // return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
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
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            
        ]);

         Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            

        ]);

        return redirect()->back()->with('success', 'item saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item =  Item::find($id);

        return view('item.edit', compact('item'));
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
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);

        $update = Item::findOrFail($id);
        $update->name = $request->name;
        $update->price = $request->price;
        $update->quantity = $request->quantity;
        $update->description = $request->description;
        $update->save();

        return redirect()->back()->with('success', 'item updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();

        return response(['status' => true, 'message' => 'item deleted!']);
    }
    //for notifications about stock available
    public function notify()
    {
        $check = Item::find('quantity');
        if($check < 1){
            return redirect()->route('mailing');
        }
        else
        {
            return redirect()->back();
        }
       
    }
}
