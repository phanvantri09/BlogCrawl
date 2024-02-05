<?php
namespace App\Repositories;

use App\Models\Video;

class VideoRepository implements VideoRepositoryInterface
{
    public function all()
    {
        return Video::all();
    }

    public function create(array $data)
    {
        return Video::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Video::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Video::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Video::findOrFail($id);
    }

    public function find($id)
    {
        return Video::find($id);
    }
    public function getLastedVideo($limit)
    {
        return Video::orderBy('created_at','desc')->take($limit)->get();
    }
    public function getFirstVideo()
    {
        return Video::orderBy('created_at','desc')->first();
    }

}
