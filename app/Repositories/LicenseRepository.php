<?php
namespace App\Repositories;

use App\Models\License;

class LicenseRepository implements LicenseRepositoryInterface
{
    public function all()
    {
        return License::all();
    }

    public function create(array $data)
    {
        return License::create($data);
    }

    public function update(array $data, $id)
    {
        $user = License::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = License::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return License::findOrFail($id);
    }

    public function find($id)
    {
        return License::find($id);
    }

}
