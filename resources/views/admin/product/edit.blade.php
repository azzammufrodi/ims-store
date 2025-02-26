@extends('layouts.frame')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4  rounded-lg dark:border-gray-700 mt-14">

            <div
                class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm  dark:bg-gray-800 dark:border-gray-700 mb-5 ">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Product</h5>
                <p class="mb-2 text-sm font-medium tracking-tight text-gray-900 dark:text-white">ID :
                    <span>{{ $product->id_product }}</span>
                </p>
            </div>

            <form action="{{ route('Product.update', $product->id_product) }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="flex w-full">
                    <div
                        class="block w-8/12  p-6 bg-white border border-gray-200 rounded-lg shadow-sm  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="name_product" id="floating_product"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="{{ $product->name_product }}" required />
                            <label for="floating_product"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Produk
                            </label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="category" id="floating_category"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="{{ $product->category }}" required />
                            <label for="floating_category"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Kategori</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="price" id="floating_price"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " value="{{ $product->price }}" required />
                            <label for="floating_price"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Harga</label>
                        </div>
                    </div>
                    {{-- <div class="px-3">
                        <h2 class="mb-2 text-sm font-medium tracking-tight text-gray-900 dark:text-white">Preview Image</h2>
                        <img src="{{ asset($product->Thumbnail) }}" alt="" class="w-36 rounded-lg shadow-lg">
                    </div> --}}
                    <div class="flex items-center justify-center w-1/3 ml-3">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400"> PNG, JPG or JPEG
                                </p>
                            </div>

                            <img id="preview-image" class="w-36 rounded-lg shadow-lg hidden" />
                            <input id="dropzone-file" type="file" name="thumbnail" class="hidden"
                                onchange="previewFile(event)" value="{{ asset($product->Thumbnail) }}" />
                        </label>
                    </div>

                </div>
                <div class="flex justify-end mt-3">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Upadate Data</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Preview Img  --}}
    <script>
        function previewFile(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('preview-image');
                    const placeholder = document.getElementById('upload-placeholder');
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
    {{-- END Preview Img  --}}

    {{-- Format Price  --}}
    <script>
        function formatRupiah(input) {
            // Mengambil nilai yang dimasukkan
            let value = input.value;

            // Menghapus semua karakter selain digit
            value = value.replace(/\D/g, '');

            // Menambahkan titik sebagai pemisah ribuan
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Memasukkan nilai yang telah diformat ke dalam input
            input.value = value;
        }

        document.getElementById('floating_price').addEventListener('submit', function(e) {
            // Mendapatkan nilai input
            let input = document.querySelector('input[name="price"]');
            let value = input.value;

            // Menghapus tanda titik (pemisah ribuan)
            value = value.replace(/\./g, '');

            // Mengatur nilai input kembali tanpa titik
            input.value = value;
        });
    </script>
    {{-- END Format Price  --}}
@endsection
