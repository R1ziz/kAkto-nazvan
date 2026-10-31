<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUser(Request $request)
    {
    return view('user');
    }


}
