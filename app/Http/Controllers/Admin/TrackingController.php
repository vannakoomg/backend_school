<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tracking;
use DB;
use DateTime;

class TrackingController extends Controller
{
    public function index(Request $request){
    $search ='';
    $fromdate = "";
    $todate ="";
    if(count($request->all()) > 0){ 
        if(empty($request->fromdate) && empty($request->todate)  ){
            $search= $request->search;
            $track = Tracking::where('name', 'like', '%' . $request->search . '%')->get()->sortDesc();
        }else{
            $search= $request->search;
            $fromdate = $request->fromdate;
            $todate= $request->todate;
            $track = Tracking::where('name', 'like', '%' . $request->search . '%')
            ->where('created_at','>=',$fromdate)
            ->get()->sortDesc(); 
        }
        } else{
                $track = Tracking::all()->sortDesc();
        } 
    return view('admin.tracking.index',compact('track','search','fromdate'));
    
    }
}