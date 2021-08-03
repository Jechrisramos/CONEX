<div class="custom-card row">
    <!-- Profile Photo -->
    <img class="profile_img" src="{{ $user->avatar->avatar }}" alt="{{ $user->name }}">

    <h1 class="userName"><strong>{{ strtoupper($user->name) }}</strong> </h1>
    <h4 class="userRole">{{ ucwords($user->role->role) }}</h4>
</div><!--endofcard-->