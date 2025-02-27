@extends('layouts.frame')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4  rounded-lg dark:border-gray-700 mt-14">
            <h1 class=" font-semibold text-3xl text-gray-200">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 ">
                <!-- Total Produk (Monthly) -->
                <div class="flex bg-white  dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-blue-500">
                    <div class="flex flex-col w-10/12">
                        <h1 class="text-blue-500 dark:text-blue-400 text-sm font-semibold">Jumlah Product</h1>
                        <p class="text-gray-800 dark:text-gray-200 text-xl font-bold">{{ $ProductCount }}</p>
                    </div>

                </div>

                <!-- Earnings (Annual) -->
                <div class="flex bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-green-500">
                    <div class="flex flex-col w-10/12">
                        <h1 class="text-green-500 dark:text-green-400 text-sm font-semibold">Total Harga Produk</h1>
                        <p class="text-gray-800 dark:text-gray-200 text-xl font-bold">
                            Rp.{{ number_format($ProductAssets, 0, ',', '.') }}</p>
                    </div>

                </div>

                <!-- Tasks -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-blue-300">
                    <p class="text-blue-300 dark:text-blue-200 text-sm font-semibold">Kapasitas Penyimpanan Product
                        ({{ $ProductCount }}/50)</p>
                    <div class="flex items-center mt-2">
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-blue-400 dark:bg-blue-500 h-2.5 rounded-full"
                                style="width: {{ ($ProductCount / 50) * 100, 100 }}%;"></div>
                        </div>
                        <p class="ml-2 text-gray-800 dark:text-gray-200 font-bold flex">
                            {{ min(Str::substr(($ProductCount / 50) * 100, 0, 4), 100) }} <span>%</span></p>
                    </div>

                </div>
            </div>
            {{-- chart --}}
            <div class="scale-75  mx-auto">

                <h1 class="text-gray-800 dark:text-gray-200 text-xl font-semibold mb-3">Grafik Harga Product</h1>
                <div class="p-6 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>

            </div>
            <script src="{{ $chart->cdn() }}"></script>

            {{ $chart->script() }}
            {{-- END chart --}}
        </div>
    </div>
@endsection
