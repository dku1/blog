<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Comment $comment): RedirectResponse
    {
        $comment->update(['message' => $request->message]);
        return redirect()->route('personal.comment.index');
    }
}
