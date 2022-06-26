<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $likesCount = auth()->user()->likedPosts->count();
        $commentsCount =  auth()->user()->comments->count();
        return view('personal.main.index', compact('likesCount', 'commentsCount'));
    }
}
