<?php

namespace App\Http\Controllers;

use App\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::all(); 
        return view('seat', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_seat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bus_number = $request->input('bus_number');
        $isle_seats = $request->input('isle_seats'); 
        $window_seats = $request->input('window_seats');

        for ($i=0; $i < $isle_seats; $i++) { 
            $seat = new Seat; 
            $seat->bus_id = $bus_number; 
            $seat->isWindowSeat = false; 
            $seat->save();
        }

        for ($i=0; $i < $window_seats; $i++) { 
            $seat = new Seat; 
            $seat->bus_id = $bus_number; 
            $seat->isWindowSeat = true; 
            $seat->save();
        }

        return redirect()->action('SeatController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        return view('show_seat', compact('seat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        return view('edit_seat', compact('seat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
        $bus_number = $request->input('bus_number');
        $window_seat = $request->input('window_seat'); 

        $seat_updated = Seat::find($seat->id);
        $seat_updated->bus_id = $bus_number; 
        $seat_updated->isWindowSeat = $window_seat; 

        $seat_updated->save(); 

        return redirect()->action('SeatController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat_delete = Seat::find($seat->id);

        $seat_delete->delete();

        return redirect()->action('SeatController@index');
    }

    public function makeBooking(Request $request)
    {
        $user_id = $request->input('user_radio');
        $seat_id = $request->input('seat_radio'); 

        $seat = Seat::find($seat_id);
        $seat->user_id = $user_id; 

        $seat->save();

        return redirect()->action('SeatController@index');
    }
}
