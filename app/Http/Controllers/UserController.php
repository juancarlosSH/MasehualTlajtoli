<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit($name)
    {
        return view('edit', compact('name'));
    }

    public function update()
    {

    }
}
