<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TrackMenuMobile;
use App\User;
use DB;
use DateTime;

class TrackMenuMobileController extends Controller
{
    public function index(Request $request){
    
    $chart =collect();
    $news = TrackMenuMobile::where('menu_name',"=","announcement")->count();
    $attendance = TrackMenuMobile::where('menu_name',"=","attendance_calendar")->count();
    $timetable = TrackMenuMobile::where('menu_name',"=","timetable")->count();
    $examSchendules = TrackMenuMobile::where('menu_name',"=","exam_schedule")->count();
    $reportCart = TrackMenuMobile::where('menu_name',"=","student_report")->count();
    $events = TrackMenuMobile::where('menu_name',"=","events")->count();
    $gallery = TrackMenuMobile::where('menu_name',"=","gallary")->count();
    $assignments = TrackMenuMobile::where('menu_name',"=","homeworks")->count();
    $assignmentResults = TrackMenuMobile::where('menu_name',"=","class_results")->count();
    $pickup = TrackMenuMobile::where('menu_name',"=","pick_up_card")->count();
    $elearing = TrackMenuMobile::where('menu_name',"=","e_learning")->count();
    $feedback = TrackMenuMobile::where('menu_name',"=","feedback")->count();
    $canteen = TrackMenuMobile::where('menu_name',"=","canteen")->count();
    $aboutUs = TrackMenuMobile::where('menu_name',"=","About Us")->count();
    $contactUs = TrackMenuMobile::where('menu_name',"=","Contact Us")->count();
    $profile = TrackMenuMobile::where('menu_name',"=","Profile")->count();
    $notification = TrackMenuMobile::where('menu_name',"=","notification")->count();
    $mc = TrackMenuMobile::where('campus',"=","MC")->count();
    $cc = TrackMenuMobile::where('campus',"=","CC")->count();
    $chart = collect([
        "new"=>$news,
        "attendance"=>$attendance, 
        "timetable"=>$timetable,
        "examSchendules"=>$examSchendules,
        "reportCart"=>$reportCart,
        "events"=>$events,
        "gallery"=>$gallery,
        "assignments"=>$assignments,
        "assignmentResults"=>$assignmentResults,
        "pickup"=>$pickup,
        "elearing"=>$elearing,
        "feedback"=>$feedback,
        "canteen"=>$canteen,
        "aboutUs"=>$aboutUs,
        "contactUs"=>$contactUs,
        "profile"=>$profile,
        "notification"=>$notification,
        "mc"=>$mc,
        "cc"=>$cc,
    ]);
    $track = TrackMenuMobile::all()->sortDesc();
    foreach($track as $index=>$t){
    $user =User::where('email' ,"=",$t->user_name)->get()->first();
        $track[$index]->name =  $user->name;
    }
    return view('admin.tracking.index',compact('chart','track'));
    }
}