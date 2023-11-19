<?php

use App\Models\Users;
use KeepNote\view\View;
use KeepNote\Application;
use KeepNote\http\Response;

if (!function_exists("app")) {
    /**
     * Get the application instance.
     */
    function app()
    {
        static $instance = null;

        if (!$instance) {
            $instance = new Application();
        }

        return $instance;
    }
}

if (!function_exists('base_path')) {
    /**
     * Get the path to the base directory.
     *
     * @return string
     */
    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('view_path')) {
    /**
     * Get the path to the views directory.
     *
     * @param  string|null  $path
     * @return string
     */
    function view_path()
    {
        return base_path() . 'views/';
    }
}

if (!function_exists('view')) {
    /**
     * Create a new View instance.
     *
     * @param  string  $view
     */
    function view($view, $params = [])
    {
        echo View::make($view, $params);
    }
}

if (!function_exists('class_basename')) {
    /**
     * Returns class basename without namespace.
     *
     * @param object|string $object
     * 
     * @return mixed
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     * @param mixed $name
     * @return mixed
     */
    function env($key, $default = null)
    {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        return $default;
    }
}

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param mixed $value
     * @return string|Closure
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('back')) {
    /**
     * Get back to previous page or redirect to a specific url.
     *
     * @param string $url
     */
    function back()
    {
        return (new Response())->back();
    }
}

if(!function_exists('is_login')){
    /**
     * Check user login status.
     */
    function is_login(){
        
        session_start();
        if(isset($_SESSION['user_id'])){
            header("location:http://localhost:9000/");
        }
    }
}

if(!function_exists('print_errors')){
    /**
     * Print error messages from validation.
     *
     * @param array $errors
     */
    function print_errors($key){
        
        if(isset($_SESSION[$key])){

            if(is_array($_SESSION[$key])){
                echo '<div class="alert alert-danger mt-2 mb-0">';
                foreach ($_SESSION[$key] as $error) {
                    echo "<p style = 'margin-bottom: 0px;'>".$error."</p>";
                }
                echo '</div>';
            }else{
                echo "<div class='alert alert-danger mt-2 mb-0'>".$_SESSION[$key]."</div>";
            }

            remove_Message($key); // free errors messages
        }
    }
}

if(!function_exists('set_Message')){
    /**
     * Set message to the session.
     *
     * @param string|array $message
     */
    function set_Message($key, $message){
        
        $_SESSION[$key] = $message;
    }
}

if(!function_exists('get_Message')){
    /**
     * Get message from the session.
     *
     * @param string $key
     * @return bool
     */
    function get_Message($key){
        
        return $_SESSION[$key];
    }
}

if(!function_exists('remove_Message')){
    /**
     * Remove a specific key from the session.
     *
     * @param string $key
     */
    function remove_Message($key){
        
         unset($_SESSION[$key]);
    }
}

if(!function_exists('messages_exits')){
    /**
     * Check if there is any error or success message in the session.
     * @param string $key
     * @return bool
     */
    function messages_exits($key){
        
        return isset($_SESSION[$key]);
    }
}

if(!function_exists('valid_email')){
    /**
     * Validate email address using regular expression.
     *
     * @param  string $email
     * @return bool
     */
    function valid_email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

if(!function_exists('popupMessage')){
    /**
     * Generate popup alert for user to see the message.
     *
     * @param string type
     * @param string $message
     */
    function popupMessage($type, $message)
    {
        echo '<div class="modal fade" id="message" tabindex="-1" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo "<div class='modal-body mb-0 alert alert-$type'>";
        echo $message;
        echo '</div></div></div></div>';
    }
}

if(!function_exists('getUserData')){
    /**
     * Get User Data from database by ID.
     *
     * @return array
     */
    function getUserData()
    {
        $user = new Users;
        return $user->where(filter: null, user_id:true)[0];
    }
}