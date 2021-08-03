<div class="row">
    <div class="col-lg-12">
        <h4 class="noteHeading">Release Notes ({{ count($needsEdit_RN) }})</h4>

        @forelse($needsEdit_RN as $needsEditRN)
            <div class="custom-card-needs-edit row">
 
                <div class="col-lg-11">
                    <div class="flex row">
                        <img class="note-user-avatar-thumbnail col-lg-4 flex" src="{{ $needsEditRN->user->avatar->avatar }}"> 
                        <p class="flex row col-lg-8">
                            <span class="noteAuthor col-lg-12">{{ $needsEditRN->user->name }}</span><br>
                            <span class="noteCreated col-lg-12">Created: {{ Carbon\Carbon::parse($needsEditRN->created_at)->toDayDateTimeString() }}</span> 
                            {{-- <span class="noteCreated col-lg-12">Modified: {{ Carbon\Carbon::parse($needsEditRN->updated_at)->toDayDateTimeString() }}</span> --}}
                        </p>
                    </div><!--endofrow-->
                </div><!--endofcol-->
                
                @auth
                <div class="col-lg-1 menu-dropdown">
                    <div class="noteDropdownContainer">
                        <p class="noteSettings" href="#"><i class="fas fa-ellipsis-h"></i></p>
                        <div class="noteDropdownContnent">
                            <a class="note-dropdown-menu" href="/note/{{ $needsEditRN->id }}">Enlarge Note</a>
                            {{--<form method="get" action="/ticket/{{ $ticket }}/note/{{ $needsEditRN->id }}">
                                <button>Enlarge Note</button>
                            </form>--}}
                            
                                @if(Auth::user()->id == $needsEditRN->user_id)
                                    <a class="note-dropdown-menu" href="/note/{{ $needsEditRN->id }}/edit">Edit Note</a>
                                    
                                    <form method="POST" action="/note/{{$needsEditRN->id}}">
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
                    <div class="ne-col-half-left noteItem">
                        <p class="notePage"><strong>Page:</strong> <span>
                                @if(!$needsEditRN->page->page_url == '')
                                    <a 
                                        href="{{ $needsEditRN->page->page_url }}" 
                                        target="_blank">
                                        {{ $needsEditRN->page->page }}
                                    </a>
                                @else
                                    {{ $needsEditRN->page->page }}
                                @endif
                        </span></p>
                    </div><!--endofcol-->
                        
                    <div class="ne-col-half-right noteItem">
                        <p class="noteSection"><strong>Section:</strong> <span>{{ $needsEditRN->section }}</span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteInstruction" style="color:#C50707;"><strong>QC Instruction:</strong> <span><em>{{ $needsEditRN->instruction }}</em></span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteExplanation"><strong>Explanation:</strong></p> <?php echo($needsEditRN->explanation); ?>
                    </div><!--endofcol-->
                    
                    @if(!strlen($needsEditRN->image) == 0)
                        <div class="col-lg-12 noteItem">
                            <p class="noteExplanation"><strong>Attachment:</strong></p>
                            <img class="attachment" src="{{ $needsEditRN->image }}">
                        </div><!--endofcol-->
                    @endif

                </div><!--noteContent-->
            </div><!--endofcustomcard-->
        @empty
            <div class="custom-card row">
                <p class="flex"><i class="far fa-folder-open fa-2x"></i> <span class='empty-card-message'>No Needs-Edit Release Notes Yet.</span></p>
            </div><!--endofcustomcard-->
        @endforelse

    </div><!--endofcol-->
</div><!--endofrow-->