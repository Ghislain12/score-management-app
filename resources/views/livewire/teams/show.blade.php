<div class="w-full h-screen mx-auto sm:w-7/12 mt-4 px-2">
    <div class="relative" data-carousel="static">
        <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Historique des matchs disputés</h3>
        <div id="accordion-collapse" data-accordion="collapse">
            @if ($details->count() > 0)
                @foreach ($details as $item)
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-{{ $item->id }}" aria-expanded="true"
                            aria-controls="accordion-collapse-body-{{ $item->id }}">
                            <span class="hidden md:block">Match {{ $item->firstTeam->name }} vs
                                {{ $item->secondTeam->name }}</span>
                            <span>Score : {{ $item->firstTeam->name }}
                                {{ $item->first_team_score }} vs
                                {{ $item->second_team_score }}
                                {{ $item->secondTeam->name }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $item->id }}" class="hidden max-h-[75vh] overflow-auto px-4"
                        aria-labelledby="accordion-collapse-heading-1">
                        <ol class="relative border-l border-gray-200 dark:border-gray-700 pb-4">
                            @foreach ($item->event as $detail)
                                <li class="mb-10 ml-4">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <time
                                        class="mb-1 text-sm font-normal leading-none text-blue-400 dark:text-gray-500">{{ $detail->created_at }}</time>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $detail->title }}
                                    </h3>
                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $detail->event }}</p>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            @else
                <div
                    class="relative md:w-4/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600">
                    <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <h5 class="mb-1 font-medium leading-none tracking-tight text-center">Notification</h5>
                    <div class="text-sm opacity-80 text-center">Aucun match disputé</div>
                </div>
            @endif
        </div>
        <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Programme des matchs</h3>
        @livewire('teams.calendar')
    </div>
</div>
