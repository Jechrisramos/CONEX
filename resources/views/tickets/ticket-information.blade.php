<div class="row">
    <div id="ticket-info-row" class="row col-lg-12">
        
        <div class="row col-lg-10">
            <h2 class="page-title col-lg-12">
                <strong>{{ $ticket }}</strong>
            </h2>

            <div class="ticket-info-card col-lg-12 row">
            @foreach($ticket_details as $ticket_detail)
                <ul class="nav nav-tabs" id="ticketTab" role="tablist">
                    <li class="nav-item">
                        <p id="tab1" class="tab nav-link active">Information</p>
                    </li>
                    <li class="nav-item">
                        <p id="tab2" class="tab nav-link">Remarks</p>
                    </li>
                    <li class="nav-item">
                        <p id="tab3" class="tab nav-link">Graphs</p>
                    </li>
                </ul>

                <div id="ticket-tab-content" class="tab-content">
                    <div class="tab-pane active" id="informationTab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                        <p class="flex ticket-info-item col-lg-6">
                            <strong>Business Name:</strong> 
                            <span>
                                <a href="{{ $ticket_detail->site_url }}" target="_blank">{{ $ticket_detail->business_name }}</a>
                            </span>
                        </p>

                        <p class="flex ticket-info-item col-lg-6">
                            <strong>Site URL:</strong> 
                            <span>
                                <a href="{{ $ticket_detail->site_url }}" target="_blank">{{ $ticket_detail->site_url }}</a>
                            </span>
                        </p>

                        <p class="flex ticket-info-item col-lg-6">
                            <strong>Plan Type:</strong> 
                            <span id="planType">{{ $ticket_detail->ticket_type->ticket_type }}</span>
                            @if($ticket_detail->high_content == 1)
                                <span class="highContentCard">High Content</span>
                            @endif
                        </p>

                        <p class="flex ticket-info-item col-lg-6">
                            <strong>Date Created:</strong>
                            <span>{{ Carbon\Carbon::parse($ticket_detail->created_at)->toDayDateTimeString() }}</span>
                        </p>
                        </div>
                    </div><!--endoftabpane-->

                    <div class="tab-pane" id="remarksTab" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="flex ticket-info-item col-lg-12">
                            <p><?php echo($ticket_detail->ticket_descriptions); ?></p>
                        </div>
                    </div><!--endoftabpane-->

                    <div class="tab-pane" id="graphsTab" role="tabpanel" aria-labelledby="messages-tab">
                            
                            <div class="row">

                                <div class="col-lg-7">
                                    <p>Release Notes</p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{count($releaseNotes)}}%" aria-valuenow="{{count($releaseNotes)}}" aria-valuemin="0" aria-valuemax="10"></div>
                                    </div>
                                    <p>Workarounds</p>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{count($workArounds)}}%" aria-valuenow="{{count($workArounds)}}" aria-valuemin="0" aria-valuemax="10"></div>
                                    </div>
                                </div><!--endofcol-->

                                <div class="col-lg-5">
                                </div><!--endofcol-->

                            </div><!--endofrow-->
                            
                    </div><!--endoftabpane-->

                </div><!--endoftabcontent-->
                    
                    <div class="flex ticket-info-item developer-row col-lg-12">
                    <p class="flex"><strong>Developer(s):</strong>
                        @forelse($developers as $developer)
                            <span class="flex user-tab row">
                                <img class="user-avatar-thumbnail col-lg-4 flex" src="{{ $developer->user->avatar->avatar }}"> 
                                <span class="col-lg-8 flex">{{$developer->user->name}}</span>
                            </span><!--endofrow-->
                        @empty
                            <span class="flex user-tab row">
                                <img class="user-avatar-thumbnail col-lg-4 flex" src="{{ $ticket_detail->user->avatar->avatar }}"> 
                                <span class="col-lg-8 flex">{{$ticket_detail->user->name}}</span>
                            </span><!--endofrow-->
                        @endforelse
                    </p>
                    </div><!--endofdeveloperrow-->
                @endforeach

                    <!-- TICKET EDIT -->
                    <!-- <div class="flex col-lg-7">
                        <x-jet-button>Edit Ticket</x-jet-button>
                    </div> -->

            </div><!--endofticketinfocard-->

        </div><!--endofcol-->
        @auth
        <div class="col-lg-2 menu-dropdown">
            <div class="ticketDropdownContainer">
                <p class="ticketSettings"><i class="fas fa-ellipsis-h"></i></p>
                <div class="ticketDropdownContnent">
                    <a class="ticket-dropdown-menu" href="/tickets/{{$ticket}}/edit">Edit Ticket</a>
                    <a class="ticket-dropdown-menu" href="#">Edit Pages</a>
                    <a class="ticket-dropdown-menu" href="#">Share this Ticket</a>
                </div> <!--endofticketDropdownContnent-->
            </div> <!--endofticketDropdownContainer-->    
        </div><!--endofcol-->
        @endauth

    </div><!--endofrow-->
</div><!--endofrow-->