<?php

namespace App\Controllers;

use App\Models\Notes;
use App\Models\Users;

class HomeController
{
    protected array $data = [];

    public function index($params = [])
    {   
        // Retrieve notes without trash and archive
        $notes = new Notes();
        $this->data['notes_items'] = $notes->where([
            ['trash', '=', 0], 
            ['archive', '=', 0]
        ]);
        return view('home', $this->data);
    }

    public function search($params = [])
    {
        if($params['search_title']){

            // Search notes with the title
            $notes = new Notes();
            $this->data['notes_items'] = $notes->where([
                ['trash', '=', 0], 
                ['archive', '=', 0], 
                ['title', '=', $params['search_title']], 
            ]);
            return view('home', $this->data);
        }else{
            
            // Display error message if search title is empty
            set_Message('search_errors', 'Type your serach key');
            back();
        }
    }
}