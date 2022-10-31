<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Item::orderBy('id', 'desc')->where('type', 'category')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Item::select('id', 'title')->orderBy('title', 'asc')->where('type', 'category')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $inputs = $request->all();
        $filename = "";
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $file->move(public_path('public/images'), $filename);
        }

        $inputs['slug'] = $request->title;
        $inputs['status'] = $request->status == 1 ? 1 : 0;
        $inputs['image'] = $filename;
        $inputs['type'] = 'category';

        Item::create($inputs);

        flash()->success('Category has been saved successfully!');
        return redirect()->route('category.index');
    }

    public function edit(Item $category)
    {
        $categories = Item::select('id', 'title')->where('title', '<>', $category->title)->orderBy('title', 'asc')->where('type', 'category')->get();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request, Item $category)
    {
        $inputs = $request->all();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $file->move(public_path('public/images'), $filename);

            $oldImage = app_path().'/public/images/'.$request->old_image;
            if (File::exists($oldImage)) {
                //File::delete($image_path);
                unlink($oldImage);
            }
            $inputs['image'] = $filename;
        } else {
            $inputs['image'] = $request->old_image;
        }

        $inputs['slug'] = $request->title;
        $inputs['status'] = $request->status == 1 ? 1 : 0;
        $inputs['type'] = 'category';
        $category->update($inputs);

        flash()->success('Category has been updated successfully!');
        return redirect()->route('category.index');
    }

    public function destroy(Item $category)
    {
        $category->delete();
        flash("Category removed Successfully");
        return redirect()->back();
    }
}
