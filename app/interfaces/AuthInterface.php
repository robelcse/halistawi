<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AuthInterface
{
    /**
     * check if authenticated or not
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean[true if authenticated, false if not authenticated]
     * 
     */
    public function checkIfAuthenticated(Request $request);

    /**
     * register user by request from data
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return Object of user
     */
    public function register(Request $request);

    /**
     * find user by email address
     *
     * @param string $email
     * 
     * @return Object of user
     */
    public function findUserByEmail($email);

}//end class
