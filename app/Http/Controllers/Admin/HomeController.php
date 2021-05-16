<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
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
        $data['categories_count'] = Category::count();
        $data['posts_count'] = Post::count();
        $data['recent_posts'] = Post::latest()->take(5)->get();
        return Inertia::render('Dashboard', $data);
    }
}
