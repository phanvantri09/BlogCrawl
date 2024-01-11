<?php
namespace App\Repositories;

use App\Models\Social;

class SocialRepository implements SocialRepositoryInterface
{
    public function all()
    {
        return Social::all();
    }

    public function create(array $data)
    {
        return Social::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Social::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Social::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Social::findOrFail($id);
    }

    public function find($id)
    {
        return Social::find($id);
    }

}
