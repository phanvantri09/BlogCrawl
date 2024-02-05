<?php
namespace App\Repositories;

use App\Models\EconomicCalendar;

class EconomicCalendarRepository implements EconomicCalendarRepositoryInterface
{
    public function all()
    {
        return EconomicCalendar::all();
    }

    public function create(array $data)
    {
        return EconomicCalendar::create($data);
    }

    public function update(array $data, $id)
    {
        $user = EconomicCalendar::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = EconomicCalendar::findOrFail($id);
        $user->delete();
    }
    public function edit($id)
    {
        return EconomicCalendar::findOrFail($id);
    }

    public function find($id)
    {
        return EconomicCalendar::find($id);
    }

    public function getLatestEconomic($limit)
    {
        return EconomicCalendar::orderBy('created_at', 'desc')->take($limit)->get();

    }

    public function getbydate($date, $star = null)
    {
        if ($star == 1) {
            return EconomicCalendar::where('star', '>', 2)->where('pub_time_tz', 'like' , '%'.$date.'%')->orderBy('created_at', 'desc')->get();
        }
        return EconomicCalendar::where('pub_time_tz', 'like' , '%'.$date.'%')->orderBy('created_at', 'desc')->get();

    }

}
