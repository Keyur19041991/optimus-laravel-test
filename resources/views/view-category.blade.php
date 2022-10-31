@extends('layouts.master')
@section('title')
    Shop
@endsection

@section('breadcrumb')
    <nav class="flex mb-10" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Shop</span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $category->title }}</span>
                </div>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <form class="mb-3" method="get" action="{{ route('home') }}">
        <div class="grid grid-cols-4 md:grid-cols-4 gap-8">
            <div class="col-span-4 md:col-span-1 text-center">


                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" name="search" id="search"
                           class="block p-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                           placeholder="Search" value="{{ request('search') }}">
                </div>


            </div>
            <div class="col-span-4 md:col-span-1 text-center">

                <select name="order" id="order"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2">
                    <option selected disabled>Order</option>
                    <option value="asc">A to Z</option>
                    <option value="desc">Z to A</option>
                </select>

            </div>
            <div class="col-span-4 md:col-span-1 text-center">
                <select name="per_page" id="per_page"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 block w-full p-2">
                    <option selected disabled>Per Page</option>
                    <option value="2">12</option>
                    <option value="4">24</option>
                    <option value="6">36</option>
                </select>
            </div>
            <div class=" col-span-4 md:col-span-1 text-left mb-4">
                <button class="bg-slate-900 text-white p-2 px-10 w-full rounded-lg">Submit</button>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @foreach($items as $item)
            <div class="col-span-4 md:col-span-1">
                <div class="card mb-3 border">
                    <img class="object-contain w-full h-[200px] border-b p-5"
                         src="{{ asset('public/images')."/".$item->image }}" alt="Card image cap">
                    <div class="h-[80px] flex flex-col">
                        <div class="px-4 py-2">
                            <h5 class="">{{ $item->title }}</h5>
                        </div>
                    </div>
                    @if($item->type === 'category')
                        <div class="relative">
                            <a href="{{ route('view.category', $item->id) }}" class="bg-gray-800 text-white px-4 py-2 w-full absolute bottom-0 text-center">View Products</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    @if(count($items) > 0)
        {{ $items->appends(request()->query())->links() }}
    @else
        <div class="w-100 text-center text-2xl">No Items Found</div>
    @endif


@endsection
