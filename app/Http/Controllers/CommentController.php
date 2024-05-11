<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image-id' => ['required', 'integer', 'min:1'],
            'comment-text' => ['required', 'string'],
        ]);
        $user_id = Auth::id();
        $image_id = $request->input('image-id');
        $body = $request->input('comment-text');

        $commentModel = new Comment();
        $commentModel->user_id = $user_id;
        $commentModel->image_id = $image_id;
        $commentModel->body = $body;

        $commentModel->save();

        return redirect()->back()->with(['success' => 'Your comment has been post successfully!'
        ]);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        if ($comment->user_id === Auth::id()) {
            $comment->delete();
            return redirect()->back()->with(['success' => 'Your comment has been deleted successfully!']);
        }
        return redirect()->back()->with(['success' => 'Cannot delete this message!']);
    }
}
