<x-app-layout>
    @section('page-title')
            Profile Settings
    @endsection

    @section('content') 
    <div class="row">
        <div>
            <div class="content">
                <h2 class="page-title">
                    {{ __('Profile Setting') }}
                </h2>
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form') 

                        <x-jet-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>

                        <x-jet-section-border />
                    @endif
                    <div class="row">
                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                            <div class="col-lg-4">
                                @livewire('profile.two-factor-authentication-form')
                            </div>

                        @endif

                        <div class="col-lg-4">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>

                        <div class="col-lg-4">
                            @livewire('profile.delete-user-form')
                        </div>
                    </div><!--endofrow-->
                
                   
            </div>
        </div>
    </div><!--endofrow-->
    @endsection   
</x-app-layout>
