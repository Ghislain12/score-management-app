<div class="w-full h-screen mx-auto mt-0 sm:w-8/12">
    <div id="default-carousel" class="relative" data-carousel="static">
        <div class="relative h-screen overflow-hidden rounded-lg">
            @foreach ($details as $item)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col justify-center min-h-screen py-6 sm:py-12">
                        <div class="w-full px-2 py-3 sm:max-w-xl sm:mx-auto sm:px-0">
                            <div class="relative text-sm antialiased font-semibold text-gray-700">
                                {{-- <div
                                    class="absolute hidden w-1 h-full transform -translate-x-1/2 bg-blue-300 sm:block left-1/2">
                                </div> --}}
                                @foreach ($item->event as $detail)
                                    <div class="h-32 mt-6 sm:mt-0 sm:mb-12">
                                        <div class="flex flex-col items-center sm:flex-row">
                                            <div class="flex items-center justify-start w-full mx-auto">
                                                <div class="w-full sm:w-1/2 sm:pr-8">
                                                    <div class="p-4 bg-white rounded shadow">
                                                        {{ $detail->event }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="absolute flex items-center justify-center w-8 h-8 transform -translate-x-1/2 -translate-y-4 bg-blue-500 border-4 border-white rounded-full left-1/2 sm:translate-y-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Right section, set by justify-end and sm:pl-8 -->
                                {{-- <div class="mt-6 sm:mt-0 sm:mb-12">
                                    <div class="flex flex-col items-center sm:flex-row">
                                        <div class="flex items-center justify-end w-full mx-auto">
                                            <div class="w-full sm:w-1/2 sm:pl-8">
                                                <div class="p-4 bg-white rounded shadow">
                                                    My life got flipped turned upside down,
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute flex items-center justify-center w-8 h-8 transform -translate-x-1/2 -translate-y-4 bg-blue-500 border-4 border-white rounded-full left-1/2 sm:translate-y-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Left section, set by justify-start and sm:pr-8 -->
                                <div class="mt-6 sm:mt-0 sm:mb-12">
                                    <div class="flex flex-col items-center sm:flex-row">
                                        <div class="flex items-center justify-start w-full mx-auto">
                                            <div class="w-full sm:w-1/2 sm:pr-8">
                                                <div class="p-4 bg-white rounded shadow">
                                                    And I'd like to take a minute, just sit right there,
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute flex items-center justify-center w-8 h-8 transform -translate-x-1/2 -translate-y-4 bg-blue-500 border-4 border-white rounded-full left-1/2 sm:translate-y-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- Right section, set by justify-end and sm:pl-8 -->
                                <div class="mt-6 sm:mt-0">
                                    <div class="flex flex-col items-center sm:flex-row">
                                        <div class="flex items-center justify-end w-full mx-auto">
                                            <div class="w-full sm:w-1/2 sm:pl-8">
                                                <div class="p-4 bg-white rounded shadow">
                                                    I'll tell you how I became the Prince of a town called Bel Air.
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute flex items-center justify-center w-8 h-8 transform -translate-x-1/2 -translate-y-4 bg-blue-500 border-4 border-white rounded-full left-1/2 sm:translate-y-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-blue-400 sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-blue-400 sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>
</div>
