<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GallaryDetile;
use App\Gallary;
use DateTime;

use App\Image;
class GallaryController extends Controller
{ 
    public function index() { 
        // $gallary = Gallary::all()->sortByDesc('event_date');
        // $firstImage =collect();
        // foreach($gallary as $g){
        //     $data = GallaryDetile::all()->where("gallary_id","=",$g->id)->first();
        //     $firstImage->push(asset('storage/image/' . $data->filename));
        // }
        $data = collect([]);
        $gallary = Gallary::all()->sortByDesc('event_date');
        foreach($gallary as $key =>$gal){
            if(empty( GallaryDetile::all()->where('gallary_id','=',$gal->id)->first()->filename))
            {
            $image='';
            }else{
                $image= asset('storage/image/' .  GallaryDetile::all()->where('gallary_id','=',$gal->id)->first()->filename);
            }
            $time  = new DateTime($gal->event_date);
            $galddd = collect([]);
            $galddd->push([
                    "id"=>$gal->id,
                        "title"=>$gal->name,
                        "description"=>$gal->description,
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
                        "description"=>$gal->description,
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
        return view('admin.gallary.index' , compact("data"));
    }
    public function create(){
        return view('admin.gallary.create');
    }
    public function store(Request $request) { 
        $data = array(
            "name"=>$request->title,
            "description"=>$request->description,
            "event_date"=>$request->event_date,
        );
        Gallary::create($data);
        $lastId=  Gallary::latest('id')->first(); 
        $data = $request->file('file');
        foreach ($data as $files) {
        $filename = "image-".time().'.'.$files->getClientOriginalName();
        //  $filename->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        $files->storeAs('image',$filename);
        GallaryDetile::create([
            'filename' => $filename,
            "gallary_id"=>$lastId->id,
        ]);
        }
        $gallary = Gallary::all();
                return  redirect('admin/gallary/create');    
    }
    public function edit(Request $request){
        $gallary = Gallary::find($request->id);
        return view('admin.gallary.edit', compact('gallary'));
    }
    public function initPhoto(Request $request){
        $gallaryDetail = GallaryDetile::all()->where('gallary_id','=',$request->id);
        return $gallaryDetail;
    }
    public function update(Request $request ,$id){
        $gallary = Gallary::find($id);
        $gallary->name = $request->title;
        $gallary->description=$request->description;
        $gallary->save();
        if(!empty($request->file('file'))){
        $data = $request->file('file');
        foreach ($data as $files) {
        $filename = "image-".time().'.'.$files->getClientOriginalName();
        $files->storeAs('image',$filename);
        GallaryDetile::create([
            'filename' => $filename,
            "gallary_id"=>"$id",
            ]);
        }
        }
        return redirect('admin/gallary');   
        // $gallary = Gallary::all()->sortByDesc('event_date');;
        // return view('admin.gallary.index' , compact("gallary"));
    }
    
    public function destroyGallary(Request $request){
        $gallary = Gallary::find($request->id);
        $gallary->delete();
        $gallaryDetail = GallaryDetile::all()->where("gallary_id","=",$request->id);
        GallaryDetile::destroy($gallaryDetail);
        return redirect('admin/gallary');    
    }
     public function destroy(Request $request ){
        $gallaryDetail = GallaryDetile::find($request->id);
        $gallaryDetail->delete();  
    }

}