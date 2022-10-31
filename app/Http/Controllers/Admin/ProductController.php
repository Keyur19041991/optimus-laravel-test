<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {

        $products = Item::with('category')->orderBy('id', 'desc')->where('type', 'product')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Item::select('id', 'title')->orderBy('title', 'asc')->where('type', 'category')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
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
        $inputs['type'] = 'product';

        Item::create($inputs);

        flash()->success('Product has been saved successfully!');
        return redirect()->route('product.index');
    }

    public function edit(Item $product)
    {
        $categories = Item::select('id', 'title')->where('title', '<>', $product->title)->where('type', 'category')->orderBy('title', 'asc')->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Item $product)
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
        $inputs['type'] = 'product';
        $product->update($inputs);

        flash()->success('Product has been updated successfully!');
        return redirect()->route('product.index');
    }

    public function destroy(Item $product)
    {
        $product->delete();
        flash("Product removed Successfully");
        return redirect()->back();
    }
}
