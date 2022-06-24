<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = substr($request->file('preview_image')->store('/public/images/post/previews'), 7);
        }

        if ($request->hasFile('main_image')) {
            $data['main_image'] = substr($request->file('main_image')->store('/public/images/post/main'), 7);
        }

        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }

        $post->update($data);

        if (isset($tagIds)) {
            $post->tags()->sync($tagIds);
        }

        return redirect()->route('admin.posts.show', $post);
    }
}
