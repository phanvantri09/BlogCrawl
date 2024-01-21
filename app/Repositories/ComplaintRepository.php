<?php
namespace App\Repositories;

use App\Models\complaint;

class ComplaintRepository implements ComplaintRepositoryInterface
{
    public function all()
    {
        return complaint::all();
    }

    public function create(array $data)
    {
        return complaint::create($data);
    }

    public function update(array $data, $id)
    {
        $user = complaint::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = complaint::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return complaint::findOrFail($id);
    }

    public function find($id)
    {
        return complaint::find($id);
    }

}
