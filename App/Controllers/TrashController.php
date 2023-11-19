<?php

namespace App\Controllers;

use App\Models\Notes;

class TrashController
{
    protected array $data = [];

    public function index($params = [])
    {
        // Retrive trash items
        $notes = new Notes();
        $this->data['trash_items'] = $notes->where([['trash', '=', 1]]);
        return view('trash', $this->data);
    }

    public function delete($params = [])
    {
        // Confirm deletion
        $notes = new Notes();
        echo '<script>alert("Are you sure that you want to delete it!");</script>';
        $notes->delete($params['id']);
        return back();
    }

    public function restore($params = [])
    {
        // Restore the note
        $notes = new Notes();
        $notes->update(['id' ,$params['id']], ['trash' => 0]);
        return back();
    }
}