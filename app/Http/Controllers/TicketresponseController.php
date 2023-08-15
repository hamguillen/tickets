<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Ticketresponse;
use Illuminate\Http\Request;
use App\Http\Requests\ResponseFormRequest;
use Auth;

class TicketresponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //dd($request->input('ticket'));
        $ticket=Ticket::find($request->input('ticket'));
        $lastmessage=Ticketresponse::select('response')->latest('created_at')->first();
        return view('responses.create',compact('ticket','lastmessage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponseFormRequest $request)
    {
        $filePath="";
        if($request->file!=null)
        {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = '/storage/'.$request->file('file')->storeAs('uploads', $fileName, 'public');
        }
        $response=new Ticketresponse;
        $response->ticket_id=$request->input('ticket');
        $response->user_id=Auth::user()->id;
        $response->response=$request->input('response');
        $response->urlfile=$filePath;
        $response->status='ACTIVO';
        $response->save();
        return redirect()->route('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticketresponse $ticketresponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticketresponse $ticketresponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticketresponse $ticketresponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticketresponse $ticketresponse)
    {
        //
    }
}
