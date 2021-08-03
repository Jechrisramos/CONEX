<div class="row">
    <div class="col-lg-12">
        <h3 class="noteHeading">Release Notes ({{ count($releaseNotes) }})</h3>

        @forelse($releaseNotes as $releaseNote)
            <div class="custom-card row">
 
                <div class="col-lg-11">
                    <div class="flex row">
                        <img class="note-user-avatar-thumbnail col-lg-4 flex" src="{{ $releaseNote->user->avatar->avatar }}"> 
                        <p class="flex row col-lg-8">
                            <span class="noteAuthor col-lg-12">{{ $releaseNote->user->name }}</span><br>
                            <span class="noteCreated col-lg-12">Created: {{ Carbon\Carbon::parse($releaseNote->created_at)->toDayDateTimeString() }}</span> 
                            {{-- <span class="noteCreated col-lg-12">Modified: {{ Carbon\Carbon::parse($releaseNote->updated_at)->toDayDateTimeString() }}</span> --}}
                        </p>
                    </div><!--endofrow-->
                </div><!--endofcol-->

                @auth
                <div class="col-lg-1 menu-dropdown">
                    <div class="noteDropdownContainer">
                        <p class="noteSettings" href="#"><i class="fas fa-ellipsis-h"></i></p>
                        <div class="noteDropdownContnent">
                            <a class="note-dropdown-menu" href="/note/{{ $releaseNote->id }}">Enlarge Note</a>
                            {{--<form method="get" action="/ticket/{{ $ticket }}/note/{{ $releaseNote->id }}">
                                <button>Enlarge Note</button>
                            </form>--}}
                                @if(Auth::user()->id == $releaseNote->user_id)
                                    <a class="note-dropdown-menu" href="/note/{{ $releaseNote->id }}/edit">Edit Note</a>
                                    
                                    <form method="POST" action="/note/{{$releaseNote->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="note-dropdown-menu">Delete Note</button>
                                    </form>
                                @endif
                        </div> <!--endofnotedropdownContent-->
                    </div> <!--endofnoteDropdownContainer-->
                </div><!--endofcol-->
                @endauth

                <div class="row noteContent">
                    <div class="col-half-left noteItem">
                        <p class="notePage"><strong>Page:</strong> <span>
                            @if(!$releaseNote->page->page_url == '')
                                <a 
                                    href="{{ $releaseNote->page->page_url }}" 
                                    target="_blank">
                                    {{ $releaseNote->page->page }}
                                </a>
                            @else
                                {{ $releaseNote->page->page }}
                            @endif
                        </span></p>
                    </div><!--endofcol-->
                        
                    <div class="col-half-right noteItem">
                        <p class="noteSection"><strong>Section:</strong> <span>{{ $releaseNote->section }}</span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteInstruction"><strong>Instruction:</strong> <span><em>{{ $releaseNote->instruction }}</em></span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteExplanation"><strong>Explanation:</strong></p> <?php echo($releaseNote->explanation); ?>
                    </div><!--endofcol-->
                    
                    @if(!strlen($releaseNote->image) == 0)
                        <div class="col-lg-12 noteItem">
                            <p class="noteExplanation"><strong>Attachment:</strong></p>
                            <img class="attachment" src="{{ $releaseNote->image }}">
                        </div><!--endofcol-->
                    @endif

                </div><!--noteContent-->
            </div><!--endofcustomcard-->
        @empty
            <div class="custom-card row">
                <p class="flex"><i class="far fa-folder-open fa-2x"></i> <span class='empty-card-message'>No Release Notes Yet.</span></p>
            </div><!--endofcustomcard-->
        @endforelse

    </div><!--endofcol-->
</div><!--endofrow-->