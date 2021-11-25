<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

/**
 * This is User controller.
 */
class UserController extends Controller
{
    /**
     * User interface,User interface
     */
    private $UserInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $UserServiceInterface)
    {
        $this->UserInterface = $UserServiceInterface;

    }
    

    /**
     * To show User list
     *
     * @return View User list
     */
    public function getUser()
    {
        
        if(Auth::user()){
            $UserList = $this->UserInterface->getUser();

            return view('user', [
                'User' => $UserList
            ]);
        }
        else{
            return redirect()->route('login');
        }
        
    }

    /**
     * To add User
     * @param UserRequest $request
     * @return View User list
     */
    public function addUser(Request $request) {

        $User = $this->UserInterface->addUser($request);
        return redirect('/users');
    }

        /**
     * To update User
     * @param UserRequest $request
     * @return View User 
     */
    public function update($id) {
        $User = $this->UserInterface->getUserById($id);
        return view('userUpdate',[
            'User'=> $User
        ]);
        //return redirect('/');
    }

    /**
     * To update User
     * @param UserRequest $request
     * @return View User list
     */
    public function updateUser(Request $request,$id) {
        // $validated = $request->validated();
        $User = $this->UserInterface->updateUser($request,$id);
        return redirect('/users');
    }

    /**
     * To delete User
     * @param sting $id
     * @return View User list
     */
    public function deleteUser($id) {
        $this->UserInterface->deleteUser($id);
        return redirect('/users');
    }

}