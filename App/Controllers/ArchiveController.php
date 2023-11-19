<?php

namespace App\Controllers;

use App\Models\Notes;
class ArchiveController
{
    protected array $data = [];

    // List archive items
    public function index($params = [])
    {
        $notes = new Notes();
        $this->data['archive_items'] = $notes->where([['archive', '=', 1], ['trash', '=', 0]]);
        return view('archive', $this->data);
    }

    // Unarchive note
    public function unarchive($params = [])
    {
        $notes = new Notes();
        $notes->update(['id',$params['id']], ['archive' => 0]);
        return back();
    }

    // Move note to trash
    public function trash($params = [])
    {
        $notes = new Notes();
        $notes->update(['id',$params['id']], ['trash' => 1]);
        return back();
    }
}