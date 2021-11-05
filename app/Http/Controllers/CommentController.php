<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    public $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function getCommentsByPostId($postId) {
        return response()->json($this->commentService->getCommentsByPostId($postId));
    }

    public function store(Request $request) {
        return response()->json($this->commentService->store($request));
    }

    public function edit(Request $request, $id) {
        return response()->json($this->commentService->edit($request, $id));
    }

    public function index() {
        return response()->json($this->commentService->index());
    }

    public function delete($id) {
        return response()->json($this->commentService->delete($id));
    }
}
