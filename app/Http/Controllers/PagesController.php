<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Page;
use Session;

class PagesController extends Controller
{
    function store_page($ticket, Request $request){
        $ticket_id = Ticket::select('id')->where('ticket', $ticket)->first();
        // dd($ticket_id->id);
        $request->validate([
            'page' => 'required | min:2 | max:90',
            'page_url' => 'required',
        ]);

        $page = new Page();
        $page->page = ucwords($request->page);
        $page->page_url = strtolower($request->page_url);
        $page->ticket_id = $ticket_id->id;
        $page->save();
        
        Session::flash('New Page', 'New Page Added');
        return redirect()->back();
    }
}
