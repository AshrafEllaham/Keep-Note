<?php

namespace App\Controllers;

use App\Models\Users;

class SignupController
{
    protected array $data = [];

    public function index($params = [])
    {
        return view('signup', $this->data);
    }

    public function signup($params = [])
    {
        // Check all fileds present
        if(!empty($params['fname']) && !empty($params['lname'])&& !empty($params['email']) && !empty($params['password'])){

            // Validate email format
            if (valid_email($params['email'])){
                $user = new Users();
                if(!$user->where([['email' , '=', $params['email']]], user_id: false)){

                    // Create user_id and session
                    $user_id = rand(time(), 100000000);
                    $_SESSION["user_id"] = $user_id;

                    // Create user with hashed password
                    $user->create([
                        'fname' => $params['fname'],
                        'lname' => $params['lname'],
                        'email' => $params['email'],
                        'password' => password_hash($params['password'], PASSWORD_BCRYPT)
                    ]);

                    // Set success message
                    set_Message('signup_message', 'Signup successfully');
                    header("location:http://localhost:9000/");

                }else{
                    // Set error message
                    set_Message('signup_errors', 'Email already exist');
                    back(); 
                }
            }else{
                // Set error message
                set_Message('signup_errors', 'Invalid email format');
                back();
            }
        }else{
            // Set error message
            set_Message('signup_errors', 'All fileds are required');
            back();
        }
    }
}
