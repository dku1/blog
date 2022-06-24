<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['preview_image'] = substr($request->file('preview_image')->store('/public/images/post/previews'), 7);
        $data['main_image'] = substr($request->file('main_image')->store('/public/images/post/main'), 7);

        if (isset($data['tag_ids'])){
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }

        $post = Post::create($data);

        if (isset($tagIds)){
            $post->tags()->attach($tagIds);
        }

        return redirect()->route('admin.posts.index');
    }
}
