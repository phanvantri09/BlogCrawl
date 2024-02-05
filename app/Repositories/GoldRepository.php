<?php
namespace App\Repositories;

use App\Models\Gold;

class GoldRepository implements GoldRepositoryInterface
{
    public function all()
    {
        return Gold::all();
    }

    public function create(array $data)
    {
        return Gold::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Gold::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Gold::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Gold::findOrFail($id);
    }

    public function find($id)
    {
        return Gold::find($id);
    }
    public function getbycase($case)
    {
        return Gold::orderBy('created_at', 'desc')->take($case)->get();

    }

}
