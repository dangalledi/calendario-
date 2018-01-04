<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Evento;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Evento::get(['id', 'title', 'start', 'end', 'color']);

        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $evento = new Event();
      $evento->title = $request->title;
      $evento->start = $request->date_start . ' ' . $request->time_start;
      $evento->end = $request->date_end;
      $evento->color = $request->color;
      $evento->save();

     return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $evento = Event::find($id);
     if($evento == null)
         return Response()->json([
             'message'   =>  'error delete.'
         ]);
     $evento->delete();
     return Response()->json([
         'message'   =>  'success delete.'
     ]);

    }
}
