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
                                    <td class=" py-4">
                                        <img src="{{ asset('storage/' . $keyproduct->Thumbnail) }}" alt="">
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
                                    {{-- <td class="px-6 py-4">
                                        <div class="flex justify-center ">
                                            <div>
                                                <button type="button" data-modal-target="edit_year{{ $keyproduct->id }}"
                                                    data-modal-toggle="edit_year{{ $keyproduct->id }}"
                                                    class="flex flex-col items-center font-medium text-gray-800 dark:text-gray-600 dark:hover:text-gray-300 px-3 ">
                                                    <svg class="h-7" aria-hidden="true" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <p>Edit</p>
                                                </button>
                                            </div>
                                            <div>

                                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                                    class="flex flex-col items-center font-medium text-gray-800 dark:text-gray-600 dark:hover:text-gray-300 "
                                                    type="button">
                                                    <svg class="h-7" aria-hidden="true" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <p>Hapus</p>
                                                </button>
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
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

        </div>
    </div>
@endsection
