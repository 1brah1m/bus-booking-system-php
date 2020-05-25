<?php

namespace App\Http\Controllers;

use App\Bus;
use Illuminate\Http\Request;
use DateTime;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::all(); 
        return view('bus', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_bus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = $request->input('company');
        $start_location = $request->input('start_location'); 
        $end_location = $request->input('end_location'); 
        $start_time = $request->input('start_time'); 
        $end_time = $request->input('end_time'); 
        $stops = $request->input('stops'); 
        $price = $request->input('price'); 

        $start_time_date = new DateTime($start_time);
        date_format($start_time_date, 'H:i'); 

        $end_time_date = new DateTime($end_time);
        date_format($end_time_date, 'H:i'); 

        $bus = new Bus; 
        $bus->company = $company; 
        $bus->start_location = $start_location; 
        $bus->end_location = $end_location; 
        $bus->start_time = $start_time_date; 
        $bus->end_time = $end_time_date; 
        $bus->stops = $stops; 
        $bus->price = $price; 

        $bus->save(); 

        return redirect()->action('BusController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        return view('show_bus', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        return view('edit_bus', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        $company = $request->input('company');
        $start_location = $request->input('start_location'); 
        $end_location = $request->input('end_location'); 
        $start_time = $request->input('start_time'); 
        $end_time = $request->input('end_time'); 
        $stops = $request->input('stops'); 
        $price = $request->input('price'); 

        $start_time_date = new DateTime($start_time);
        date_format($start_time_date, 'H:i'); 

        $end_time_date = new DateTime($end_time);
        date_format($end_time_date, 'H:i'); 

        $bus_updated = Bus::find($bus->id);
        $bus_updated->company = $company; 
        $bus_updated->start_location = $start_location; 
        $bus_updated->end_location = $end_location; 
        $bus_updated->start_time = $start_time_date; 
        $bus_updated->end_time = $end_time_date; 
        $bus_updated->stops = $stops; 
        $bus_updated->price = $price; 

        $bus_updated->save(); 

        return redirect()->action('BusController@index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        $bus_delete = Bus::find($bus->id);

        $bus_delete->delete();

        return redirect()->action('BusController@index');
    }
}
