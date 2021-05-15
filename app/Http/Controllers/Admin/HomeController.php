<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['users_count'] = User::count();
        $data['role_count'] = Role::count();
        return Inertia::render('Dashboard', $data);
    }
}
