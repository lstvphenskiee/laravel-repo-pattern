<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $postRepo;

    public function __construct(PostRepositoryInterface $postRepo) {
        $this->postRepo = $postRepo;
    }

    public function index() {
        $post =  $this->postRepo->getPost();

        return response()->json($post, 200);
    }

    public function show($id) {
        $post = $this->postRepo->findPost($id);

        if(!$post) {
            return response()->json([
                'message' => "Post not found"
            ], 404);
        }

        return response()->json($post, 200);
    }

    public function store(PostRequest $req) {
        $data = $req->validated();

        $post = $this->postRepo->createPost($data);

        return response()->json([
            'message' => "Post created",
            'data' => $post
        ], 200);
    }

    public function update(PostRequest $req, $id) {
        $data = $req->validated();

        $updated = $this->postRepo->updatePost($id, $data);

        if(!$updated) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Post updated',
            'data' => $updated,
        ],200);
    }

    public function destroy($id) {
        $del = $this->postRepo->deletePost($id);

        if(!$del) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Post delete',
            'data' => $del
        ], 200);
    }
}
