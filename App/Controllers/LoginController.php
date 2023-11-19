<?php

namespace App\Controllers;

use App\Models\Users;

class LoginController
{
    protected array $data = [];

    public function index($params = [])
    {
        return view('login', $this->data);
    }

    public function login($params = [])
    {
        // Check for empty inputs
        if (!empty($params['email']) && !empty($params['password'])) {

            // Validate email format
            if (valid_email($params['email'])) {
                $user = new Users();

                // Retrieve user row from database
                $user_row = $user->where(filter: [['email', '=', $params['email']]], user_id: false);

                // Check if user exists
                if ($user_row) {

                    if (password_verify($params['password'], $user_row[0]['password'])) {

                        // Start session & set user id
                        $_SESSION['user_id'] = $user_row[0]['user_id'];
                        set_Message('login_message', 'Login successfully');

                        // Redirect to homepage
                        header("location:http://localhost:9000/");
                    } else {
                        // Invalid password
                        set_Message('login_errors', 'Wrong password');
                        back();
                    }
                } else {
                    // Email not registered
                    set_Message('login_errors', 'your email not exist');
                    back();
                }
            } else {
                // Invalid email format
                set_Message('login_errors', 'Invalid email format');
                back();
            }
        } else {
            // Missing input(s)
            set_Message('login_errors', 'All fileds are required');
            back();
        }
    }

    public function logout($params = [])
    {
        // Unset & destroy session
        session_unset();
        session_destroy();

        // Redirect to login page
        header("location:http://localhost:9000/login");
    }
}
