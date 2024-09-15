<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     *
     */
    public function search(Request $request)
    {
        $query = Product::query();

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
        return view('products.index');
    }
}
