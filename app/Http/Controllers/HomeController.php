<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleDetail;
use Carbon\Carbon;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $articles = \App\Item::where("created_at",">", Carbon::now()->subDays(10))->get();
       $idadi = $articles->count('id');
        return view('home', compact(['articles', 'idadi']));
    }
    public function recentAddedItem()
    {
        $items = \App\Item::where("created_at",">", Carbon::now()->subDays(10))->get();
        return view('item.recentAddedItem', compact('items'));
    }
}