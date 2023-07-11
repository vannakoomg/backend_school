<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use DateTime;
use App\EventsType;
use App\Http\Resources\EventResource;


class EventsController extends Controller
{
    public function index(){
      return view('admin.events.index');
    }
    public function show(){
      $eventsType = EventsType::all();
      return view('admin.events.create', compact('eventsType'));
    }
    public function getEvent(){
    $events =new EventResource(Event::all());
      dd($events);
      // dd($events);
      return $events;
    }
    public function store(Request $request){
        $end  = new DateTime($request->end_date);
        $end= $end->modify('+1 day' );
        $endString= $end->format('Y-m-d');
        $data = array(
                'title' => $request->title,
                'start' => $request->startdate,
                'end' => $endString,
                'time' => $request->time,
                'action' => $request->action,
                'create_owner'=>auth()->user()->name
            );
        $value=  Event::create($data);
        return redirect('admin/events');      
    }
    public function destroy(Request $request){
      return $request;
      $result = Event::find($request->id);
      $result->delete();
      return $request->id;
    }
    public function edit(Request $request){
      $event= Event::find($request->id);
      $eventsType = EventsType::all();
      $endddd  = new DateTime($event->end);
      $endddd= $endddd->modify('-1 day' )->format('Y-m-d');
      return view('admin.events.edit', compact('eventsType',"event","endddd"));
    }
    public function update(Request $request){
      $event  = Event::find($request->id);
        $end  = new DateTime($request->end_date);
        $end= $end->modify('+1 day' );
        $event->update([
        "title"=>$request->title,
        "start"=>$request->startdate,
        "end"=> $end,
        "action"=>$request->action+1,
        "time"=>$request->time,
      ]);  
       return redirect('admin/events');  
    }    

    
}