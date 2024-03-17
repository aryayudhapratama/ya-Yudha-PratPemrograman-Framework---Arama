<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index() {
        return "Hello vlog welcome to my guys. This is from Controller";
    }

    // Named route
    public function profile($profileId) {
        return "This is Profile from Controller, profile id: ".$profileId;
    }
}
