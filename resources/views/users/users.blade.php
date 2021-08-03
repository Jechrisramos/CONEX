<x-app-layout>
    @section('page-title')
            Users 
    @endsection

    @section('content')
    <div class="row">
        <div class="content col-lg-12">
            @if(Auth::check() && Auth::user()->role_id == 1) {{-- Only Admin can view this admins list --}}
                @include('users.users-list.admins-list')
            @endif
            @include('users.users-list.managers-list')
            @include('users.users-list.trainers-list')
            @include('users.users-list.teamLeads-list')
            @include('users.users-list.developers-list')
        </div><!--endofcol-->
    </div><!--endofrow-->
    @endsection   
</x-app-layout>