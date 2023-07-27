<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GallaryDetile;
use App\Gallary;
use App\Image;
class GallaryController extends Controller
{ 
    public function index() { 
        $gallary = Gallary::all()->sortByDesc('event_date');;
        return view('admin.gallary.index' , compact("gallary"));
    }
    public function create(){
        return view('admin.gallary.create');
    }
    public function store(Request $request) { 
        // dd("DFDF");
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
        $gallary = Gallary::all()->sortByDesc('event_date');;
        return view('admin.gallary.index' , compact("gallary"));
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