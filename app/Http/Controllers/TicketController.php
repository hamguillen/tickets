<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Department;
use App\Models\User;
use App\Models\Flag;
use App\Models\Ticketresponse;
use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets=Ticket::select('tickets.*','departments.descripcion as departamento','flags.descripcion as nivel','users.name as asignado')
            ->join('departments','departments.id','tickets.department_id')
            ->leftJoin('users','tickets.assign_id','users.id')
            ->leftJoin('flags','tickets.flag_id','flags.id')
            ->OrderBy('tickets.status')->get();
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dptos=Department::where('status','ACTIVO')->OrderBy('descripcion')->get();
        return view('tickets.create',compact('dptos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketFormRequest $request)
    {
        $ticket=new Ticket;
        $filePath="";
        if($request->file!=null)
        {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = '/storage/'.$request->file('file')->storeAs('uploads', $fileName, 'public');
        }
        $ticket->department_id=$request->input('dpto');
        $ticket->user_id=Auth::user()->id;
        $ticket->assign_id=0;
        $ticket->flag_id=0;
        $ticket->title=$request->input('titulo');
        $ticket->description=$request->input('descripcion');
        $ticket->urlfile=$filePath;
        $ticket->status='OPEN';
        $ticket->save();
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $flags=Flag::all();
        $users=User::where('client_id',0)->where('tipo','2')->get();
        $tickets_response=Ticketresponse::select('ticketresponses.*','users.name as nombre')
            ->join('users','users.id','ticketresponses.user_id')
            ->where('ticketresponses.ticket_id',$ticket->id)
            ->OrderBy('ticketresponses.created_at')->get();
        $ticketinfo=Ticket::select('tickets.*','departments.descripcion as departamento',
            'flags.descripcion as nivel','users.name as asignado','client.name as cliente','clients.nombre as empresa')
            ->join('departments','departments.id','tickets.department_id')
            ->join('users as client','tickets.user_id','client.id')
            ->leftjoin('clients','clients.id','client.client_id')
            ->leftJoin('users','tickets.assign_id','users.id')
            ->leftJoin('flags','tickets.flag_id','flags.id')
            ->where('tickets.id',$ticket->id)
            ->OrderBy('tickets.status')->get();
        return view('tickets.show',compact('ticketinfo','tickets_response','users','flags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->assign_id=$request->input('asignado');
        $ticket->flag_id=$request->input('nivel');
        $ticket->status='PROCESS';
        $ticket->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
