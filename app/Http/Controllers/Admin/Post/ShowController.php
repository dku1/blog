<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowController extends BaseController
{
    public function __invoke(Post $post): Factory|View|Application
    {
       return view('admin.post.show', compact('post'));
    }
}
