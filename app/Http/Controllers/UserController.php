<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Str;
use Illuminate\Support\Number;

use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function userList()
    {   
        $users = User::get();

        return view('user.index', compact('users'));
    }

}