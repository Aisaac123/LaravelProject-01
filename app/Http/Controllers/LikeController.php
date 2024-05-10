<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id){
        $user = Auth::user();
        $hasLike = $user?->likes->where('image_id', $image_id)->first();
        if ($hasLike) {
            return redirect()->back();
        }

        $like = new Like();
        $like->user_id = $user?->id;
        $like->image_id = $image_id;

        $like->save();
        return redirect()->back();
    }
    public function unlike($image_id){
        $user = Auth::user();
        $hasLike = $user?->likes->where('image_id', $image_id)->first();
        if (!$hasLike) {
            return redirect()->back();
        }
        $like = $user?->likes->where('image_id', $image_id)->first();
        $like->delete();
        return redirect()->back();
    }
}
