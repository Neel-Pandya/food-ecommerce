<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as Database;

class UserController extends Controller
{
    //
    public function create()
    {
        $itemData = Database::table('items')
            ->where('item_status', 'Active')
            ->get();
        $countUsers = Database::table('users')
            ->where('status', 'Active')
            ->count('id');
        $countItems = Database::table('items')
            ->where('item_status', 'Active')
            ->count('id');

        return view('welcome', compact('itemData', 'countUsers', 'countItems'));
    }
}