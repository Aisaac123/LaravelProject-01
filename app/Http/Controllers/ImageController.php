<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'description' => ['required'],
            'image_path' => ['required', 'image'],
        ]);

        $image = $request->file('image_path');
        $desc = $request->input('description');
        $title = $request->input('title');
        $imageModel = new Image();
        $imageModel->user_id = Auth::id();
        $imageModel->description = $desc;
        $imageModel->title = $title;
        $image_path = time() . $image->getClientOriginalName();
        $image->storeAs('images', $image_path);
        $imageModel->path = $image_path;
        $imageModel->save();
        return redirect()->route('home')->with('status', 'Image Upload Successfully!!');
    }

    public function show(string $filename)
    {
        return new Response(Storage::disk('images')->get($filename), 201);
    }

    public function details($id)
    {
        $image = Image::find($id);
        return view('image.detail', ['image' => $image]);
    }

    public function favorites()
    {
        $favoritesImages = Auth::user()->likes->sortByDesc('created_at')->map(function ($like) {
            return $like->image;
        });

        $perPage = 3;
        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        $favoritesImages = new LengthAwarePaginator(
            $favoritesImages->forPage($page, $perPage),
            $favoritesImages->count(),
            $perPage,
            $page,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return view('home', ['images' => $favoritesImages])->with('status', 'Favorites Images!!');
    }

    public function delete($id)
    {
        $image = Image::find($id);
        if ($image->user_id === Auth::id()) {
            $image->delete();
            return redirect()->back()->with(['success' => 'Your post has been deleted successfully!']);
        }
        return redirect()->back()->with(['success' => 'Cannot delete this message!']);
    }
}
