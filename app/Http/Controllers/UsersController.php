<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use Carbon\Carbon;
use Session;

class UsersController extends Controller
{
    // function __constuct(){
    //     $this->middleware('')->except('');
    // }

    // function __constuct(){
    //     $this->middleware('isAdmin');
    // }

    // This will reset a user's password - Only an admin can perform this function.
    public function resetPassword(User $user)
    {
        $user->forceFill([
           'password' => Hash::make('H@ppytoserve123'),
        ])->save();

       return redirect()->back();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $admins_count = User::where('role_id', '=', 1)->get();
        $admins = User::where('role_id', '=', 1)
                    ->orderBy('employeeId', 'desc')
                    ->paginate(20);

        $managers_count = User::where('role_id', '=', 2)->get();
        $managers = User::where('role_id', '=', 2)
                    ->orderBy('employeeId', 'desc')
                    ->paginate(20);

        $trainers_count = User::where('role_id', '=', 3)->get();
        $trainers = User::where('role_id', '=', 3)
                    ->orderBy('employeeId', 'desc')
                    ->paginate(20);

        $teamLeads_count = User::where('role_id', '=', 4)->get();
        $teamLeads = User::where('role_id', '=', 4)
                    ->orderBy('employeeId', 'desc')
                    ->paginate(20);
        
        $members_count = User::where('role_id', '=', 5)->get();
        $members = User::where('role_id', '=', 5)
                    ->orderBy('employeeId', 'desc')
                    ->paginate(20);
        // dd($users);

        return view('users.users', 
            [
                'admins_count' => $admins_count,
                'admins' => $admins,

                'managers_count' => $managers_count,
                'managers' => $managers,

                'trainers_count' => $trainers_count,
                'trainers' => $trainers,

                'teamLeads_count' => $teamLeads_count,
                'teamLeads' => $teamLeads,

                'members_count' => $members_count,
                'members' => $members
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employeeId)
    {
        $user = User::where('employeeId', '=', $employeeId)->first();
        // dd($user->id);

        $members = User::where('supervisor', '=', $user->id)->get();

        // dd($team);

        return view('profile.show', [
            'user' => $user,
            'members'=> $members,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
