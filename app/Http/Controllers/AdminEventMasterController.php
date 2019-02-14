<?php

namespace App\Http\Controllers;

use App\Event;
use App\Helpers\Helper;

class AdminEventMasterController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function show(){
        return view('admin.events.add');
    }

    public function add(){
        Event::create([
            'eventcode' => Helper::generate_code(Event::latest()->first(), "event"),
            'eventtype' => request('eventtype'),
            'eventname' => request('eventname'),
            'createdby' => 'admin',
            'updatedby' => 'admin',
        ]);
        return back()->with('success','New Event Added Successfully ');
    }

    public function view(){
        $datas = Event::get();
//        dd($datas);
        return view('admin.events.view', compact('datas'));
    }

    public function showEdit($id){
        try {
            $data = Event::findOrfail($id);
            return view('admin.events.edit', compact('data'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function delete($id){
        try {
            $Request = Event::findOrfail($id);
            $Request->delete();
            return back()->with('success','Event Deleted Successfully ');
        } catch (Exception $e) {
            return back()->with('wrong','Sorry! something Went To Wrong.');
        }
    }

    public function update($id){
        $event = Event::findOrfail($id);
        $event->eventtype = request('eventtype');
        $event->eventname = request('eventname');
        $event->save();
        return back()->with('success','Event Updated Successfully ');
    }
}
