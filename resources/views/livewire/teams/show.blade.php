<div class="w-full h-screen mx-auto xl:w-7/12 mt-4 px-2">
    <div
        class="relative w-full overflow-hidden bg-white border rounded-lg shadow-sm border-neutral-200/60 min:h-[20rem]">
        <img src="{{ asset('asset/terrain-football-vide_174699-16.webp') }}" class="relative object-cover w-full h-32" />
        <div class="absolute top-0 flex items-center w-full mt-2 translate-y-24 px-7 -translate-x-0">
            <div class="w-20 h-20 p-1 bg-white rounded-full">
                <img src="{{ $data->picture }}" class="w-full h-full rounded-full" />
            </div>
            <a href="{{ route('teams:show', ['team' => 1]) }}" class="block mt-6 ml-2">
                <h5 class="text-lg font-bold leading-none tracking-tight text-neutral-900">
                    svfvfv</h5>
                <small
                    class="block mt-1 text-sm font-medium leading-none text-neutral-500"><span>@</span><span>{{ strtolower($data->name) }}</span></small>
            </a>
            @if (Auth::user() && Auth::user()->followThisTeam($data->id))
                <button wire:click="unFollow('{{ $data->id }}')"
                    class="absolute right-0 hidden md:inline-flex items-center justify-center w-auto px-5 mt-6 text-sm font-medium transition-colors duration-100 rounded-full h-9 mr-7 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-neutral-900 disabled:pointer-events-none hover:bg-neutral-800 text-neutral-100">
                    <span>
                        Se désabonner
                    </span>
                </button>
            @endif
            @if (Auth::user() && !Auth::user()->followThisTeam($data->id))
                <button wire:click="follower('{{ $data->id }}')"
                    class="absolute right-0 hidden md:inline-flex items-center justify-center w-auto px-5 mt-6 text-sm font-medium transition-colors duration-100 rounded-full h-9 mr-7 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-neutral-900 disabled:pointer-events-none hover:bg-neutral-800 text-neutral-100">
                    <span>
                        S'abonner
                    </span>
                </button>
            @endif
            @if (Auth::user() && Auth::user()->followThisTeam($data->id))
                <button wire:click="unFollow('{{ $data->id }}')"
                    class="absolute right-0 md:hidden inline-flex items-center justify-center w-auto px-2 mt-6 text-sm font-medium transition-colors duration-100 rounded-sm h-9 mr-7 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-neutral-900 disabled:pointer-events-none hover:bg-neutral-800 text-neutral-100">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z" />
                        </svg>
                    </span>
                </button>
            @endif
            @if (Auth::user() && !Auth::user()->followThisTeam($data->id))
                <button wire:click="follower('{{ $data->id }}')"
                    class="absolute right-0 md:hidden inline-flex items-center justify-center w-auto px-2 mt-6 text-sm font-medium transition-colors duration-100 rounded-sm h-9 mr-7 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-neutral-900 disabled:pointer-events-none hover:bg-neutral-800 text-neutral-100">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                            <path
                                d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                        </svg>
                    </span>
                </button>
            @endif
        </div>
        <div
            class="flex md:flex-row flex-col mt-[7rem] justify-between px-2 md:px-8 font-bold space-y-4 mb-4 items-center">
            <div class="w-full md:w-3/12 justify-between md:justify-center flex md:inline-block">
                <span>Abonnés : </span>
                <span
                    class="bg-green-100 text-green-800 font-semibold px-2.5 py-0.5 rounded-full">{{ $data->follower_count }}
                </span>
            </div>
            <div class="w-full md:w-6/12 flex flex-col  md:flex-row space-x-2">
                <span>Slogan : </span>
                <span class="bg-green-100 text-green-800 font-semibold px-2.5 py-0.5 rounded-sm">{{ $data->slogan }}
                </span>
            </div>
            <div class="w-full md:w-3/12 justify-between md:justify-center flex md:inline-block">
                <span>Coach : </span>
                <span class="bg-green-100 text-green-800 font-semibold px-2.5 py-0.5 rounded-full">{{ $data->coach }}
                </span>
            </div>
        </div>
    </div>
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
                    <div id="accordion-collapse-body-{{ $item->id }}"
                        class="hidden max-h-[75vh] overflow-auto px-4" aria-labelledby="accordion-collapse-heading-1">
                        <ol class="relative border-l border-gray-200 dark:border-gray-700 mt-5">
                            @if ($item->event->count() > 0)
                                @foreach ($item->event as $detail)
                                    <li class="mb-10 ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                            <img class="rounded-full shadow-lg"
                                                src="{{ asset('asset/—Pngtree—soccer ball vector template design_4102617.png') }}"
                                                alt="Thomas Lean image" />
                                        </span>
                                        <div
                                            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                            <div class="items-center justify-between mb-3 sm:flex">
                                                <time
                                                    class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $detail->created_at->diffForHumans() }}
                                                </time>
                                                <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                                                    <a href=""
                                                        class="font-semibold text-gray-900 dark:text-white hover:underline">{{ $detail->title }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div
                                                class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                                {{ $detail->event }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div
                                    class="relative mb-4 md:w-5/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600 mt-5">
                                    <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                    <h5 class="mb-1 font-medium leading-none tracking-tight text-center">
                                        Aucun détail disponible pour ce match
                                    </h5>
                                </div>
                            @endif
                        </ol>
                    </div>
                @endforeach
            @else
                <div
                    class="relative md:w-6/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600">
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
                <div class="flex justify-between bg-gray-200 p-2">
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
                        <div x-show="activeTab === {{ $index }}"
                            class="border p-4 rounded-md bg-white shadow">
                            <div class="flex items-center justify-between xl:px-60">
                                <div class="flex-col justify-center items-center">
                                    <img src="{{ $match->firstTeam->picture }}" alt="logo"
                                        class="rounded-full h-20 w-20 mx-auto">
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
                                        class="rounded-full h-20 w-20 mx-auto">
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
                class="relative md:w-6/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600">
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
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Match nul</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Victoires</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Défaites</th>
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
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $item['draws'] }}
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $item['victories'] }}
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $item['defeats'] }}
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
        <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Liste des joueurs du club</h3>
        <div class="flex flex-col my-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead class="bg-neutral-50">
                                <tr class="text-neutral-500">
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Noms</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Tailles</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Poids</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Age</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Poste</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @foreach ($data->players as $player)
                                    <tr class="text-neutral-800 @if ($item['team_id'] == $team) bg-green-200 @endif">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            {{ $player->name }}
                                        </td>
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            {{ $player->height }} cm
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $player->weight }} kg
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $player->age }}
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap text-left">
                                            {{ $player->post }}
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
