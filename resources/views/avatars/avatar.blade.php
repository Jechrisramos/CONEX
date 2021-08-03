<x-app-layout>
    @section('page-title') 
        AVATARS
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Avatar Gallery') }}
        </h2>
    </x-slot>

    @section('content')
        @foreach($errors->all() as $error)
                <div class="error-box">
                        <p><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                </div>
        @endforeach

        
            
                    <!-- <img src="{{-- Auth::user()->avatar->avatar--}}" alt="{{-- Auth::user()->name --}}"> -->
                    <!-- <div>
                        <form method="post" action="/avatars" enctype="multipart/form-data">
                            @csrf
                            <label for="img_name">Image Name</label>
                            <input id="img_name" type="text" name="img_name" required>

                            <label for="image">Image</label>
                            <input id="image" type='file' name="image" required>

                            <button>Add</button>
                        </form>
                    </div> -->

                    <div class="content row">
                        @forelse($avatars as $avatar) 
                            <div class="col-lg-3">
                                <div class="custom-card">
                                    <p class="avatar-label">{{ $avatar->img_name }}</p>
                                    <img class="avatar_img" src="{{ $avatar->avatar }}" alt="{{ $avatar->img_name }}">
                                </div><!--endofcard-->
                            </div><!--endofcol-->
                        @empty
                            <p>Avatar Collection is still Empty</p>
                        @endforelse
                    </div><!--endofrow-->
                
        
    @endsection
</x-app-layout>
