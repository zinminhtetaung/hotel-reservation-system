<?php

namespace App\Services\User;


use App\Contracts\Dao\User\UserDaoInterface;

use App\Contracts\Services\User\UserServiceInterface;

/**
 * Service class for User.
 */
class UserService implements UserServiceInterface
{
    /**
     * post dao
     */
    private $UserDao;
    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->UserDao = $userDao;
    }

    /**
     * To get User list
     * @return UserList
     */
    public function getUser() {
        return $this->UserDao->getUser();
    }
    
    /**
     * To get User by id
     * @param string $id User id
     * @return User
     */
    public function getUserById($id) {
        return $this->UserDao->getUserById($id);
    }
    
    /**
     * To save User
     * @param object $request request value to validate
     * @return Object created User object
     */
    public function addUser($request) {
        return $this->UserDao->addUser($request);
    }
    
       /**
     * To update User
     * @param object $request request value to validate
     * @return Object created User object
     */
    public function updateUser($request,$id) {
        return $this->UserDao->updateUser($request,$id);
    }

    /**
     * To delete User
     * @param string $id User id
     * @return 
     */
    public function deleteUser($id) {
        $this->UserDao->deleteUser($id);
    }
    
}