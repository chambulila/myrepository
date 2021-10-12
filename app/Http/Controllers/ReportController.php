<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SaleDetail;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.salesreport');
    }

    public function filterByDate(Request $request)
    {
        $this->validate($request, [
           'from'=>'required',
           'to'=>'required'
        ]);
        $from = $request->from;
        $to = $request->to;

       $byDate = SaleDetail::all()->whereBetween('created_at', array($from, $to));
       return view('reports\reportOfSales', compact(['byDate','from','to']));
    }

    public function getPDF()
    {
        $from = request()->get('from');
        $to = request()->get('to');
        $sales = SaleDetail::all()->whereBetween('created_at', array($from, $to));
        $pdf = PDF::loadView('reports.pdf', compact('sales'));
        return $pdf->download('sales-report.pdf');
    }
}
