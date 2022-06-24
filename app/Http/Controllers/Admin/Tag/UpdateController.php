<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());
        return redirect()->route('admin.tags.show', $tag);
    }
}
