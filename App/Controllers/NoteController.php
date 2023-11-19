<?php

namespace App\Controllers;

use App\Models\Notes;

class NoteController
{
    protected array $data = [];

    // Get all notes
    public function index($params = [])
    {
        $notes = new Notes();
        $this->data['read_note_item'] = $notes->where([['id', '=', $params['id']]]);
        return view('view_note', $this->data);
    }

    // Update a note
    public function update($params = [])
    {
        if ($params['title']){
            $notes = new Notes();
            $notes->update(['id',$params['id']], ['title' => $params['title'], 'content' => $params['contnet']]);
            return back();
        }else{
            set_Message('update_errors', 'Title is required');
            back();
        }
    }

    // Move note to trash
    public function trash($params = [])
    {
        $notes = new Notes();
        $notes->update(['id',$params['id']], ['trash' => 1]);
        return back();
    }

    // Archive a note
    public function archive($params = [])
    {
        $notes = new Notes();
        $notes->update(['id', $params['id']], ['archive' => 1]);
        return back();
    }

    // Add a new note
    public function add($params = [])
    {
        if ($params['title']){
            $notes = new Notes();
            $notes->create(['title' => $params['title'], 'content' => $params['contnet']]);
            return back();
        }else{
            set_Message('add_errors', 'Title is required');
            back();
        }
    }
}