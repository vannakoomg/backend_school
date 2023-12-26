<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TrackMenuMobile;
use DB;
use DateTime;

class TrackMenuMobileController extends Controller
{
    public function index(Request $request){
    
    $chart =collect();
    $news = TrackMenuMobile::where('menu_name',"=","News")->count();
    $attendance = TrackMenuMobile::where('menu_name',"=","Attendance")->count();
    $timetable = TrackMenuMobile::where('menu_name',"=","Timetables")->count();
    $examSchendules = TrackMenuMobile::where('menu_name',"=","Exam Schedules")->count();
    $reportCart = TrackMenuMobile::where('menu_name',"=","Report Card")->count();
    $events = TrackMenuMobile::where('menu_name',"=","Events")->count();
    $gallery = TrackMenuMobile::where('menu_name',"=","Gallery")->count();
    $assignments = TrackMenuMobile::where('menu_name',"=","Assignments")->count();
    $assignmentResults = TrackMenuMobile::where('menu_name',"=","Assignment Results")->count();
    $pickup = TrackMenuMobile::where('menu_name',"=","Pick Up
Virtual Card")->count();
    $elearing = TrackMenuMobile::where('menu_name',"=","E-Learning")->count();
    $feedback = TrackMenuMobile::where('menu_name',"=","Feedback")->count();
    $canteen = TrackMenuMobile::where('menu_name',"=","Canteen")->count();
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
    return view('admin.tracking.index',compact('chart','track',));
    
    }
}