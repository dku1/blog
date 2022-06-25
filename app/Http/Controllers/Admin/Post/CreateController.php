<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CreateController extends BaseController
{
    public function __invoke(): Factory|View|Application
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.form', compact('categories', 'tags'));
    }
}
