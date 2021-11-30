<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * This is User controller.
 */
class UserController extends Controller
{
    /**
     * User interface,User interface
     */
    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userInterface = $userServiceInterface;

    }
    

    /**
     * To show User list
     *
     * @return View User list
     */
    public function getUser()
    {
        if(Auth::user()){
            $UserList = $this->userInterface->getUser();
            return view('user')->with(['User'=>$UserList]);
        } else{
            return redirect()->route('login');
        }   
    }

    /**
     * To add User
     * @param UserRequest $request
     * @return View User list
     */
    public function addUser(Request $request) {

        $User = $this->userInterface->addUser($request);
        return redirect()->route('userlist');
    }

    /**
     * To update User
     * @param UserRequest $request
     * @return View User 
     */
    public function update($id) {
        $User = $this->userInterface->getUserById($id);
        return view('userUpdate')->with(['User'=>$User]);
    }

    /**
     * To update User
     * @param UserRequest $request
     * @return View User list
     */
    public function updateUser(Request $request,$id) {
        $User = $this->userInterface->updateUser($request,$id);
        return redirect()->route('userlist');
    }

    /**
     * To delete User
     * @param sting $id
     * @return View User list
     */
    public function deleteUser($id) {
        $this->userInterface->deleteUser($id);
        return redirect()->route('userlist');
    }

}