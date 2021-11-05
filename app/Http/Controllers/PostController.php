<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    //
    public $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index() {
        return response()->json($this->postService->index());
        // $this->postService->index();

        // return response()->json(Post::all());
        // $posts =  Post::all();
        // return response()->json([
        //     'data' => $posts,
        //     'status' => 200
        // ]);
    }

    public function store(Request $request) {
        return $this->postService->create($request);
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        // return response()->json([
        //     'message' => ' Add successfully',
        //     'status' => 200
        // ]);
    }

    public function edit(Request $request, $id) {
        return response()->json($this->postService->edit($request, $id));
        // $post = Post::find($id);
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        // return response()->json([
        //     'message' => 'Update thành công',
        //     'status' => 200
        // ]);
    }

    public function delete($id) {
        return $this->postService->delete($id);
        // $post = Post::find($id);
        // $post->delete();
        // return response()->json([
        //     'message' => 'Delete successfully',
        //     'status' => 200
        // ]);
    }

    public function getPostById($id) {
        return response()->json($this->postService->getPostById($id));
    }
}
