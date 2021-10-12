<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleDetail;
use App\Purchase;
use App\Item;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $notify = DB::select('select * from items having quantity = reorder');
        $notifyCount = count($notify);
        
        // for ($i=0; $i < count($notify); $i++) { 
        //     if($notify[$i] > 1){
        //         echo "wewe";
        //     }
        // }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notify = DB::select('select * from items having quantity <= reorder');
        $notifyCount = count($notify);

        $purchases = Purchase::all();
        $purchasesCount = $purchases->count('id');

       $articles = \App\Item::where("created_at",">", Carbon::now()->subDays(3))->get();
       $idadi = $articles->count('id');

        return view('home', compact(['articles', 'idadi', 'purchasesCount', 'notifyCount', 'notify']));
    }
    public function recentAddedItem()
    {
        $items = \App\Item::where("created_at",">", Carbon::now()->subDays(3))->get();
        return view('item.recentAddedItem', compact('items'));
    }
}