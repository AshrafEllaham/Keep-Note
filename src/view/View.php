<?php

namespace KeepNote\view;

class View
{
    // Make view function
    public static function make($view, $params = [])
    {
        // Check if view is login or signup
        if($view == 'login' || $view == 'signup'){

            // Get base content
            $bascontent = self::getBaseContent('main2');

            // Get view content
            $viewContent = self::getViewContent($view, params: $params);

            // Extract params if any
            if(!empty($params)){
                extract($params);
            }
            
            return str_replace('{{contnet}}', $viewContent, $bascontent);
        }
        
        $bascontent = self::getBaseContent('main');

        $viewContent = self::getViewContent($view, params: $params);

        if(!empty($params)){
            extract($params);
        }
        
        return str_replace('{{contnet}}', $viewContent, $bascontent);
    }

    // Get base content function
    protected static function getBaseContent($file)
    {
        ob_start();

        include view_path() . 'layouts/' . $file . '.php';

        return ob_get_clean();
    }

    // Make error view function
    public static function makeError($error)
    {
        self::getViewContent($error, true);
    }

    // Get view content function
    protected static function getViewContent($view, $is_error = false, $params = [])
    {
        $path = $is_error ? view_path() . 'errors/' : view_path();

        if (str_contains($view ,'.')){
            $views = explode('.', $view);

            foreach ($view as $view) {
                if(is_dir($view)){
                    $path .= $view . '/';
                }
            }
            $view = $path . end($views) . '.php';
        }else{
            $view = $path . $view . '.php';
        }

        extract($params);

        if($is_error){
            include $view;
        }else{
            ob_start();

            include $view;

            return ob_get_clean();
        }
    }
}
