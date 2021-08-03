<x-app-layout>
    @section('page-title')
        Note - {{ $ticket_id->ticket }}
    @endsection

    @section('content')

    <div class="content">
        <div id="custom-panel" class="row">

            <a href="/tickets/{{ $ticket_id->ticket }}/"><h2 class="page-title col-lg-12">
                <i class="fas fa-chevron-left"></i> <strong>{{ $ticket_id->ticket }}</strong>
            </h2></a>

                <div class="note-custom-card row">
 
                    <div class="col-lg-11">
                        <div class="flex row">
                            <img class="note-user-avatar-thumbnail col-lg-4 flex" src="{{ $note->user->avatar->avatar }}"> 
                            <p class="flex row col-lg-8">
                                <span class="noteAuthor col-lg-12">{{ $note->user->name }}</span><br>
                                <span class="noteCreated col-lg-12">Created: {{ Carbon\Carbon::parse($note->created_at)->toDayDateTimeString() }}</span>
                                <span class="noteCreated col-lg-12">Modified: {{ Carbon\Carbon::parse($note->updated_at)->toDayDateTimeString() }}</span> 
                            </p>
                        </div><!--endofrow-->
                    </div><!--endofcol-->
                    
                    <div class="col-lg-1 menu-dropdown">
                        @if(Auth::user()->id == $note->user_id)
                        <div class="noteDropdownContainer">
                            <p class="noteSettings" href="#"><i class="fas fa-ellipsis-h"></i></p>
                            <div class="noteDropdownContnent">
                                <a class="note-dropdown-menu" href="/note/{{ $note->id }}/edit">Edit Note</a>
                                <a class="note-dropdown-menu" href="#">Delete Note</a>
                            </div> <!--endofnotedropdownContent-->
                        </div> <!--endofnoteDropdownContainer-->
                        @endif
                    </div><!--endofcol-->

                    <div class="row noteContent">
                        <div class="col-lg-3 noteItem">
                            <p class="notePage"><strong>Page:</strong> <span>
                                @if(!$note->page->page_url == '')
                                    <a 
                                        href="{{ $note->page->page_url }}" 
                                        target="_blank">
                                        {{ $note->page->page }}
                                    </a>
                                @else
                                    {{ $note->page->page }}
                                @endif
                            </span></p>
                        </div><!--endofcol-->
                            
                        <div class="col-lg-4 noteItem">
                            <p class="noteSection"><strong>Note Type:</strong> <span>{{ $note->noteType->note_type }}</span></p>
                        </div><!--endofcol-->

                        <div class="col-lg-4 noteItem">
                            <p class="noteSection"><strong>Section:</strong> <span>{{ $note->section }}</span></p>
                        </div><!--endofcol-->

                        <div class="col-lg-12 noteItem">
                            <p class="noteInstruction"><strong>Instruction:</strong> <span><em>{{ $note->instruction }}</em></span></p>
                        </div><!--endofcol-->

                        <div class="col-lg-12 noteItem">
                            <p class="noteExplanation"><strong>Explanation:</strong> <span><?php echo($note->explanation);?></span></p>
                        </div><!--endofcol-->

                        @if(!strlen($note->image) == 0)
                            <div class="col-lg-12 noteItem">
                            <p class="noteAttachement"><strong>Attachment:</strong> <span>{{ $note->image }}</span></p>
                                <img class="attachment" src="{{ $note->image }}">
                            </div><!--endofcol-->
                        @endif
                    </div><!--noteContent-->
                </div><!--endofcustomcard-->
                
                <h3 class="noteHeading">Edit History</h3>

                @forelse ($audits as $audit)
                    <div class="note-custom-card row">
                        
                        <div class="col-lg-12">
                            <div class="flex row">
                                <img class="note-user-avatar-thumbnail col-lg-4 flex" src="{{ $audit->user->avatar->avatar }}"> 
                                <p class="flex row col-lg-4">
                                    <span class="noteAuthor col-lg-12">{{ $audit->user->name }}</span><br>
                                    <span class="noteCreated col-lg-12">Modified: {{ Carbon\Carbon::parse($audit->created_at)->toDayDateTimeString() }}</span> 
                                </p>
                            </div><!--endofrow-->
                        </div><!--endofcol-->
                        
                        <div class="row noteContent">
                            @foreach ($audit->old_values as $attribute => $old_value)
                                
                                @if($attribute == 'page_id')
                                    @foreach($pages as $page)
                                        @if($old_value == $page->id)
                                        <div class="col-lg-3 noteItem">
                                            <p class="noteInstruction flex"><i class="fas fa-pencil-alt"></i>&nbsp;<strong>Page:</strong>&nbsp;<span>{{ $page->page }}</span></p>
                                        </div><!--endofcol-->
                                        @endif
                                    @endforeach
                                @endif

                                @if($attribute == 'note_type_id')
                                    @foreach($noteTypes as $noteType)
                                        @if($old_value == $noteType->id)
                                        <div class="col-lg-4 noteItem">
                                            <p class="noteInstruction flex"><i class="fas fa-pencil-alt"></i>&nbsp;<strong>Note Type:</strong>&nbsp;<span>{{ $noteType->note_type }}</span></p>
                                        </div><!--endofcol-->
                                        @endif
                                    @endforeach
                                @endif

                                @if($attribute == 'section')
                                    <div class="col-lg-4 noteItem">
                                        <p class="noteInstruction flex"><i class="fas fa-pencil-alt"></i>&nbsp;<strong><?php echo(ucwords($attribute)); ?>:</strong>&nbsp;<span><?php echo($old_value); ?></span></p>
                                    </div><!--endofcol-->
                                @endif

                                @if($attribute == 'instruction')
                                    <div class="col-lg-12 noteItem">
                                        <p class="noteInstruction flex"><i class="fas fa-pencil-alt"></i>&nbsp;<strong><?php echo(ucwords($attribute)); ?>:</strong>&nbsp;<span><?php echo($old_value); ?></span></p>
                                    </div><!--endofcol-->
                                @endif

                                @if($attribute == 'explanation')
                                    <div class="col-lg-12 noteItem">
                                        <p class="noteInstruction flex"><i class="fas fa-pencil-alt"></i>&nbsp;<strong><?php echo(ucwords($attribute)); ?>:</strong> <span><?php echo($old_value); ?></span></p>
                                    </div><!--endofcol-->
                                @endif

                                @if($attribute == 'image')
                                    <div class="col-lg-12 noteItem">
                                        <p class="noteAttachement"><strong>Attachment:</strong> <span>{{ $old_value }}</span></p>
                                        <img class="attachment" src="{{ $old_value }}">
                                    </div><!--endofcol-->
                                @endif
   
                            @endforeach
                        </div><!--noteContent-->

                    </div><!--endofcustomcard-->
                @empty
                    <div class="note-custom-card row">
                        <p class="flex"><i class="far fa-folder-open fa-2x"></i> <span class='empty-card-message'>No Modifications made yet.</span></p>
                    </div><!--endofcustomcard-->
                @endforelse

            <div id="galleryModal">
                <div id="galleryModalContent" class="row clear">
                    <div class="col-lg-12 float-right">
                        <div id="closeGalleryModal">
                            <span id="spanClose"><i class="fas fa-times"></i></span>
                        </div><!--closeBtnColumn-->
                    </div><!--endofcol-->
                    <div id="imgContent" class="col-lg-12 float-left">
                    </div><!--endofcol-->
                </div> <!-- galleryModalContent -->
            </div>
        </div><!--endofrow-->
    </div><!--endofcontent--> 

        <script>
            /* ---- script for image lightbox effect ---- */
            const closeGalleryModal = document.getElementById('closeGalleryModal');
            const imgContent = document.getElementById('imgContent');

            let imgs = document.querySelectorAll('img.attachment');
            
            for (let i = 0; i < imgs.length; i++){
                imgs[i].addEventListener("click", function(){
                    galleryModal.style.display = 'block';

                    let img = document.createElement("img");
                    img.setAttribute("class", "attachmentImgs");
                    img.setAttribute("src", imgs[i].src);
                    imgContent.appendChild(img);

                    let photoTitle = document.createElement("p");
                    photoTitle.setAttribute("class", "photoTitle");
                    let photoTitleText = document.createTextNode(imgs[i].src);
                    imgContent.appendChild(photoTitle);
                    photoTitle.appendChild(photoTitleText);
                    console.log(imgs[i].innerHTML);
                });
            }

            closeGalleryModal.addEventListener("click", function(){ 
                galleryModal.style.display = 'none';
                location.reload();
            });
        </script>
    @endsection
</x-app-layout>