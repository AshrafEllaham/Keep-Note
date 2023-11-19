<?php

namespace App\Controllers;

use App\Models\Users;

class ProfileController
{
    protected array $data = [];

    public function index($params = [])
    {
        $user = new Users;
        $this->data['profile_data'] = $user->where(filter: null, user_id: true)[0];
        return view('profile', $this->data);
    }

    public function save($params = [])
    {
        // Checking for empty fields
        if (!empty($params['fname']) && !empty($params['lname']) && !empty($params['email'])) {

            // Checking for valid email
            if (valid_email($params['email'])) {

                $user = new Users();
                // Checking for unique email
                if (!$user->where([['email', '=', $params['email']], ['user_id', '!=', $params['user_id']]], user_id: false)) {

                    // Checking user want to reset password
                    if ($params['is_reset'] == 'true') {

                        // get user data
                        $user_row = $user->where(filter: null, user_id: true)[0];

                        if (!empty($params['currrent_password']) && !empty($params['new_password']) && !empty($params['confirm_password'])) {
                            
                            // check if the password are matches
                            if (password_verify($params['currrent_password'], $user_row['password'])) {

                                if($params['new_password'] == $params['confirm_password']){
                                    $user->update(['user_id', $params['user_id']], [
                                        'fname' => $params['fname'],
                                        'lname' => $params['lname'],
                                        'email' => $params['email'],
                                        'password' => password_hash($params['new_password'], PASSWORD_BCRYPT)
                                    ]);

                                    set_Message('profile_success', 'updated successfully');
                                    // redirect to profile page
                                    header("location:http://localhost:9000/profile");
                                }else{
                                    set_Message('profile_errors', "New Password does'nt match with Confirmed");
                                    back();
                                }
                            }else{
                                set_Message('profile_errors', 'Wrong Current Password');
                                back();
                            }
                        }else{
                            set_Message('profile_errors', 'All fileds are required');
                            back();
                        }
                    }else{
                        // else if the user want to update name and email only

                        $user->update(['user_id', $params['user_id']], [
                            'fname' => $params['fname'],
                            'lname' => $params['lname'],
                            'email' => $params['email']
                        ]);
                        set_Message('profile_success', 'updated successfully');
                        back();
                    }
                } else {
                    set_Message('profile_errors', 'Email already exist');
                    back();
                }
            } else {
                set_Message('profile_errors', 'Invalid email format');
                back();
            }
        } else {
            set_Message('profile_errors', 'All fileds are required');
            back();
        }
    }

    public function reset($params = [])
    {
        // redirct to profile page to display password input besause it hidden in default page
        $this->data['reset_password'] = true;
        $this->index();
    }
}
