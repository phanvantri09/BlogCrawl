<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Post::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Post::findOrFail($id);
        $user->delete();
    }

    public function show($id)
    {
        return Post::findOrFail($id);
    }
    public function getAllByType($type){
        return Post::where('type', $type)->get();
    }
}
