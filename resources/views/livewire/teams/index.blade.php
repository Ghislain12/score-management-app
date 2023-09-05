<div
    class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center mt-5 bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
    <div class="px-6 mx-auto max-w-8xl lg:px-8">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
            @foreach ($teams as $item)
                <div
                    class="relative max-w-sm overflow-hidden bg-white border rounded-lg shadow-sm border-neutral-200/60">
                    <img src="https://cdn.devdojo.com/images/august2023/wallpaper.jpeg"
                        class="relative z-20 object-cover w-full h-32" />
                    <div class="absolute top-0 z-50 flex items-center w-full mt-2 translate-y-24 px-7 -translate-x-0">
                        <div class="w-20 h-20 p-1 bg-white rounded-full">
                            <img src="{{ $item->picture }}" class="w-full h-full rounded-full" />
                        </div>
                        <a href="{{ route('teams:show', ['team' => $item->id]) }}" class="block mt-6 ml-2">
                            <h5 class="text-lg font-bold leading-none tracking-tight text-neutral-900">
                                {{ $item->name }}</h5>
                            <small
                                class="block mt-1 text-sm font-medium leading-none text-neutral-500"><span>@</span><span>{{ strtolower($item->name) }}</span></small>
                        </a>
                        @if (Auth::user() && Auth::user()->followThisTeam($item->id))
                            <button wire:click="unFollow('{{ $item->id }}')"
                                class="absolute right-0 inline-flex items-center justify-center w-auto px-5 mt-6 text-sm font-medium transition-colors duration-100 rounded-full h-9 mr-7 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-neutral-900 disabled:pointer-events-none hover:bg-neutral-800 text-neutral-100">
                                <span>
                                    Se désabonner
                                </span>
                            </button>
                        @endif
                        @if (Auth::user() && !Auth::user()->followThisTeam($item->id))
                            <button wire:click="follower('{{ $item->id }}')"
                                class="absolute right-0 inline-flex items-center justify-center w-auto px-5 mt-6 text-sm font-medium transition-colors duration-100 rounded-full h-9 mr-7 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-neutral-900 disabled:pointer-events-none hover:bg-neutral-800 text-neutral-100">
                                <span>
                                    S'abonner
                                </span>
                            </button>
                        @endif
                    </div>
                    <div class="relative pb-6 p-7">
                        <p class="mt-12 mb-6 text-neutral-500 text-">Creator of @tailwindcss. Listener of Slayer. Austin
                            3:16. BTW, Pines UI is super cool!</p>
                        <div class="flex items-center justify-between pr-2 text-neutral-500">
                            <div class="relative flex w-16">
                                <img src="https://cdn.devdojo.com/images/august2023/caleb.jpeg"
                                    class="relative z-30 w-8 h-8 border-2 border-white rounded-full" />
                                <img src="https://cdn.devdojo.com/images/august2023/taylor.jpeg"
                                    class="z-20 w-8 h-8 -translate-x-4 border-2 border-white rounded-full" />
                                <img src="https://cdn.devdojo.com/images/august2023/adam.jpeg"
                                    class="z-10 w-8 h-8 border-2 border-white rounded-full -translate-x-7" />
                            </div>
                            <a href="https://twitter.com/adamwathan/followers" class="text-sm hover:underline"><strong
                                    class="text-neutral-800">{{ $item->follower_count ?? 0 }}</strong>
                                Followers</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
