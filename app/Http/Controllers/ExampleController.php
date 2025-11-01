<?php

namespace App\Http\Controllers;

use App\Models\User;
use Arpon\Support\Facades\DB;

class ExampleController extends Controller
{
    public function index()
    {
        // Test DB facade
        $usersFromDb = DB::select('SELECT * FROM users');
        echo '<h1>Users from DB facade:</h1>';
        echo '<pre>';
        print_r($usersFromDb);
        echo '</pre>';

        // Test User model
        $usersFromModel = User::all();
        echo '<h1>Users from User model:</h1>';
        echo '<pre>';
        print_r($usersFromModel);
        echo '</pre>';
    }
}
