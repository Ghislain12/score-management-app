<div class="w-full h-screen mx-auto sm:w-7/12 mt-4 px-2">
    <div class="relative" data-carousel="static">
        <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Historique des matchs disputés</h3>
        <div id="accordion-collapse" data-accordion="collapse">
            @if ($details->count() > 0)
                @foreach ($details as $item)
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-{{ $item->id }}"
                            aria-controls="accordion-collapse-body-{{ $item->id }}">
                            <span class="hidden md:block">Match {{ $item->firstTeam->name }} vs
                                {{ $item->secondTeam->name }}</span>
                            <span>Score : {{ $item->firstTeam->name }}
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $item->first_team_score }}</span>
                                vs
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $item->second_team_score }}</span>
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
                        <ol class="relative border-l border-gray-200 dark:border-gray-700 pb-4 mt-5">
                            @if ($item->event->count() > 0)
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
                            @else
                                <div
                                    class="relative md:w-5/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600 mt-5">
                                    <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                    <h5 class="mb-1 font-medium leading-none tracking-tight text-center">Aucun détail
                                        disponible pour ce match
                                    </h5>
                                </div>
                            @endif
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
                    <h5 class="mb-1 font-medium leading-none tracking-tight text-center">Aucun match disputé</h5>
                </div>
            @endif
        </div>
        <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Programme des matchs à venir</h3>
        @if ($nextMatchs->count() > 0)
            <div x-data="{ activeTab: 0 }" class="relative w-full">
                <div class="flex justify-between">
                    @foreach ($nextMatchs as $index => $match)
                        <button @click="activeTab = {{ $index }}"
                            :class="{
                                'bg-white rounded-md shadow-sm duration-300 ease-out': activeTab ===
                                    {{ $index }}
                            }"
                            class="flex-grow px-4 py-2 rounded-md cursor-pointer">
                            {{ $match->start_date }}
                        </button>
                    @endforeach
                </div>
                <div class="mt-4">
                    @foreach ($nextMatchs as $index => $match)
                        <div x-show="activeTab === {{ $index }}" class="border p-4 rounded-md bg-white shadow">
                            <div class="flex items-center justify-between md:px-60">
                                <div class="flex-col justify-center items-center">
                                    <img src="{{ $match->firstTeam->picture }}" alt="logo"
                                        class="rounded-full h-20 w-20">
                                    <h3
                                        class="mb-6 text-xl text-center mt-4 font-extrabold leading-none max-w-5xl mx-auto tracking-normal text-gray-900 md:tracking-tight">
                                        <span
                                            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">{{ $match->firstTeam->name }}</span>
                                    </h3>
                                </div>
                                <div>
                                    <h3><span
                                            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">VS</span>
                                    </h3>
                                </div>
                                <div>
                                    <img src="{{ $match->secondTeam->picture }}" alt="logo"
                                        class="rounded-full h-20 w-20">
                                    <h3
                                        class="mb-6 text-xl text-center mt-4 font-extrabold leading-none max-w-5xl mx-auto tracking-normal text-gray-900 md:tracking-tight">
                                        <span
                                            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">{{ $match->secondTeam->name }}</span>
                                    </h3>
                                </div>
                            </div>
                            <h3 class="text-center font-bold"><span>Arbitre :</span>
                                <span>{{ $match->arbitrator }}</span>
                            </h3>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div
                class="relative md:w-4/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600">
                <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                <h5 class="mb-1 font-medium leading-none tracking-tight text-center">Aucun match en attente</h5>
            </div>
        @endif
        <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Classement dans le tournoi</h3>
        <div class="flex flex-col my-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead class="bg-neutral-50">
                                <tr class="text-neutral-500">
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">N°</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipes</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Match joués</th>
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">Points</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @foreach ($ranking as $item)
                                    <tr class="text-neutral-800 @if ($item['team_id'] == $team) bg-green-200 @endif">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            {{ $i += 1 }}
                                        </td>
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            {{ $item['team_name'] }}
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $item['totalMatch'] }}
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-end">
                                            {{ $item['total'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
