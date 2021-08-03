<x-app-layout>
    @section('page-title')
        Edit Note - {{ $ticket_id->ticket }}
    @endsection

    @section('content')
        <div class="content">
            <div id="custom-panel" class="row">
            <a href="/tickets/{{ $ticket_id->ticket }}/"><h2 class="page-title col-lg-12">
                <i class="fas fa-chevron-left"></i> <strong>{{ $ticket_id->ticket }}</strong>
            </h2></a>

                <div class="col-lg-12">
                    {{--Edit Form for Note Details--}}
                    <form class="row" method="post" action="/note/{{ $note->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-section col-lg-4">
                            <x-jet-label for="noteTypeDropdown" value="{{ __('Note Type') }}" />
                            <Select class="custom-select mt-1 block w-full" id="noteTypeDropdown" name="noteTypeDropdown" placeholder="{{ __('Choose Note Type') }}" required>
                                <option class="custom-option" selected disabled value="">Choose Note Type</option>
                                @foreach($noteTypes as $noteType)
                                    @if($note->note_type_id == $noteType->id)
                                        <option selected value="{{ $noteType->id }}">{{ $noteType->note_type }}</option>
                                    @else
                                        <option value="{{ $noteType->id }}">{{ $noteType->note_type }}</option>
                                    @endif
                                @endforeach 
                            </Select>
                            <x-jet-input-error for="noteTypeDropdown" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-4">
                            <x-jet-label for="pageDropdown" value="{{ __('Page') }}" />
                                <Select class="custom-select mt-1 block w-full" id="pageDropdown" name="pageDropdown" placeholder="{{ __('Choose Page') }}" required>
                                    <option class="custom-option" selected disabled value="">Choose Page</option>
                                    @foreach($pages as $page)
                                        @if($note->page_id == $page->id)
                                            <option selected value="{{ $page->id }}">{{ $page->page }}</option>
                                        @else
                                            <option value="{{ $page->id }}">{{ $page->page }}</option>
                                        @endif
                                    @endforeach
                                </Select>
                            <x-jet-input-error for="pageDropdown" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-4">
                            <x-jet-label for="sectionTxt" value="{{ __('Section') }}" />
                            <input id="inputSection" class="custom-input mt-1 block w-full" id="sectionTxt" type="text" name="sectionTxt" value="{{ $note->section }}" required>
                            <x-jet-input-error for="sectionTxt" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="instructionTxt" value="{{ __('Instruction') }}" />
                            <input class="custom-input mt-1 block w-full" id="instructionTxt" type="text" name="instructionTxt" value="{{ $note->instruction }}" required>
                            <x-jet-input-error for="instructionTxt" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="explanationTxt" value="{{ __('Explanation') }}" />
                            <textarea class="custom-input mt-1 block w-full" id="explanationTxt" type="text" name="explanationTxt" required>{{ $note->explanation }}</textarea>
                            <x-jet-input-error for="explanationTxt" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="image" value="{{ __('Attachment') }}" />
                            <input id="image" type='file' name="image">
                            <x-jet-input-error for="image" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-jet-button>
                                        {{ __('Update Note') }}
                                    </x-jet-button>
                                </div> <!--endofcol-->

                                <div class="col-lg-6">
                                    @if(Session::has('ticket_saved'))
                                        <div class="alert-box">
                                            <p>{{ Session::get('ticket_saved') }}</p>
                                        </div>
                                    @endif
                                </div> <!--endofcol-->
                            </div><!--endofrow-->
                        </div><!--endofcol-->
                   </form>
                </div><!--endofcol-->

            </div><!--endofrow-->
        </div><!--endofcontent-->
    @endsection

</x-app-layout>
