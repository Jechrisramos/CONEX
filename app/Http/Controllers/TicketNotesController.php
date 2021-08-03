<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\Page;
use App\Models\NoteType;
use Session;

class TicketNotesController extends Controller
{
    function new_note($ticket, Request $request){
        dd($ticket);
    }
}
