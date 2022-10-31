<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-2">
            <h2 class="font-semibold text-xl text-gray-400 leading-tight">
                Category
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                > Create
            </h2>
        </div>
    </x-slot>


    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form class="grid grid-cols-1" action="{{ route('category.store') }}" method="post"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-6 col-span-1">
                    <label for="category_name"
                           class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">Category Name
                        <span class="text-red-600 font-bold">*</span></label>
                    <input type="text" name="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                           placeholder="e.g. Books" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <div class="text-red-600 text-sm">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="mb-6 col-span-1">
                    <label for="parent_id" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">Parent
                        Category</label>
                    <select name="parent_id" id="parent_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">
                        @if(count($categories) > 0)
                            <option value="" selected disabled>-- Select</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}"
                                        @if($item->id == old('parent_id'))  selected @endif>{{ $item->title }}</option>
                            @endforeach
                        @else
                            <option value="" selected disabled>No Categories Found</option>
                        @endif
                    </select>

                    @if($errors->has('parent_id'))
                        <div class="text-red-600 text-sm">{{ $errors->first('parent_id') }}</div>
                    @endif

                </div>
                <div class="mb-6 col-span-1">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-300">Category
                        Image <span class="text-red-600 font-bold">*</span></label>
                    <input type="file" name="image" id="image"
                           class="bg-gray-50 input-sm border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                           placeholder="e.g. Books">
                    @if($errors->has('image'))
                        <div class="text-red-600 text-sm">{{ $errors->first('image') }}</div>
                    @endif
                </div>


                <div class="mb-6 col-span-1">
                    <div class="form-check ">
                        <input type="checkbox" name="status" id="status" value="1" checked>
                        <label class="form-check-label inline-block text-gray-800" for="status">
                            Active Category?
                        </label>
                    </div>
                </div>


                <div class="flex">
                    <button type="submit"
                            class="text-white bg-blue-700 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center max-w-[200px] mr-2">
                        <i class="fa fa-save mr-1"></i> Save
                    </button>
                    <a href="{{ route('category.index') }}"
                       class="text-white bg-gray-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center max-w-[200px]">
                        <i class="fas fa-close"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
