@extends('layouts.frame')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4  rounded-lg dark:border-gray-700 mt-14">
            <h1 class=" font-semibold text-3xl text-gray-200">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-6 ">
                <!-- Earnings (Monthly) -->
                <div class="flex bg-white  dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-blue-500">
                    <div class="flex flex-col w-10/12">
                        <h1 class="text-blue-500 dark:text-blue-400 text-sm font-semibold">EARNINGS (MONTHLY)</h1>
                        <p class="text-gray-800 dark:text-gray-200 text-xl font-bold">$40,000</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10 text-gray-700 dark:text-gray-300 place-content-center">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                </div>

                <!-- Earnings (Annual) -->
                <div class="flex bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-green-500">
                    <div class="flex flex-col w-10/12">
                        <h1 class="text-green-500 dark:text-green-400 text-sm font-semibold">EARNINGS (ANNUAL)</h1>
                        <p class="text-gray-800 dark:text-gray-200 text-xl font-bold">$215,000</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10 text-gray-700 dark:text-gray-300 place-content-center">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>

                <!-- Tasks -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-blue-300">
                    <p class="text-blue-300 dark:text-blue-200 text-sm font-semibold">TASKS</p>
                    <div class="flex items-center mt-2">
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-blue-400 dark:bg-blue-500 h-2.5 rounded-full" style="width: 50%;"></div>
                        </div>
                        <span class="ml-2 text-gray-800 dark:text-gray-200 font-bold">50%</span>
                    </div>

                </div>

                <!-- Pending Requests -->
                <div class="flex bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 border-l-4 border-yellow-500">
                    <div class="flex flex-col w-10/12">
                        <p class="text-yellow-500 dark:text-yellow-400 text-sm font-semibold">PENDING REQUESTS</p>
                        <p class="text-gray-800 dark:text-gray-200 text-xl font-bold">18</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10 text-gray-700 dark:text-gray-300 place-content-center">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>

                </div>
            </div>
            {{-- chart --}}
            <div>

            </div>
            {{-- END chart --}}
        </div>
    </div>
@endsection
