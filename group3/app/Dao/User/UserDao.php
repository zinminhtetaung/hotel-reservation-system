<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Data accessing object for User
 */
class UserDao implements UserDaoInterface
{
    /**
     * To get User
     * @return Users
     */
    public function getUser() {
        $user = User::orderBy('created_at', 'asc')->get();
        return $user;
    }

    
    /**
     * To get User by id
     * @param string $id User id
     * @return User
     */
    public function getUserById($id) {
        $user = User::FindorFail($id);
        return $user;
    }


    /**
     * To save User
     * @param object $request Validated values from request
     * @return Object created User object
     */
    public function addUser($request) {    
        $user = new User();
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->password = $request->password;
        $user->role = $request->role;
        $user->save();    
        return $user;
    }
     /**
     * To update User
     * @param string $id User id
     * @return 
     */
    public function updateUser($request,$id) {
        $user = User::FindorFail($id);
        

        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();    
        return $user;
    }
    /**
     * To delete User
     * @param string $id User id
     * @return 
     */
    public function deleteUser($id) {
        User::findOrFail($id)->delete();
    }
    
    
}