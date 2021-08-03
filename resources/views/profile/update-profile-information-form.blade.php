<div class="container-fluid">
    <div class="row">
        <x-jet-form-section submit="updateProfileInformation">
                <x-slot name="title">
                    {{ __('Profile Information') }}
                </x-slot>

                <x-slot name="description"> 
                    {{ __('Update your account\'s profile information.') }}
                </x-slot>

                <x-slot name="form">
                    
                    <div class="col-lg-3">
                    <!-- Profile Photo -->
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())                   
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <!-- <input type="file" class="hidden"
                                        wire:model="photo"
                                        x-ref="photo"
                                        x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                        " /> -->

                            <!-- <x-jet-label for="photo" value="{{ __('Profile Picture') }}" /> -->

                            <!-- Current Profile Photo -->
                            <div class="input-section" x-show="! photoPreview">
                                <img src="{{ $this->user->avatar->avatar }}" alt="{{ $this->user->name }}" class="avatar">
                            </div>


                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview">
                                <!-- <span class="block rounded-full w-20 h-20"
                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                </span> -->
                            </div>

                            <!-- <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select A New Photo') }}
                            </x-jet-secondary-button> 

                            @if ($this->user->profile_photo_path)
                                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                    {{ __('Remove Photo') }}
                                </x-jet-secondary-button>
                            @endif-->

                            <x-jet-input-error for="photo" class="mt-2" />
                        </div>
                    @endif
                    </div><!--endofcol-->

                    <div class="col-lg-9">
                             <!-- Employee ID -->
                             <div class="row">
                                
                                <!-- Avatar -->
                                <div class="input-section col-lg-6">
                                    <x-jet-label for="avatar" value="{{ __('Choose your Avatar') }}" />
                                    <select wire:model.defer="state.avatar" id="avatar" class="custom-select mt-1 block w-full">
                                        @inject('avatars', 'App\models\Avatar');
                                        @foreach($avatars->getAvatars() as $avatar)
                                            @if( $this->user->avatar_id == $avatar->id )
                                                <option selected disabled wire:model.defer="state.avatar">{{ ucwords($avatar->img_name) }}</option>
                                            @else
                                                <option value="{{ $avatar->id }}">{{ ucwords($avatar->img_name) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Employeee ID -->
                                <div class="input-section col-lg-6">
                                    <x-jet-label for="employeeId" value="{{ __('Employee ID') }}" />
                                    <x-jet-input id="employeeId" type="text" class="mt-1 block w-full" wire:model.defer="state.employeeId" autocomplete="employeeId" />
                                    <x-jet-input-error for="employeeId" class="mt-2" />
                                </div>                            

                                <!-- Name -->
                                <div class="input-section col-lg-6">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="input-section col-lg-6">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>
                                
                                

                             </div><!--endofrow-->
                    </div><!--endofcol-->
                </x-slot>

                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
        </x-jet-form-section>
    </div><!--endofrow-->   
</div><!--endofcontainer-->
