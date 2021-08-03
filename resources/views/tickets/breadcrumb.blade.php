<div class="row breadCrumbRow">
    <ul class="flex breadCrumb col-lg-8">
        @if(!count($pages) == 0 && count($pages) > 1)
            <li><a href="/tickets/{{ $ticket }}/">All</a></li>
        @endif
        @forelse ($pages as $page)
            <li><a href="/ticket/page/{{$page->id}}/notes">
                {{ $page->page }}
            </a></li>
        @empty
            <li>No Pages yet</li>
        @endforelse

    </ul>

    <div class=" col-lg-4 row">
        @auth
        <div class="flex col-lg-6 btn-container">
            <button id="pageModalBtn" class="col-lg-12 custom-button">New Page</button>
        </div><!--endofcol-->
        
        <div class="flex col-lg-6 btn-container">
            <button id="ModalBtn" class="col-lg-12 custom-button">New Note</button>
        </div><!--endofcol-->

        <!-- New Page Modal -->
        <div id="pageModalBoxContainer">
            <div id="pageModalContent" class="row">
                <div class="col-lg-8 float-left">
                    <h3>Add a New Page</h3>
                </div><!--endofcol-->

                <div class="col-lg-4">
                    <div id="pageCloseBtnColumn">
                        <span id="pageSpanClose"><i class="fas fa-times"></i></span>
                    </div><!--closeBtnColumn-->
                </div><!--endofcol-->

                <div class="col-lg-12">
                    <form method="POST" action="/tickets/{{ $ticket }}/page/">
                        @csrf
                                                
                        <div class="input-section col-lg-12">
                            <x-jet-label for="page" value="{{ __('Page Name') }}" />
                            <input class="custom-input mt-1 block w-full" id="page" type="text" name="page" placeholder="{{ __('Page Name') }}" required>
                            <x-jet-input-error for="page" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="page_url" value="{{ __('Page URL') }}" />
                            <input class="custom-input mt-1 block w-full" id="page_url" type="text" name="page_url" placeholder="{{ __('Page URL') }}" required>
                            <x-jet-input-error for="page_url" class="mt-2" />
                        </div><!--endofcol-->
                        
                        <div class="input-section col-lg-12">
                            <x-jet-button>
                                {{ __('Create Page') }}
                            </x-jet-button>
                        </div><!--endofcol-->
                    </form>
                </div><!--endofcol-->
            </div><!--endofpageModalContent-->
        </div><!--endofpageModalBoxContainer-->

        <!-- New Note Modal -->
        <div id="modalBoxContainer">
            <div id="modalContent" class="row">

                <div class="col-lg-8 float-left">
                    <h3>Add a New Note</h3>
                </div><!--endofcol-->

                <div class="col-lg-4">
                    <div id="closeBtnColumn">
                        <span id="spanClose"><i class="fas fa-times"></i></span>
                    </div><!--closeBtnColumn-->
                </div><!--endofcol-->

                <div class="col-lg-12">
                    <form class="row" method="POST" action="/ticket/{{$ticket}}/note" enctype="multipart/form-data">
                        @csrf
                        <div class="input-section col-lg-4">
                            <x-jet-label for="noteTypeDropdown" value="{{ __('Note Type') }}" />
                            <Select class="custom-select mt-1 block w-full" id="noteTypeDropdown" name="noteTypeDropdown" placeholder="{{ __('Choose Note Type') }}" required>
                                <option class="custom-option" selected disabled value="">Choose Note Type</option>
                                @foreach($noteTypes as $noteType) 
                                    <option value="{{ $noteType->id }}">{{ $noteType->note_type }}</option>
                                @endforeach 
                            </Select>
                            <x-jet-input-error for="noteTypeDropdown" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-4">
                            <x-jet-label for="pageDropdown" value="{{ __('Page') }}" />
                                <Select class="custom-select mt-1 block w-full" id="pageDropdown" name="pageDropdown" placeholder="{{ __('Choose Page') }}" required>
                                    <option class="custom-option" selected disabled value="">Choose Page</option>
                                    @foreach($pages as $page) 
                                        <option value="{{ $page->id }}">{{ $page->page }}</option>
                                    @endforeach
                                </Select>
                            <x-jet-input-error for="pageDropdown" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-4">
                            <x-jet-label for="sectionTxt" value="{{ __('Section') }}" />
                            <input id="inputSection" class="custom-input mt-1 block w-full" id="sectionTxt" type="text" name="sectionTxt" placeholder="{{ __('Where is it located?') }}" required>
                            <x-jet-input-error for="sectionTxt" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="instructionTxt" value="{{ __('Instruction') }}" />
                            <input class="custom-input mt-1 block w-full" id="instructionTxt" type="text" name="instructionTxt" placeholder="{{ __('What is the instruction') }}" required>
                            <x-jet-input-error for="instructionTxt" class="mt-2" /> 
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="explanationTxt" value="{{ __('Explanation') }}" />
                            <textarea class="custom-input mt-1 block w-full" id="explanationTxt" type="text" name="explanationTxt"></textarea>
                            <x-jet-input-error for="explanationTxt" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="image" value="{{ __('Attachment') }}" />
                            <input id="image" type='file' name="image">
                            <x-jet-input-error for="image" class="mt-2" />
                        </div><!--endofcol-->

                        @if(!count($general_notes) == 0)
                        <div id="needs-edit-checkbox" class="input-section col-lg-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="needsEdit" name="needsEdit" value="1">
                                <x-jet-label for="needsEdit" value="{{ __('Needs Edit Note') }}" />
                            </div>
                        </div><!--endofcol-->
                        @endif
                        
                        <div class="input-section col-lg-12">
                            <x-jet-button>
                                {{ __('Create Note') }}
                            </x-jet-button>
                        </div><!--endofcol-->
                    </form>
                </div><!--endofcol-->

            </div><!--modalContent-->
        </div><!--endofmodalBoxContainer-->
        @endauth
    </div><!--endofcol-->
</div><!--endofbreadcrumbrow-->