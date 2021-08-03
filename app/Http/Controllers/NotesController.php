<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\Page;
use App\Models\Note;
use App\Models\NoteType;
// Use App\Models\Audit;

use Carbon\Carbon;
use Session;

class NotesController extends Controller
{
    function __constuct(){
        $this->middleware(['auth'])->except(['show', 'filterByPage']);
    }

    function new_note($ticket, Request $request){ //this function serves a
        //noteTypeDropdown
        //pageDropdown
        //sectionTxt
        //instructionTxt
        //explanationTxt
        //image
        $ticket_id = Ticket::select('id')->where('ticket', $ticket)->first(); //returns the id of a ticket number

        $request->validate([
            'noteTypeDropdown' => 'required',
            'pageDropdown' => 'required',
            'sectionTxt' => 'required | min:3 | max:90',
            'instructionTxt' => 'required | min:5 | max: 1000',
            'explanationTxt' => 'required | min:10 | max: 1000',
            'image' => 'max: 100000 | mimes:jpeg,png,gif'
        ]);

        $note = New Note();
        $note->ticket_id = $ticket_id->id;
        $note->user_id = Auth::user()->id; //id instance.
        $note->page_id = $request->pageDropdown;
        $note->note_type_id = $request->noteTypeDropdown;
        $note->section = $request->sectionTxt;
        $note->instruction = $request->instructionTxt;
        $note->explanation = $request->explanationTxt;
        $note->updated_at = null;
        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $path = $request->image->store('public/images/noteAttachments/');
            $r_filename = basename($path);
            $note->image = "/storage/images/noteAttachments/$r_filename";
        }
        $note->needs_edit = $request->needsEdit;
        $note->save();
        Session::flash('success_new_note', 'New Note Successfully Added.');

        return redirect()->back();
    }
    
    // Display the specified resource.
    function show(Note $note){
        $noteTypes = NoteType::all(); //releasenote or workaround
        $pages = Page::all();
        $ticket_id = $note->ticket()->first();
        $audits = $note->audits()->orderBy('created_at', 'desc')->get();
        // dd($pages);
        return view ('notes.show', [
            'noteTypes' => $noteTypes,
            'pages' => $pages,
            'note' => $note,
            'ticket_id' => $ticket_id,
            'audits' => $audits,
        ]);
    }

    // Show the form for editing the specified resource.
    function edit(Note $note){
        $noteTypes = NoteType::all(); //releasenote or workaround
        $ticket_id = $note->ticket()->first(); //query that gets the ticket of this note
        $pages = Page::where('ticket_id', '=', $ticket_id->id)
                            ->get();
        // dd($pages);

        return view('notes.edit', [
            'note' => $note,
            'noteTypes' => $noteTypes,
            'ticket_id' => $ticket_id,
            'pages' => $pages,
        ]);
    }

    // Soft Deletes a Note
    function destroy(Note $note){
        $note->delete();

        return redirect()->back();
    }

    // Update the specified resource in storage.
    function update(Note $note, Request $request){
        $request->validate([
            'noteTypeDropdown' => 'required',
            'pageDropdown' => 'required',
            'sectionTxt' => 'required | min:3 | max:90',
            'instructionTxt' => 'required | min:10 | max: 1000',
            'explanationTxt' => 'required | min:25 | max: 1000',
            'image' => 'max: 100000 | mimes:jpeg,png,gif'
        ]);

        $update_date = new Carbon(); //gets current-date

        $note->page_id = $request->pageDropdown;
        $note->note_type_id = $request->noteTypeDropdown;
        $note->section = $request->sectionTxt;
        $note->instruction = $request->instructionTxt;
        $note->explanation = $request->explanationTxt;
        $note->updated_at = $update_date->timezone('Asia/Manila');
        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $path = $request->image->store('public/images/noteAttachments/');
            $r_filename = basename($path);
            $note->image = "/storage/images/noteAttachments/$r_filename";
        }
        $note->save();
        Session::flash('success_updated_note', 'New Note Successfully Added.');

        return redirect('/note/'.$note->id);
        // return redirect('/tickets/'.$note->ticket);
    }

    // Filter notes by pages.
    function filterByPage(Page $page){
        $ticket = $page->ticket->ticket;
        $ticket_id = $page->ticket->id;

        $ticket_details = Ticket::where('ticket', '=', $ticket)->get();

        $pages = Page::where('ticket_id', '=', $ticket_id)->get();

        $noteTypes = NoteType::all(); //releasenote or workaround

        $general_notes = Note::where('ticket_id', '=', $ticket_id)
                            ->where('page_id', '=', $page->id)
                            ->get();
        
        $releaseNotes = Note::where('ticket_id', '=', $ticket_id)
                            ->where('page_id', '=', $page->id)
                            ->where('note_type_id', '=', 1)
                            ->where('needs_edit', '=', null)
                            ->get();
                                            
        $workArounds = Note::where('ticket_id', '=', $ticket_id)
                            ->where('page_id', '=', $page->id)
                            ->where('note_type_id', '=', 2)
                            ->where('needs_edit', '=', null)
                            ->get();

        // needsEditRN & needsEditWA are for notes for QCs Needs Edit
        $needsEdit = Note::where('ticket_id', '=', $ticket_id)
                            ->where('page_id', '=', $page->id)
                            ->where('needs_edit', '=', 1)
                            ->get();
        
        $needsEdit_RN = Note::where('ticket_id', '=', $ticket_id)
                            ->where('page_id', '=', $page->id)
                            ->where('note_type_id', '=', 1)
                            ->where('needs_edit', '=', 1)
                            ->get();

        $needsEdit_WA = Note::where('ticket_id', '=', $ticket_id)
                            ->where('page_id', '=', $page->id)
                            ->where('note_type_id', '=', 2)
                            ->where('needs_edit', '=', 1)
                            ->get();

        $developers = Note::where('ticket_id', '=', $ticket_id)
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
}
