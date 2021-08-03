<x-app-layout>
    @section('page-title')
        Dashboard
    @endsection

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    @section('content')
        <div class="content">
            <div class="dashboard-search-row flex row">
                <div class="flex col-lg-9">
                    <nav class="nav">
                        @foreach($ticketTypes as $ticketType)
                            <a class="ticketTypesNav" href="#">{{ $ticketType->ticket_type }}</a>
                        @endforeach
                    </nav>
                </div>
                <div class="dashboard-search-col flex col-lg-3">
                    <form class="searchForm" method="get" action='/search'>
                        <input class="searchTxt" type="text" name="searchQuery" placeholder="Search Ticket..." required>
                        <button class="searchBtn"><i class="fas fa-search"></i></button>
                    </form> 
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.care-list')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Revisions Tickets -->
                    @include('dashboard.revision-list')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.build_woocommerce')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.build_premium')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.build_standard')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.build_starter')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.gcols')
                </div><!--endofcol-->

                <div class="col-lg-6">
                    <!-- table collection for all Website Care Tickets -->
                    @include('dashboard.v6_migration')
                </div><!--endofcol-->
            </div><!--endofrow-->
        </div>
    @endsection

</x-app-layout>
