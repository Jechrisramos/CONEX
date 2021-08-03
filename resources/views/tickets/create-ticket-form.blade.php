<div class="content aside">
    @auth
    <h2>Add New Ticket</h2>

    <form class="row" method="post" action="/tickets">
        @csrf
        <div class="input-section col-lg-12">
            <x-jet-label for="ticketNumber" value="{{ __('Ticket Number') }}" />
            <input class="custom-input mt-1 block w-full" id="ticketNumber" type="text" name="ticketNumber" placeholder="{{ __('Ticket Number') }}" required>
            <x-jet-input-error for="ticketNumber" class="mt-2" />
            <p id="ticketPrompt">Valid</p>
        </div><!--endofcol-->

        <div class="input-section col-lg-12">
            <x-jet-label for="businessName" value="{{ __('Business Name') }}" />
            <input class="custom-input mt-1 block w-full" id="businessName" type="text" name="businessName" placeholder="{{ __('Business Name') }}" required>
            <x-jet-input-error for="businessName" class="mt-2" />
        </div><!--endofcol-->

        <div class="input-section col-lg-12">
            <x-jet-label for="planType" value="{{ __('Plan Type') }}" />
            <Select class="custom-select mt-1 block w-full" id="planType" name="planType" placeholder="{{ __('Choose Right Plan Type') }}" required>
                <option class="custom-option" selected disabled value="">Choose Right Plan Type</option>
                @foreach($ticketTypes as $ticketType)
                    <option value="{{ $ticketType->id }}">{{ $ticketType->ticket_type }}</option>
                @endforeach
            </Select>
            <x-jet-input-error for="planType" class="mt-2" />
        </div><!--endofcol-->

        <div id="HCcheckbox" class="input-section col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="highContent" name="highContent" value="1">
                <x-jet-label for="highContent" value="{{ __('High Content') }}" />
            </div>
        </div><!--endofcol--> 

        <div class="input-section col-lg-12">
            <x-jet-label for="siteUrl" value="{{ __('Site Url') }}" />
            <input class="custom-input mt-1 block w-full" id="siteUrl" type="text" name="siteUrl" placeholder="{{ __('Site Url') }}" required>
            <x-jet-input-error for="siteUrl" class="mt-2" />
        </div><!--endofcol-->

        <div class="input-section col-lg-12">
            <x-jet-label for="explanationTxt" value="{{ __('Tickets Remarks') }}" />
            <textarea class="custom-input mt-1 block w-full" id="explanationTxt" name="ticketRemarks"></textarea>
            <x-jet-input-error for="explanationTxt" class="mt-2" />
        </div><!--endofcol-->

        <div class="input-section col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <x-jet-button id="ticketButton" disabled>
                        {{ __('Create') }}
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
    @endauth

    @guest
    <div class="guest-aside-content">
        <img class="aside-content-img" src="{{ asset('/storage/images/content-images/search-undraw.png') }}" alt="{{__('search content image')}}">
    </div>
    @endguest

    <script>
        // create-ticket-form ticket number format checking
        let ticketField = document.getElementById('ticketNumber');
        let ticketPrompt = document.getElementById('ticketPrompt');
        let ticketButton = document.getElementById('ticketButton');
        ticketField.addEventListener("keyup", function(){
            // let ticketFormat = /(affinityx|AFFINITYX+)*['-][0-9]{6,60}/umgs;
            if(ticketField.value.match(/(?=\S*['-])(affinityx-|AFFINITYX-)[0-9]{5,50}/umgs)){
                ticketPrompt.innerHTML = '<i class="fas fa-check-circle"></i> Valid Format';
                ticketPrompt.style.color = '#016b01';
                ticketPrompt.style.backgroundColor = '#abffab75';
                ticketPrompt.style.display = 'block';
                ticketButton.disabled = false;
            }else{
                // ticketField.value = '';
                ticketPrompt.innerHTML = '<i class="fas fa-times-circle"></i> Invalid Format. Check the spelling.';
                ticketPrompt.style.color = '#770a0a';
                ticketPrompt.style.backgroundColor = '#fce1e1';
                ticketPrompt.style.display = 'block';
                ticketButton.disabled = true;
            }
        });
    </script>
</div><!--endofaside--> 