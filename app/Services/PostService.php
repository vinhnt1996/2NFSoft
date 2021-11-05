<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostService {

    public $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function index() {
        return $this->postRepository->index();
    }

    public function create(Request $request) {
        $data = $request->all();
        $title = $request->title;
        if ( strlen($title) < 4 ) {
            return response()->json([
                'message' => 'Lỗi',
               
            ], 401);
        }
        // Xử lý logic xong mới gọi đến repository để lưu vào database
        return $this->postRepository->insert($data);
    }

    public function edit(Request $request, $id) {
        $data = $request->all();
        // Sau khi có đủ các thông tin và sử lý service ta cần gọi đến repository của nó
        return $this->postRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->postRepository->delete($id);
    }

    public function getPostById($id) {
        if(count($this->postRepository->getPostById($id)) > 0) {
            return $this->postRepository->getPostById($id);
        }
        return [
            'message' => 'No post in database',
            'status' => 404
        ];
    }
}

?>