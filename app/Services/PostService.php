<?php

namespace App\Services;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class PostService
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = substr($request->file('preview_image')->store('/public/images/post/previews'), 7);
        $data['main_image'] = substr($request->file('main_image')->store('/public/images/post/main'), 7);

        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }

        $post = Post::create($data);

        if (isset($tagIds)) {
            $post->tags()->attach($tagIds);
        }
    }

    public function update(UpdateRequest $request, Post $post): Post
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

        return $post;
    }
}
