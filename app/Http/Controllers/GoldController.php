<?php

namespace App\Http\Controllers;

use App\Models\Gold;
use App\Repositories\GoldRepositoryInterface;
use Illuminate\Http\Request;

class GoldController extends Controller
{
    protected $goldRepository;

    public function __construct(GoldRepositoryInterface $goldRepository)
    {
        $this->goldRepository = $goldRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->goldRepository->all();
        return view('admin.gold.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gold.add');
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
        $this->goldRepository->create($data);
        return redirect()->route('gold.index')->with('success', 'data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gold  $gold
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gold = $this->goldRepository->edit($id);
        return view('admin.gold.edit', compact('gold'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gold  $gold
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $this->goldRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gold  $gold
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->goldRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
