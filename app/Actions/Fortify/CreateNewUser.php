<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'employeeId' => ['required', 'numeric', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'numeric'],
        ])->validate();

        $user = New User();
        $user->employeeId = $input['employeeId'];
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->role_id = $input['role'];
        if($input['role'] == 4 ){
            $user->supervisor = $input['manager'];
        }elseif($input['role'] == 5){
            $user->supervisor = $input['teamLeader'];
        }else{
            $user->supervisor = null;
        }
        $user->password = Hash::make($input['password']);
        $user->avatar_id = 1;
        $user->employment_status_id = 1;
        $user->save();

        return redirect()->back();
    }
}
