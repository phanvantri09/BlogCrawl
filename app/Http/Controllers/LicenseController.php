<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Repositories\LicenseRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class LicenseController extends Controller
{
    protected $licenseRepository;

    public function __construct(LicenseRepositoryInterface $licenseRepository)
    {
        $this->licenseRepository = $licenseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->licenseRepository->all();
        return view('admin.license.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('admin.license.add');
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'license_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['image'] = $imageName;
        }
        $this->licenseRepository->create($data);
        return redirect()->route('license.index')->with('success', 'data created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\License  $license
     */
    public function edit($id)
    {
        //
        $license = $this->licenseRepository->edit($id);
        return view('admin.license.edit', compact('license'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\License  $license
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'license_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['image'] = $imageName;
        }
        else {
            $post = $this->licenseRepository->find($id);
            $imageName = $post->image; // Lấy giá trị của ảnh hiện tại
            $data['image'] = $imageName;
        }
    
        $this->licenseRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\License  $license
     */
    public function destroy($id)
    {
        //
        $this->licenseRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
