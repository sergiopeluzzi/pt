<?php

namespace PopTroco\Http\Controllers;

use Illuminate\Http\Request;

use PopTroco\Http\Requests;
use PopTroco\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }
}
