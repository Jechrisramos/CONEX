<div class="row">
    <div class="col-lg-12">
        <h4 class="noteHeading">Workarounds ({{ count($needsEdit_WA) }})</h4>

        @forelse($needsEdit_WA as $needsEditWA)
            <div class="custom-card-needs-edit row">

                <div class="col-lg-11">
                    <div class="flex row">
                        <img class="note-user-avatar-thumbnail col-lg-4 flex" src="{{ $needsEditWA->user->avatar->avatar }}"> 
                        <p class="flex row col-lg-8">
                            <span class="noteAuthor col-lg-12">{{ $needsEditWA->user->name }}</span><br>
                            <span class="noteCreated col-lg-12">Created: {{ Carbon\Carbon::parse($needsEditWA->created_at)->toDayDateTimeString() }}</span>
                            {{-- <span class="noteCreated col-lg-12">Modified: {{ Carbon\Carbon::parse($needsEditWA->updated_at)->toDayDateTimeString() }}</span> --}}
                        </p>
                    </div><!--endofrow-->
                </div><!--endofcol-->

                @auth
                <div class="col-lg-1 menu-dropdown">
                    <div class="noteDropdownContainer">
                        <p class="noteSettings" href="#"><i class="fas fa-ellipsis-h"></i></p>
                        <div class="noteDropdownContnent">
                            <a class="note-dropdown-menu" href="/note/{{ $needsEditWA->id }}">Enlarge Note</a>
                            
                                @if(Auth::user()->id == $needsEditWA->user_id)
                                    <a class="note-dropdown-menu" href="/note/{{ $needsEditWA->id }}/edit">Edit Note</a>
                                    <form method="POST" action="/note/{{$needsEditWA->id}}">
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
                            @if(!$needsEditWA->page->page_url == '')
                                <a 
                                    href="{{ $needsEditWA->page->page_url }}" 
                                    target="_blank">
                                    {{ $needsEditWA->page->page }}
                                </a>
                            @else
                                {{ $needsEditWA->page->page }}
                            @endif
                        </span></p>
                    </div><!--endofcol-->
                        
                    <div class="ne-col-half-right noteItem">
                        <p class="noteSection"><strong>Section:</strong> <span>{{ $needsEditWA->section }}</span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteInstruction" style="color:#C50707;"><strong>QC Instruction:</strong> <span><em>{{ $needsEditWA->instruction }}</em></span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteExplanation"><strong>Explanation:</strong></p> <?php echo($needsEditWA->explanation); ?>
                    </div><!--endofcol-->

                    @if(!strlen($needsEditWA->image) == 0)
                        <div class="col-lg-12 noteItem">
                            <p class="noteExplanation"><strong>Attachment:</strong></p>
                            <img class="attachment" src="{{ $needsEditWA->image }}">
                        </div><!--endofcol-->
                    @endif
                </div><!--noteContent-->
            </div><!--endofcustomcard-->
        @empty
            <div class="custom-card row">
                <p class="flex"><i class="far fa-folder-open fa-2x"></i> <span class='empty-card-message'>No Workaround Notes Yet.</span></p>
            </div><!--endofcustomcard-->
        @endforelse
        
    </div><!--endofcol-->
</div><!--endofrow-->