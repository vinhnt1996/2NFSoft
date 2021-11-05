<?php

namespace App\Repositories;

use App\Models\Post;
class PostRepository {

    public $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index() {
        return $this->post->with(['comments', 'user'])->get();
    }

    public function insert($data) {
        return $this->post->insert($data);
    }

    public function update($id, $data) {
        return $this->post->find($id)->update($data);
    }

    public function delete($id) {
        return $this->post->find($id)->delete($id);
    }

    public function getPostById($id) {
        return $this->post->with(['comments', 'user'])->where('id', $id)->get();
    }
}
?>