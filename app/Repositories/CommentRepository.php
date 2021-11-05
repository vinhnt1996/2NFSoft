<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository {
    public $comment;

    public function __construct(Comment $comment) {
        $this->comment = $comment;
    }

    public function getCommentsByPostId($postId) {
        return $this->comment->where('postId', $postId)->get();
    }

    public function store($data) {
        return $this->comment->insert($data);
    }

    public function getCommentById($id) {
        return $this->comment->find($id);
    }

    public function edit($id, $content) {
        return $this->comment->find($id)->update(['content'=> $content]);
    }

    public function index() {
        return $this->comment->with(['post'])->get();
    }

    public function delete($id) {
        return $this->comment->find($id)->delete($id);
    }
}
?>