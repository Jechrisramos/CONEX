<x-guest-layout>

    @section('page-title')
        Register
    @endsection

    <x-jet-authentication-card>
        <!-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> -->

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="employeeId" value="{{ __('Employee ID') }}" />
                <x-jet-input id="employeeId" class="block mt-1 w-full" type="text" name="employeeId" :value="old('employeeId')" required autofocus autocomplete="employeeId" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4"> 
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('User Role') }}" />
                <Select class="custom-select mt-1 block w-full" id="role" name="role" required>
                    <option class="custom-option" selected disabled value="">Choose Right User Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ ucwords($role->role) }}</option>
                    @endforeach
                </Select>
            </div>

            <div id="managerField" class="mt-4">
            <x-jet-label for="manager" value="{{ __('Manager') }}" />
                <Select class="custom-select mt-1 block w-full" id="manager" name="manager">
                    <option class="custom-option" selected disabled value="">Choose your Manager</option>
                    @foreach($managers as $manager)
                        <option value="{{$manager->id}}">{{$manager->employeeId}} {{$manager->name}}</option>
                    @endforeach
                </Select>
            </div>

            <div id="teamLeaderField" class="mt-4">
            <x-jet-label for="teamLeader" value="{{ __('Team Leader') }}" />
                <Select class="custom-select mt-1 block w-full" id="teamLeader" name="teamLeader">
                    <option class="custom-option" selected disabled value="">Choose your Team Leader</option>
                    @foreach($teamLeads as $teamLead)
                        <option value="{{$teamLead->id}}">{{$teamLead->employeeId}} {{$teamLead->name}}</option>
                    @endforeach
                </Select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>

    <script>
        let roleDropdown = document.getElementById('role');
        let managerDropdown = document.getElementById('managerField');
        let manager = document.getElementById('manager');
        let teamLeaderDropdown = document.getElementById('teamLeaderField');
        let teamLeader = document.getElementById('teamLeader');

        roleDropdown.addEventListener("change", function(){
            switch(roleDropdown.value){
                case '1':
                    managerDropdown.style.display = 'none';
                    manager.removeAttribute("required");
                    teamLeaderDropdown.style.display = 'none';
                    teamLeader.removeAttribute("required");
                    break;
                case '2':
                    managerDropdown.style.display = 'none';
                    manager.removeAttribute("required");
                    teamLeaderDropdown.style.display = 'none';
                    teamLeader.removeAttribute("required");
                    break;
                case '3':
                    managerDropdown.style.display = 'none';
                    manager.removeAttribute("required");
                    teamLeaderDropdown.style.display = 'none';
                    teamLeader.removeAttribute("required");
                    break;
                case '4':
                    managerDropdown.style.display = 'block';
                    manager.setAttribute("required", "");
                    teamLeaderDropdown.style.display = 'none';
                    teamLeader.removeAttribute("required");
                    break;
                case '5':
                    managerDropdown.style.display = 'none';
                    manager.removeAttribute("required");
                    teamLeaderDropdown.style.display = 'block';
                    teamLeader.setAttribute("required", "");
                    break;
            }
        });
    </script>
</x-guest-layout>
