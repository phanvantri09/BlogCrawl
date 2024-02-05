<?php
namespace App\Repositories;

use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return Blog::all();
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Blog::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Blog::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Blog::findOrFail($id);
    }

    public function find($id)
    {
        return Blog::find($id);
    }
    public function getLastedBroker($limit)
    {
        return Blog::orderBy('created_at', 'desc')->take($limit)->get();

    }

}
