<?php
namespace App\Repositories;

use App\Models\Broker;

class BrokerRepository implements BrokerRepositoryInterface
{
    public function all()
    {
        return Broker::all();
    }

    public function create(array $data)
    {
        return Broker::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Broker::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Broker::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return Broker::findOrFail($id);
    }

    public function find($id)
    {
        return Broker::find($id);
    }
    public function getLastedBroker($limit)
    {
        return Broker::orderBy('created_at', 'desc')->take($limit)->get();

    }
    public function getBrokerHero($limit)
    {
        return Broker::where('isHero', 1)->orderBy('created_at', 'desc')->take($limit)->get();

    }

}
