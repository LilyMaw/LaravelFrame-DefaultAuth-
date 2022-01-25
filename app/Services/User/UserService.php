<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * @param OperatorUserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Get User List
     * @param request $request
     * @return $userList
     */
    public function getUserList($request)
    {
        return $this->userDao->getUserList($request);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param request $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser($request)
    {
        return $this->userDao->storeUser($request);
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
        return $this->userDao->updateUser($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param user $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($user)
    {
        return $this->userDao->deleteUser($user);
    }

    // /**
    //  * Update user's password
    //  * 
    //  * @param  request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function updatePassword($request)
    // {
    //     return $this->userDao->updatePassword($request);
    // }
}
