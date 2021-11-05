<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class CommentService {
    public $commentRepository;
    public $postRepository;
    public function __construct(CommentRepository $commentRepository, PostRepository $postRepository) {
        $this->commentRepository = $commentRepository;
        $this->postRepository = $postRepository;
    }

    public function index () {
        return $this->commentRepository->index();
    }

    public function getCommentsByPostId($postId) {
        if($this->postRepository->getPostById($postId)) {
            return $this->commentRepository->getCommentsByPostId($postId);
        }
        return [
            'message' => 'No post is not found',
            'status' => 404
        ];
    }

    public function store(Request $request) {
        $data = $request->all();
        if($this->commentRepository->store($data)) {
            return [
                'message' => 'Add successfully'
            ];
        }
        return [
            'message' => 'Some error'
        ];
    }

    public function edit(Request $request, $id) {
        $content = $request->content;
        $id = $request->id;
        if (!$this->commentRepository->getCommentById($id)) {
            return [
                'message' => 'Comment is not found',
                'status' => 404
            ];
        }
        if ($this->commentRepository->edit($id, $content)) {
            return [
                'message' => 'Edit successfully'
            ];
        }
        return [
            'message'=> 'Edit not successfully'
        ];
    }

    public function delete($id) {
        if ($this->commentRepository->delete($id)) {
            return [
                'message' => 'Delete Successfull'
            ];
        }
        return [
            'message' => 'Delete fail'
        ];
    }
}
?>