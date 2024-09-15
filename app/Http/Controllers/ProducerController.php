<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducerEditRequest;
use App\Http\Requests\ProducerCreateRequest;
use App\Models\Producer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProducerController extends Controller
{
    /**
     *
     */
    public function search(Request $request)
    {
        $query = Producer::query();

        if ($request->filled('column') && $request->filled('search')) {
            $query->where($request->column, 'LIKE', '%' . $request->search . '%');
        }

        $results = $query->paginate(15);

        return response()->json($results);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('producers.index');
    }
}
