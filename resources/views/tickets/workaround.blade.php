<div class="row">
    <div class="col-lg-12">
        <h3 class="noteHeading">Workarounds ({{ count($workArounds) }})</h3>

        @forelse($workArounds as $workAround)
            <div class="custom-card row">

                <div class="col-lg-11">
                    <div class="flex row">
                        <img class="note-user-avatar-thumbnail col-lg-4 flex" src="{{ $workAround->user->avatar->avatar }}"> 
                        <p class="flex row col-lg-8">
                            <span class="noteAuthor col-lg-12">{{ $workAround->user->name }}</span><br>
                            <span class="noteCreated col-lg-12">Created: {{ Carbon\Carbon::parse($workAround->created_at)->toDayDateTimeString() }}</span>
                            {{-- <span class="noteCreated col-lg-12">Modified: {{ Carbon\Carbon::parse($workAround->updated_at)->toDayDateTimeString() }}</span> --}}
                        </p>
                    </div><!--endofrow-->
                </div><!--endofcol-->

                @auth
                <div class="col-lg-1 menu-dropdown">
                    <div class="noteDropdownContainer">
                        <p class="noteSettings" href="#"><i class="fas fa-ellipsis-h"></i></p>
                        <div class="noteDropdownContnent">
                            <a class="note-dropdown-menu" href="/note/{{ $workAround->id }}">Enlarge Note</a>
                            @auth
                                @if(Auth::user()->id == $workAround->user_id)
                                    <a class="note-dropdown-menu" href="/note/{{ $workAround->id }}/edit">Edit Note</a>
                                    <form method="POST" action="/note/{{$workAround->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="note-dropdown-menu">Delete Note</button>
                                    </form>
                                @endif
                            @endauth
                        </div> <!--endofnotedropdownContent-->
                    </div> <!--endofnoteDropdownContainer-->
                </div><!--endofcol-->
                @endauth
                
                <div class="row noteContent">
                    <div class="col-half-left noteItem">
                        <p class="notePage"><strong>Page:</strong> <span>
                            @if(!$workAround->page->page_url == '')
                                <a 
                                    href="{{ $workAround->page->page_url }}" 
                                    target="_blank">
                                    {{ $workAround->page->page }}
                                </a>
                            @else
                                {{ $workAround->page->page }}
                            @endif
                        </span></p>
                    </div><!--endofcol-->
                        
                    <div class="col-half-right noteItem">
                        <p class="noteSection"><strong>Section:</strong> <span>{{ $workAround->section }}</span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteInstruction"><strong>Instruction:</strong> <span><em>{{ $workAround->instruction }}</em></span></p>
                    </div><!--endofcol-->

                    <div class="col-lg-12 noteItem">
                        <p class="noteExplanation"><strong>Explanation:</strong></p> <?php echo($workAround->explanation); ?>
                    </div><!--endofcol-->

                    @if(!strlen($workAround->image) == 0)
                        <div class="col-lg-12 noteItem">
                            <p class="noteExplanation"><strong>Attachment:</strong></p>
                            <img class="attachment" src="{{ $workAround->image }}">
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