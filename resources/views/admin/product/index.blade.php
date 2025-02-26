@extends('layouts.frame')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4  rounded-lg dark:border-gray-700 mt-14">

            <div href="#"
                class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm  dark:bg-gray-800 dark:border-gray-700 ">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Product</h5>
            </div>
            @if (session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex justify-end my-5">
                <a href="{{ route('add-Product') }}"
                    class="flex focus:outline-none text-white
                    bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5
                    py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-gray-200 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <p class="place-content-center">Product</p>
                </a>
            </div>
            {{-- Table Product --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-sm  text-gray-500 dark:text-gray-400 text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Thumbnail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @if ($product->count() > 0)
                            @foreach ($product as $no => $keyproduct)
                                <tr class="bg-white text-center dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $no + $product->firstItem() }}
                                    </th>
                                    <td class=" py-4 flex justify-center">
                                        <img src="{{ asset($keyproduct->Thumbnail) }}" alt="Failed To Load Assets"
                                            class="w-28">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $keyproduct->name_product }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $keyproduct->category }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp.{{ number_format($keyproduct->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center ">
                                            <div>
                                                <a href="{{ route('Product.edit', $keyproduct->id_product) }}"
                                                    class="flex text-green-600 hover:transition hover:scale-110 items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />

                                                    </svg>
                                                </a>
                                            </div>
                                            <span class="mx-3"></span>
                                            <div>
                                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                    class="flex items-center hover:transition hover:scale-110 text-red-700 "
                                                    type="button">
                                                    <svg class="h-7" aria-hidden="true" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- modal delete --}}
                                <div id="popup-modal" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah
                                                    Anda Yakin Menghapus Data
                                                    Produk</h3>

                                                <form action="{{ route('Product.delete', $keyproduct->id_product) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Ya
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                        Batal
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END modal delete --}}
                            @endforeach
                        @else
                            <td class="text-center font-semibold  dark:text-gray-200">
                                <p>Tidak Ada Data</p>
                            </td>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- END Table Product --}}
            <div class="mt-4">
                {{ $product->links() }}
            </div>
        </div>
    </div>

< @endsection
