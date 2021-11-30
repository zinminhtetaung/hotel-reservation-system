<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        return User::orderBy('created_at', 'asc')->get();
    }
    
    /**
     * To get User by id
     * @param string $id User id
     * @return User
     */
    public function getUserById($id) {
        return User::FindorFail($id);
    }

    /**
     * To save User
     * @param object $request Validated values from request
     * @return Object created User object
     */
    public function addUser($request) {   
        return DB::transaction(function () use ($request){ 
            $user = new User();
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();    
        });
    }

     /**
     * To update User
     * @param string $id User id
     * @return 
     */
    public function updateUser($request,$id) {
        return DB::transaction(function () use ($request, $id){ 
            $user = User::FindorFail($id);        
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();    
        });
    }

    /**
     * To delete User
     * @param string $id User id
     * @return 
     */
    public function deleteUser($id) {
        return DB::transaction(function () use ($id){
            $user = User::find($id);
            if ($user) {
            $user->delete();
            return 'Deleted Successfully!';
            }
            return 'User Not Found!';
        });
    }    
}