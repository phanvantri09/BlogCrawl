<?php
namespace App\Repositories;

use App\Models\Image;

class ImageRepository implements ImageRepositoryInterface
{
    public function all()
    {
        return Image::all();
    }

    public function create(array $data)
    {
        return Image::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Image::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Image::findOrFail($id);
        return $user->delete();
    }

    public function show($id)
    {
        return Image::findOrFail($id);
    }
    public function getAllByIDProductItem($id_post)
    {
        return Image::where('id_post', $id_post)->whereNull('type')->whereNull('is_slide')->get();
    }
    public function getAllByIDProductMain($id_post)
    {
        return Image::where('id_post', $id_post)->where('type', 1)->first();
    }
    public function getAllByIDProductSlide($id_post)
    {
        return Image::where('id_post', $id_post)->whereNull('type')->where('is_slide', 1)->first();
    }
}
