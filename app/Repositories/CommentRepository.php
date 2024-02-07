<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function all()
    {
        return Comment::orderBy('created_at', "DESC")->get();
    }

    public function create(array $data)
    {
        return Comment::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Comment::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Comment::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Comment::findOrFail($id);
    }

    public function find($id)
    {
        return Comment::find($id);
    }
    public function getLastedComment($limit)
    {
        return Comment::orderBy('created_at','desc')->take($limit)->get();
    }
    public function getFirstComment()
    {
        return Comment::orderBy('created_at','desc')->first();
    }

    public function getCommentPostByid($id)
    {
        return Comment::where('id_post', $id)
            ->orderBy('created_at','desc')
            ->get();
    }

    public function getCommentBlogByid($id)
    {
        return Comment::where('id_blog', $id)
            ->orderBy('created_at','desc')
            ->get();
    }
    
    public function getCommentBrokerByid($id)
    {
        return Comment::where('id_broker', $id)
            ->orderBy('created_at','desc')
            ->get();
    }
}
