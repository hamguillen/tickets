<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Ticket;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //dd(Auth::user()->roles->first()->name);
        if(Auth::user()->hasRole('clients'))
        {
            return redirect()->route('tickets.index');
        }
        $tck_hold=Ticket::select('tickets.*','departments.descripcion as departamento',
            'flags.descripcion as nivel','users.name as asignado','client.name as cliente','clients.nombre as empresa')
            ->join('departments','departments.id','tickets.department_id')
            ->join('users as client','tickets.user_id','client.id')
            ->leftjoin('clients','clients.id','client.id')
            ->leftJoin('users','tickets.assign_id','users.id')
            ->leftJoin('flags','tickets.flag_id','flags.id')
            ->when(Auth::user()->hasAnyRole('users'),function($query){
                $query->where('tickets.assign_id',Auth::user()->id);
            })->where('tickets.status','HOLD')
            ->OrderBy('tickets.created_at')->get();
        $tck_mine=Ticket::select('tickets.*','departments.descripcion as departamento',
            'flags.descripcion as nivel','users.name as asignado','client.name as cliente','clients.nombre as empresa')
            ->join('departments','departments.id','tickets.department_id')
            ->join('users as client','tickets.user_id','client.id')
            ->leftjoin('clients','clients.id','client.id')
            ->leftJoin('users','tickets.assign_id','users.id')
            ->leftJoin('flags','tickets.flag_id','flags.id')
            ->when(Auth::user()->hasAnyRole('users'),function($query){
                $query->where('tickets.assign_id',Auth::user()->id);
            })
            ->where('tickets.status','PROCESS')
            ->OrderBy('tickets.created_at')->get();
        $tck_closed=Ticket::select('tickets.*','departments.descripcion as departamento',
            'flags.descripcion as nivel','users.name as asignado','client.name as cliente','clients.nombre as empresa')
            ->join('departments','departments.id','tickets.department_id')
            ->join('users as client','tickets.user_id','client.id')
            ->leftjoin('clients','clients.id','client.id')
            ->leftJoin('users','tickets.assign_id','users.id')
            ->leftJoin('flags','tickets.flag_id','flags.id')
            ->where('tickets.assign_id',Auth::user()->id)
            ->where('tickets.status','CLOSED')
            ->OrderBy('tickets.created_at')->get();
        $tck_open=Ticket::select('tickets.*','departments.descripcion as departamento',
            'flags.descripcion as nivel','users.name as asignado','client.name as cliente','clients.nombre as empresa')
            ->join('departments','departments.id','tickets.department_id')
            ->join('users as client','tickets.user_id','client.id')
            ->leftjoin('clients','clients.id','client.id')
            ->leftJoin('users','tickets.assign_id','users.id')
            ->leftJoin('flags','tickets.flag_id','flags.id')
            ->where('tickets.status','OPEN')
            ->OrderBy('tickets.created_at')->get();
        return view('welcome',compact('tck_hold','tck_mine','tck_closed','tck_open'));
    }
}
