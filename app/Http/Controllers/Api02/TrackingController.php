<?php

namespace App\Http\Controllers\Api02;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tracking;
class TrackingController extends Controller
{
    public function create(Request $response){
        try {
        $track = Tracking::create($response->all());
        return response()->json([
        "massage"=>"done",
        "data"=>$track
        ]);  
        }  
        catch (Throwable $e) {
        return response()->json([
        "massage"=>" you have been catched $e",
        ]);
    }
    }
}