<div class="w-full px-6 mx-auto mt-4 space-y-8 max-w-7xl lg:px-8 xl:w-7/12">
    <h3 class="my-4 text-xl font-extrabold md:text-4xl dark:text-white">Total des points de paris : {{ $totalPoint }}
    </h3>
    <div
        class="relative mt-10 w-full rounded-lg border border-transparent bg-blue-600 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white">
        <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        </svg>
        <h5 class="mb-1 font-medium leading-none tracking-tight">Informations</h5>
        <p>Un paris gagné vous donne 10 points alors qu'un paris perdu vous retranche cinq points</p>
    </div>
    <h3 class="my-4 text-xl font-extrabold md:text-4xl dark:text-white">Détails des paris effectués : </h3>
    @if ($matchWins->count() > 0 || $matchLoose->count() > 0 || $awaiting->count() > 0)
        <div class="px-6">
            @if ($matchWins->count() > 0)
                <h5 class="my-4 text-xl font-extrabold md:text-2xl dark:text-white">Paris gagnés : </h5>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead>
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Date du paris
                                            </th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 1</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 2</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Score</th>
                                            <th class="px-5 py-3 text-xs font-medium text-center uppercase">Option
                                                choisie
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200">
                                        @foreach ($matchWins as $item)
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                                    {{ $item->created_at }} </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    {{ getName($item->first_team) }}</td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    {{ getName($item->second_team) }}
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    <span>{{ $item->first_team_score }}</span> <span>:</span>
                                                    <span>{{ $item->second_team_score }}</span>
                                                </td>
                                                <td class="px-5 py-4 text-sm font-medium text-center whitespace-nowrap">
                                                    {{ $item->bet }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($matchLoose->count() > 0)
                <h5 class="my-4 text-xl font-extrabold md:text-2xl dark:text-white">Paris perdus : </h5>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead>
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Date du paris
                                            </th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 1</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 2</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Score</th>
                                            <th class="px-5 py-3 text-xs font-medium text-center uppercase">Option
                                                choisie
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200">
                                        @foreach ($matchLoose as $item)
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                                    {{ $item->created_at }} </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    {{ getName($item->first_team) }}</td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    {{ getName($item->second_team) }}
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    <span>{{ $item->first_team_score }}</span> <span>:</span>
                                                    <span>{{ $item->second_team_score }}</span>
                                                </td>
                                                <td class="px-5 py-4 text-sm font-medium text-center whitespace-nowrap">
                                                    {{ $item->bet }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($awaiting->count() > 0)
                <h5 class="my-4 text-xl font-extrabold md:text-2xl dark:text-white">Paris en cours : </h5>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead>
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Date du paris
                                            </th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 1</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 2</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Score</th>
                                            <th class="px-5 py-3 text-xs font-medium text-center uppercase">Option
                                                choisie
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200">
                                        @foreach ($awaiting as $item)
                                            <tr class="text-neutral-800">
                                                <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                                    {{ $item->created_at }} </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    {{ getName($item->first_team) }}</td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    {{ getName($item->second_team) }}
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    <span>{{ $item->first_team_score }}</span> <span>:</span>
                                                    <span>{{ $item->second_team_score }}</span>
                                                </td>
                                                <td class="px-5 py-4 text-sm font-medium text-center whitespace-nowrap">
                                                    {{ $item->bet }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
