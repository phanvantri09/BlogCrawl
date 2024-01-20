<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Repositories\ComplaintRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class ComplaintController extends Controller
{
    protected $complaintRepository;
    public function __construct(ComplaintRepositoryInterface $complaintRepository)
    {
        $this->complaintRepository = $complaintRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->complaintRepository->all();
        return view('admin.complaint.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.complaint.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        // headImg => imageItem
        $imageFields = ['headImg', 'img'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $images = $request->file($field);
                $imageNames = [];

                foreach ($images as $image) {
                    $imageName = 'complaint_' . ConstCommon::getCurrentTime() . '_' . $field . '_' . pathinfo($image, PATHINFO_FILENAME).'.' . $image->extension();
                    ConstCommon::addImageToStorage($image, $imageName);
                    $imageNames[] = $imageName;
                }

                $data[$field] = implode(',', $imageNames);
            }
        }

        $data['id_user_create'] = auth()->user()->id;
        $this->complaintRepository->create($data);
        return redirect()->route('complaint.index')->with('success', 'Data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['id_user_update'] = auth()->user()->id;
        $complaint = $this->complaintRepository->edit($id);
        return view('admin.complaint.edit', compact('complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $imageFields = ['headImg', 'img'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $images = $request->file($field);
                $imageNames = [];

                foreach ($images as $image) {
                    $imageName = 'complaint_' . ConstCommon::getCurrentTime() . '_' . $field . '_' . pathinfo($image, PATHINFO_FILENAME).'.' . $image->extension();
                    ConstCommon::addImageToStorage($image, $imageName);
                    $imageNames[] = $imageName;
                }

                $data[$field] = implode(',', $imageNames);
            }
        }

        $this->complaintRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->complaintRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
