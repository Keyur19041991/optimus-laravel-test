<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-2">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight">
                Product
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                > Edit
            </h2>
        </div>
    </x-slot>


    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form class="grid grid-cols-1" action="{{ route('product.update', $product->id) }}" method="post"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="mb-6 col-span-1">
                    <label for="product_name"
                           class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">Product Name
                        <span class="text-red-600 font-bold">*</span></label>
                    <input type="text" name="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                           placeholder="e.g. Books" value="{{ $product->title }}">
                    @if($errors->has('title'))
                        <div class="text-red-600 text-sm">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="mb-6 col-span-1">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">Category</label>
                    <select name="category_id" id="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        @if(count($categories) > 0)
                            <option value="" selected disabled>-- Select</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}"
                                        @if($item->id == $product->category_id) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No Parent Products</option>
                        @endif
                    </select>
                    @if($errors->has('category_id'))
                        <div class="text-red-600 text-sm">{{ $errors->first('category_id') }}</div>
                    @endif
                </div>
                <div class="mb-6 col-span-1">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">Product
                        Image <span class="text-red-600 font-bold">*</span></label>
                    <input type="file" name="image" id="image"
                           class="bg-gray-50 input-sm border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                           placeholder="e.g. Books">
                    <input type="hidden" name="old_image" value="{{ $product->image }}">
                    @if($errors->has('image'))
                        <div class="text-red-600 text-sm">{{ $errors->first('image') }}</div>
                    @endif
                </div>

                @if($product->image)
                    <div class="mb-6 col-span-1">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">
                            Image</label>

                        <div class="flex flex-wrap justify-start">
                            <img src="{{ asset('public/images')."/".$product->image }}"
                                 class="p-1 bg-white border rounded max-w-sm" alt="...">
                        </div>

                    </div>
                @endif

                <div class="mb-6 col-span-1">
                    <div class="form-check ">
                        <input type="checkbox" name="status" id="status" value="1" @if($product->status == 1) checked @endif />
                        <label class="form-check-label inline-block text-gray-800" for="status">
                            Active Product?
                        </label>
                    </div>
                </div>


                <div class="flex">
                    <button type="submit"
                            class="text-white bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center max-w-[200px] mr-2">
                        <i class="fa fa-sync mr-1"></i> Update
                    </button>
                    <a href="{{ route('product.index') }}"
                       class="text-white bg-gray-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center max-w-[200px]">
                        <i class="fas fa-close"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
