<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserDao implements UserDaoInterface
{
    /**
     * Get Operator List
     * @param request $request
     * @return $operatorList
     */
    public function getUserList($request)
    {
        $query = User::OrderBy('created_at');

        $name = $request->input('name');
        $email = $request->input('email');
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();

        if ($request->has('name') && $name != '') {
            $query->where('name', 'like', '%'.$name.'%')->get();
        }
        if ($request->has('email') && $email != '') {
            $query->where('email', 'like', '%'.$email.'%')->get();
        }
        if ($request->has('start_date') || $request->has('end_date'))  {
            $query->whereBetween('created_at',[$start_date,$end_date])->get();
        }
        return $query->paginate(8);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param request $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser($request)
    {
        $user = new User($request->all());
        $user->created_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
        $user->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param request $request
     * @param user $user
     * @return \Illuminate\Http\Response
     */
    public function updateUser($request, $user)
    {
        if($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = $image->getClientOriginalName();
            $image->move('images/', $imageName);
            $user->profile = $request->file('profile')->getClientOriginalName();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param user $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($user)
    {
        $user->delete();
    }

}
