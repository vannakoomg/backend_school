<?php

namespace App\Http\Controllers\Api02;
use Symfony\Component\HttpFoundation\Response;
//use App\Http\Controllers\Api\V1\Admin\UsersApiController;
use Notification;
use App\Notifications\FirebaseNotification;
use App\Firebasetoken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\User;

use App\MenuDetail;
class CanteenController extends Controller
{
    public function getMenu(){
        $menu =  Menu::orderBy('created_at','DESC')->get()->first();
        $menuDetail = MenuDetail::all()->where('menu_id',"=",$menu->id);
        $list =collect();
        foreach ($menuDetail as $items) {
            $list->push(asset('storage/image/' . $items->filename));
        }
        return  response()->json([
            "title"=>$menu->name,
            "image"=>$list
        ],);
    }
    public function gettest(){
        $user = Auth()->user();
        return response()->json([
            "data"=>$user,            
        ]);
    }
}