<?php

namespace App\Http\Controllers;

use App\Models\EconomicCalendar;
use App\Repositories\EconomicCalendarRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class EconomicCalendarController extends Controller
{
    protected $economicRepository;
    public function __construct(EconomicCalendarRepositoryInterface $economicRepository)
    {
        $this->economicRepository = $economicRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->economicRepository->all();
        return view('admin.economic.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.economic.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if ($request->hasFile('country_flag')) {
            $image = $request->file('country_flag');
            $imageName = 'economic_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['country_flag'] = $imageName;
        }
        $this->economicRepository->create($data);
        return redirect()->route('economic.index')->with('success', 'data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EconomicCalendar  $economicCalendar
     */
    public function edit($id)
    {
        //
        $economic = $this->economicRepository->edit($id);
        return view('admin.economic.edit', compact('economic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EconomicCalendar  $economicCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        if ($request->hasFile('country_flag')) {
            $image = $request->file('country_flag');
            $imageName = 'economic_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['country_flag'] = $imageName;
        }
        elseif (!isset($data["country_flag"])) { 
            $economic = $this->economicRepository->find($id);
            $imageName = $economic->country_flag; // Lấy giá trị của ảnh hiện tại
            $data['country_flag'] = $imageName;  
        }
        $this->economicRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EconomicCalendar  $economicCalendar
     */
    public function destroy($id)
    {
        //
        $this->economicRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
