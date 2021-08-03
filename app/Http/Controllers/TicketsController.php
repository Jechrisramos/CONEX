<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\Page;
use App\Models\Note;
use App\Models\NoteType;

use Carbon\Carbon;
use Session;

class TicketsController extends Controller
{

    function __constuct(){
        $this->middleware(['auth'])->except('show');
    }

    public function dashboard(){
        // lists of all ticket types
        $ticketTypes = TicketType::all();

        // gets all website care tickets
        $websiteCares = Ticket::where('ticket_type_id', '=', 6)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all revision tickets
        $revisions = Ticket::where('ticket_type_id', '=', 5)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all Build Premium Store (Woocommerce) tickets
        $build_Woocommerces = Ticket::where('ticket_type_id', '=', 4)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all Build Premium tickets
        $build_Premiums = Ticket::where('ticket_type_id', '=', 3)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all Build Standard tickets
        $build_Standards = Ticket::where('ticket_type_id', '=', 2)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all Build Starter tickets
        $build_Starters = Ticket::where('ticket_type_id', '=', 1)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all GCols tickets
        $GCols = Ticket::where('ticket_type_id', '=', 7)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        // gets all GCols tickets
        $v6_migrations = Ticket::where('ticket_type_id', '=', 8)
            ->orderBy('ticket', 'desc')
            ->paginate(10);

        return view('dashboard',
            [
                'ticketTypes' => $ticketTypes,
                'websiteCares' => $websiteCares,
                'revisions' => $revisions,
                'build_Woocommerces' => $build_Woocommerces,
                'build_Premiums' => $build_Premiums,
                'build_Standards' => $build_Standards,
                'build_Starters' => $build_Starters,
                'GCols' => $GCols,
                'v6_migrations' => $v6_migrations,
            ]
        );
    }

    function search(Request $request){

        // $search = $request->searchQuery;
        // dd($search);
        $tickets = Ticket::where('ticket', 'LIKE', "%{$request->searchQuery}%" )
                        ->orWhere('business_name', 'LIKE', "%{$request->searchQuery}%")
                        ->orWhere('ticket_descriptions', 'LIKE', "%{$request->searchQuery}%")
                        ->orderBy('ticket', 'desc')
                        ->paginate(10);

        $ticketTypes = TicketType::all();

        if($tickets){
            return view('search-result', 
                    [
                        'search' => $request->searchQuery,
                        'tickets' => $tickets,
                        'ticketTypes' => $ticketTypes
                    ]
            );
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = "";
        $tickets = Ticket::where('user_id', "=", Auth::user()->id)
                ->orderBy('ticket', 'desc')
                ->paginate(10);
        $ticketTypes = TicketType::all();
        return view('tickets.tickets', 
                    [
                        'search' => $search,
                        'tickets' => $tickets,
                        'ticketTypes' => $ticketTypes
                    ]
        );
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
       // dd($request); 
        $request->validate([
            'ticketNumber' => 'required | unique:tickets,ticket',
            'businessName' => 'required | min:2 | max:90',
            'siteUrl' => 'required | min:10 | max:90',
            'planType' => 'required | numeric',
            'ticketRemarks' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->ticket = strtoupper($request->ticketNumber);
        $ticket->business_name = ucwords($request->businessName);
        $ticket->site_url = strtolower($request->siteUrl);
        $ticket->user_id = Auth::user()->id;
        $ticket->ticket_type_id = $request->planType;
        if($request->planType == 1){
            $ticket->high_content = null;
        }
        elseif($request->planType == 2){
            $ticket->high_content = null;
        }
        else{
            $ticket->high_content = $request->highContent;
        }
        $ticket->ticket_descriptions = $request->ticketRemarks;
        $ticket->save();
        Session::flash('ticket_saved', 'Saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket) 
    {
        /* A query that will return the whole row of the $ticket. */
        $ticket_details = Ticket::where('ticket', '=', $ticket)->get();
        $ticket_id = Ticket::select('id')->where('ticket', $ticket)->first();

        $pages = Page::where('ticket_id', '=', $ticket_id->id)->get();

        $general_notes = Note::where('ticket_id', '=', $ticket_id->id)->get();

        $releaseNotes = Note::where('ticket_id', '=', $ticket_id->id)
                            ->where('note_type_id', '=', 1)
                            ->where('needs_edit', '=', null)
                            ->get();
                          
        $workArounds = Note::where('ticket_id', '=', $ticket_id->id)
                            ->where('note_type_id', '=', 2)
                            ->where('needs_edit', '=', null)
                            ->get();

        // needsEditRN & needsEditWA are for notes for QCs Needs Edit
        $needsEdit = Note::where('ticket_id', '=', $ticket_id->id)
                            ->where('needs_edit', '=', 1)
                            ->get();
        
        $needsEdit_RN = Note::where('ticket_id', '=', $ticket_id->id)
                            ->where('note_type_id', '=', 1)
                            ->where('needs_edit', '=', 1)
                            ->get();

        $needsEdit_WA = Note::where('ticket_id', '=', $ticket_id->id)
                            ->where('note_type_id', '=', 2)
                            ->where('needs_edit', '=', 1)
                            ->get();

        $developers = Note::where('ticket_id', '=', $ticket_id->id)
                            ->groupBy('user_id')
                            ->get();
        
        $noteTypes = NoteType::all(); //releasenote or workaround
        // dd($tickets);
        return view('tickets.ticket-show',
                    [   
                        'ticket' => $ticket,
                        'ticket_details' => $ticket_details,
                        'pages' => $pages,
                        'noteTypes' => $noteTypes,
                        'general_notes' =>  $general_notes,
                        'releaseNotes' => $releaseNotes,
                        'workArounds' => $workArounds,
                        'needsEdit' => $needsEdit,
                        'needsEdit_RN' => $needsEdit_RN,
                        'needsEdit_WA' => $needsEdit_WA,
                        'developers' => $developers,
                    ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ticket)
    {
        $ticketTypes = TicketType::all();

        /* A query that will return the whole row of the $ticket. */
        $ticket_detail = Ticket::where('ticket', '=', $ticket)->first();

        return view('tickets.edit-ticket', [
            'ticket' => $ticket,
            'ticketTypes' => $ticketTypes,
            'ticket_detail' => $ticket_detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ticket $ticket, Request $request)
    {
        $request->validate([
            'businessName' => 'required | min:2 | max:90',
            'siteUrl' => 'required | min:10 | max:90',
            'planType' => 'required | numeric',
            'explanationTxt' => 'required',
        ]);

        $ticket->business_name = ucwords($request->businessName);
        $ticket->site_url = strtolower($request->siteUrl);
        $ticket->ticket_type_id = $request->planType;
        if($request->planType == 1){
            $ticket->high_content = null;
        }
        elseif($request->planType == 2){
            $ticket->high_content = null;
        }
        else{
            $ticket->high_content = $request->highContent;
        }
        
       
        $ticket->ticket_descriptions = $request->explanationTxt;
        // dd($ticket);
        $ticket->save();
        Session::flash('ticket_saved', 'Saved');

        return redirect('/tickets/'.$ticket->ticket);
    }

}
