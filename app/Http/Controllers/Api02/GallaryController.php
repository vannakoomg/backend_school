<?php

namespace App\Http\Controllers\Api02;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallary;
use App\GallaryDetile;
use DateTime;

class GallaryController extends Controller
{
    public function getGallary(Request $request){
        $data = collect([]);
        $data02 =collect([]);
        if(empty($request->id)){
        $gallary = Gallary::all()->sortByDesc('event_date');
        foreach($gallary as $key =>$gal){
            if(empty( GallaryDetile::all()->where('gallary_id','=',$gal->id)->first()->filename))
            {
            $image='';
            }else{
                $image= asset('storage/image/' .  GallaryDetile::all()->where('gallary_id','=',$gal->id)->first()->filename);
            }
            
            $time  = new DateTime($gal->event_date);
             $data02->push([
                    "id"=>$gal->id,
                        "title"=>$gal->name,
                        "image"=> $image,
                        "date"=>$time->format('Y-m-d'),
                ],);
            $galddd = collect([]);
            $galddd->push([
                    "id"=>$gal->id,
                        "title"=>$gal->name,
                        "image"=> $image,
                        "date"=>$time->format('Y-m-d'),
                ],);
            if($data->isEmpty()){
                $data->push([
                "year_month"=>$time->format('Y-m'),
                "gallary"=>$galddd,
            ]);
            }else{
                $isdulicat =0;
                foreach($data as $key =>$dataAll){
                    if($data[$key]["year_month"]==$time->format('Y-m')){
                    $data[$key]['gallary']->push([
                        "id"=>$gal->id,
                        "title"=>$gal->name,
                        "image"=> $image,
                        "date"=>$time->format('Y-m-d'),
                    ]);
                    $isdulicat =1;
                    break 1;
                }
            }
            if( $isdulicat ==0){
                $data->push([
                "year_month"=>$time->format('Y-m'),
                "gallary"=>$galddd
            ]);}
            }
        }
        }else{
            $gallaryDetile = GallaryDetile::all()->where('gallary_id','=',$request->id);
            $gallary = Gallary::find($request->id);
            foreach($gallaryDetile as $key =>$gal){
            $data->push([
                "image"=>asset('storage/image/' . $gal->filename),
            ]);
            }
            $data->push([
                "image"=>"",
            ]);
            return response()->json([
                "data"=>$data,
                "description"=>$gallary->description,
            ]);
        }
        return response()->json([
            "data"=>$data,
            "data02"=>$data02
        ]);
    }
}