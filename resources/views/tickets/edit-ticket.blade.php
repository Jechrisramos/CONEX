<x-app-layout>
    @section('page-title')
        Edit - {{ $ticket }}
    @endsection

    @section('content')
        <div class="content">
            <div id="custom-panel" class="row">
                
            <a href="/tickets/{{ $ticket }}/"><h2 class="page-title col-lg-12">
                <i class="fas fa-chevron-left"></i> <strong>{{ $ticket }}</strong>
            </h2></a>

                <div class="col-lg-12">
                   <!--Edit Form for Ticket Information-->
                   <form class="row" method="post" action="/tickets/{{$ticket_detail->id}}">
                        @csrf
                        @method('PUT')
                        <div class="input-section col-lg-6">
                            <x-jet-label for="businessName" value="{{ __('Business Name') }}" />
                            <input class="custom-input mt-1 block w-full" id="businessName" type="text" name="businessName" value="{{ $ticket_detail->business_name }}" required>
                            <x-jet-input-error for="businessName" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-6">
                            <x-jet-label for="planType" value="{{ __('Plan Type') }}" />
                            <Select class="custom-select mt-1 block w-full" id="planType" name="planType" placeholder="{{ __('Choose Right Plan Type') }}" required>
                                @foreach($ticketTypes as $ticketType)
                                    @if($ticket_detail->ticket_type_id == $ticketType->id)
                                        <option class="custom-option" selected value="{{ $ticketType->id }}">{{ $ticketType->ticket_type }}</option>
                                    @else
                                        <option value="{{ $ticketType->id }}">{{ $ticketType->ticket_type }}</option>
                                    @endif
                                @endforeach
                            </Select>
                            <x-jet-input-error for="planType" class="mt-2" />
                        </div><!--endofcol-->

                        <div id="HCcheckbox" class="input-section col-lg-12">
                            <div class="form-check">
                                @if($ticket_detail->high_content == 1)
                                    <input class="form-check-input" checked type="checkbox" name="highContent" value="1" id="highContent">
                                @else
                                    <input class="form-check-input" type="checkbox" name="highContent" value="1" id="highContent">
                                @endif
                                
                                <x-jet-label for="highContent" value="{{ __('High Content') }}" />
                            </div>
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="siteUrl" value="{{ __('Site Url') }}" />
                            <input class="custom-input mt-1 block w-full" id="siteUrl" type="text" name="siteUrl" value="{{ $ticket_detail->site_url }}" required>
                            <x-jet-input-error for="siteUrl" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <x-jet-label for="ticketDescriptions" value="{{ __('Ticket Description') }}" />
                            <textarea class="custom-input mt-1 block w-full" id="explanationTxt" type="text" name="explanationTxt" required>{{ $ticket_detail->ticket_descriptions }}</textarea>
                            <x-jet-input-error for="ticketDescriptions" class="mt-2" />
                        </div><!--endofcol-->

                        <div class="input-section col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-jet-button>
                                        {{ __('Update') }}
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
        </div>
    @endsection

</x-app-layout>
