<?php
namespace App\Repositories;

use App\Models\Complaint;

class ComplaintRepository implements ComplaintRepositoryInterface
{
    public function all()
    {
        return Complaint::all();
    }

    public function create(array $data)
    {
        return Complaint::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Complaint::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Complaint::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Complaint::findOrFail($id);
    }

    public function find($id)
    {
        return Complaint::find($id);
    }

}
