<x-app-layout>
    @section('page-title')
            {{$user->name}}
    @endsection

    @section('content') 
    <div class="row">
        <div class="content">
            <div class="col-lg-12">
                @include('profile.my-profile.basic-info-row')
            </div>
              
            <div class="col-lg-3">
                @include('profile.my-profile.my-team')
            </div>
        </div>
    </div><!--endofrow-->
    @endsection   
</x-app-layout>
