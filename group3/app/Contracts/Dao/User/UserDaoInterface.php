<?php

namespace App\Contracts\Dao\User;

/**
 * Interface for Data Accessing Object of Post
 */
interface UserDaoInterface
{
    /**
     * To get User list
     * @return Users
     */
    public function getUser();

    /**
     * To get User by id
     * @param string $id User id
     * @return User
     */
    public function getUserById($id);

    /**
     * To save User
     * @param object $request Validated values from request
     * @return Object created User object
     */
    public function addUser($request);
    
    /**
     * To update User
     * @param object $request Validated values from request
     * @return Object created User object
     */
    public function updateUser($request,$id);

    /**
     * To delete User
     * @param string $id User id
     * @return 
     */
    public function deleteUser($id);

}