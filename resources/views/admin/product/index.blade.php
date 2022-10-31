<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product
            </h2>
            <a class="text-white bg-gray-800 px-4 py-2" href="{{ route('product.create') }}">
                <i class="fa fa-plus"></i> Create Product
            </a>
        </div>
    </x-slot>


    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="border-collapse table-auto w-full text-sm">
                <thead>
                <tr>
                    <th class="border-b  font-medium p-4 pl-8 pt-0 pb-3 text-slate-600 text-left">Title</th>
                    <th class="border-b  font-medium p-4 pl-8 pt-0 pb-3 text-slate-600 text-left">Category</th>
                    <th class="border-b  font-medium p-4 pl-8 pt-0 pb-3 text-center">Image</th>
                    <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">Status</th>
                    <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-600 text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                @forelse($products as $product)
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $product->title }}</td>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                            @if($product->category)
                                {{ $product->category->title }}
                            @else
                                --
                            @endif

                        </td>
                        <td class="border-b border-slate-100 p-4 pl-8">
                            <div class="flex w-100 justify-center">
                                <img src="{{ asset('public/images/').'/'.$product->image }}" alt=""
                                     class="h-10 w-10 rounded-full border p-1">
                            </div>
                        </td>
                        <td class="border-b border-slate-100  p-4 pl-8 w-[100px]">
                            @if($product->status == 1)
                                <div class="bg-green-500 rounded-full px-4 py-1 text-white text-center">Active</div>
                            @else
                                <div class="bg-red-500 rounded-full px-4 py-1 text-white text-center">Inactive</div>
                            @endif
                        </td>
                        <td class="border-b border-slate-100 w-[100px] text-center">
                            <a href="{{ route('product.edit', $product->id) }}"
                               class="bg-blue-500 rounded-[50%] inline-flex p-2 px-2 text-white text-center"><i
                                    class="fa fa-pen" size="18"></i></a>

                            <button class="bg-red-500 rounded-[50%] inline-flex p-2 px-2 text-white text-center"
                                    data-modal-toggle="delete_product_{{ $product->id }}_modal"><i
                                    class="fa fa-trash" size="18"></i></button>


                            <!-- Main modal -->
                            <div id="delete_product_{{ $product->id }}_modal" tabindex="-1" aria-hidden="true"
                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                    <!-- Modal content -->

                                    <form action="{{ route('product.destroy', $product->id) }}"
                                          id="form_delete_product_{{ $product->id }}" method="post">

                                        @csrf
                                        @method('DELETE')

                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Delete Product
                                                </h3>
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="delete_product_{{ $product->id }}_modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Are you sure want to delete product?
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                <button type="submit"
                                                        class="text-white bg-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Delete
                                                </button>
                                                <button data-modal-toggle="delete_product_{{ $product->id }}_modal" type="button"
                                                        class="text-gray-500 bg-white rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center pt-5">No Products Found</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>

</x-app-layout>
