<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    //get user list
    public function getUserList($request);

    /**
     * Store a newly created resource in storage.
     *
     * @param request $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser($request);

    /**
     * Update the specified resource in storage.
     *
     * @param request $request
     * @param user $user
     * @return \Illuminate\Http\Response
     */
    public function updateUser($request, $user);

     /**
     * Remove the specified resource from storage.
     *
     * @param user $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($user);

    // /**
    //  * Update user's password
    //  * 
    //  * @param  request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function updatePassword($request);
}
