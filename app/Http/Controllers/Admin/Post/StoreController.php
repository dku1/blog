<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('admin.posts.index');
    }
}
