<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Repositories\BrokerRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class BrokerController extends Controller
{
    protected $brokerRepository;
    public function __construct(BrokerRepositoryInterface $brokerRepository)
    {
        $this->brokerRepository = $brokerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->brokerRepository->all();
        return view('admin.broker.list', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.broker.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $imageFields = ['firstCountryLogo', 'img', 'logo', 'lookImgList'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $images = $request->file($field);
                $imageNames = [];

                foreach ($images as $image) {
                    $imageName = 'broker_' . ConstCommon::getCurrentTime() . '_' . $field . '_' . pathinfo($image, PATHINFO_FILENAME).'.' . $image->extension();
                    ConstCommon::addImageToStorage($image, $imageName);
                    $imageNames[] = $imageName;
                }

                $data[$field] = implode(',', $imageNames);
            }
        }

        $data['id_user_create'] = auth()->user()->id;
        $this->brokerRepository->create($data);
        return redirect()->route('broker.index')->with('success', 'Data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $broker = $this->brokerRepository->edit($id);
        return view('admin.broker.edit', compact('broker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $imageFields = ['firstCountryLogo', 'img', 'logo','lookImgList'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $images = $request->file($field);
                $imageNames = [];

                foreach ($images as $image) {
                    $imageName = 'broker_' . ConstCommon::getCurrentTime() . '_' . $field . '_' . pathinfo($image, PATHINFO_FILENAME).'.' . $image->extension();
                    ConstCommon::addImageToStorage($image, $imageName);
                    $imageNames[] = $imageName;
                }

                $data[$field] = implode(',', $imageNames);
            }
        }

        $data['id_user_update'] = auth()->user()->id;
        $this->brokerRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->brokerRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
