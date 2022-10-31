<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = isset($request->per_page) ? $request->per_page : 12;
        $order = isset($request->order) ? $request->order : 'asc';

        $items = Item::orderBy('title', $order)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('parent_id')
                    ->whereNull('category_id');
            });

        if (isset($request->search) && $request->search != '') {
            $items = $items->where('title', 'like', '%' . $request->search . '%');
        }

        $items = $items->paginate($perPage);
        return view('home', compact('items'));
    }

    public function viewCategory(Request $request)
    {

        $categoryId = $request->categoryId;
        $category = Item::find($categoryId);
        $perPage = isset($request->per_page) ? $request->per_page : 12;
        $order = isset($request->order) ? $request->order : 'asc';


        $items = Item::orderBy('title', $order)
            ->where('status', 1)
            ->where(function ($query) use ($categoryId) {
                $query->where('parent_id', $categoryId)
                    ->orWhere('category_id', $categoryId);
            });


        if (isset($request->search) && $request->search != '') {
            $items = $items->where('title', 'like', '%' . $request->search . '%');
        }

        $items = $items->paginate($perPage);
        return view('view-category', compact('items', 'category'));
    }
}
