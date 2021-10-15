<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SaleDetail;
use PDF;
use App\Item;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.sales.salesreport');
    }

    public function filterBy(Request $request)
    {
       if($request->has('from')){
        $this->validate($request, [
            'from'=>'required',
            'to'=>'required'
         ]);
         $from = $request->from;
         $to = $request->to;
 
        $byDate = SaleDetail::all()->whereBetween('created_at', array($from, $to));
        return view('reports.sales.reportOfSales', compact(['byDate','from','to']));
       }
       elseif($request->has('item')){
            $this->validate($request, [
                'item' => 'required'
            ]);

            
            $item_name = $request->post('item');
            $sales = DB::table('sale_details')->where(function ($query) use ($item_name) {
                $query->whereIn('item_id', function($queryy) use ($item_name){
                    $queryy->select('id')->from('items')->where('items.name', $item_name);
                });
            })->get();

            return view('reports.sales.byName', compact(['sales', 'item_name']));
       }
    }

    public function getPDF()
    {
        $from = request()->get('from');
        $to = request()->get('to');
        $sales = SaleDetail::all()->whereBetween('created_at', array($from, $to));
        $pdf = PDF::loadView('reports.sales.pdf', compact('sales'));
        return $pdf->download('sales-report.pdf');
    }
}
