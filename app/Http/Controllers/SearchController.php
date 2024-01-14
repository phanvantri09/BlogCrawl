<?php

namespace App\Http\Controllers;

use App\Repositories\SearchRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    protected $searchRepository;
    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function index(Request $request)
    {
        $results = $request->input('results') ?? [];

        return view('admin.search.list', ['results' => $results]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = $this->searchRepository->searchAll($query);

        if ($request->expectsJson()) {
            return response()->json($results);
        }

        $request->session()->flash('results', $results);

        return redirect()->route('search.index', ['results' => $results]);
    }


}
