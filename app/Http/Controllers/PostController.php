<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    protected $postRepo;

    public function __construct(PostService $postRepo) {
        $this->postRepo = $postRepo;
    }

    public function index() {
        $post =  $this->postRepo->getAllPost();

        // return response()->json($post, 200);
        return PostResource::collection($post);
    }

    public function show($id) {
        $post = $this->postRepo->getPostById($id);

        if(!$post) {
            return response()->json([
                'message' => "Post not found"
            ], 404);
        }

        // return response()->json($post, 200);
        return new PostResource($post);
    }

    public function store(PostRequest $req) {
        $data = $req->validated();

        $post = $this->postRepo->createPosts($data);

        return response()->json([
            'message' => "Post created",
            'data' => new PostResource($post),
        ], 200);
    }

    public function update(PostRequest $req, $id) {
        $data = $req->validated();

        $updated = $this->postRepo->updatePosts($id, $data);

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
        $del = $this->postRepo->deletePosts($id);

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
