<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SocialRepositoryInterface;


class SocialController extends Controller
    
{
    protected $socialRepository;

    public function __construct(SocialRepositoryInterface $socialRepository)
    {
        $this->socialRepository = $socialRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->socialRepository->all();
        return view('admin.social.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        $social = $this->socialRepository->all();
        return view('admin.social.add', compact('social'));
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
        $this->socialRepository->create($data);
        return redirect()->route('social.index')->with('success', 'data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     */
    public function edit($id)
    {
        //
        $social = $this->socialRepository->edit($id);
        return view('admin.social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->socialRepository->update($data, $id);
        return redirect()->route('social.index')->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     */
    public function destroy($id)
    {
        //
        $this->socialRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
