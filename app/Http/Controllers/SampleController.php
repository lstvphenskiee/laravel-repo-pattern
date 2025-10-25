<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;

class PostController extends Controller
{
    protected $posts;

    public function __construct(Repository $posts) {
        $this->posts = $posts;
    }

    public function index() {
        // return Post::all();              // old controller
        return $this->posts->getAll();      //function name from Repository
    }

    public function show($id) {
        // return Post::find($id);          //old
        return $this->posts->findId($id);   //function name from Repository
    }

    public function store(Request $request) {
        $post = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // return Post::create($post);
        return $this->posts->create($post); //from Repo
    }

    function update(Request $request, $id) {
        $post = Post::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        // $post->update($data);
        $this->posts->update($data);        // from repo

        return $post;
    }

    public function destroy($id) {
        $this->posts->delete($id);
        return response()->noContent();
    }


}
