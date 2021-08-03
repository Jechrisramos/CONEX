<x-app-layout>
    @section('page-title')
        Search - {{ $search }}
    @endsection

    @section('content')
        
            <div class="row">
                <div class="content col-lg-9">
                    <div class="custom-card">
                        
                        <div class="custom-card-row row ">

                            <div class="card-col-heading col-lg-9 flex">
                                <h2>
                                    {{ __('Search Result for') }} <em style="color:#5F5FE6;">"{{$search}}"</em>
                                </h2>
                            </div><!--endofcard-col-heading-->

                            <div class="card-col-searchbar col-lg-3 flex">
                                <form class="searchForm" method="get" action='/search'>
                                    <input class="searchTxt" type="text" name="searchQuery" placeholder="Search Ticket..." required>
                                    <button class="searchBtn"><i class="fas fa-search"></i></button>
                                </form> 
                            </div><!--endofcard-col-searchbar-->

                        </div><!--endofcustom-card-row-->
                        

                        {{-- <p class="section-title"><strong>{{ __('CORE DESIGNER') }}</strong></p> --}}
                                    
                        @include('tickets.ticket-list')

                    </div><!--endofcustom-card-->
                </div><!--endofcol-->

                <div class="col-lg-3">
                    @include('tickets.create-ticket-form')
                </div><!--endofcol-->
            </div><!--endofrow-->
        
    @endsection

</x-app-layout>
