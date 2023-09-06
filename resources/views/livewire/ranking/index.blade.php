<div class="px-4 xl:w-7/12 mx-auto">
    <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Classement du tournoi</h3>
    <div class="flex justify-end">
        <iframe
            src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2F127.0.0.1%3A8000%2Frankings&layout&size&width=91&height=20&appId"
            width="91" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
        </iframe>
    </div>
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
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                        {{ $i += 1 }}
                                    </td>
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                        <a
                                            href="{{ route('teams:show', ['team' => $item['team_id']]) }}">{{ $item['team_name'] }}</a>
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
    <div
        class="relative w-full rounded-lg border border-transparent bg-blue-600 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white">
        <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        </svg>
        <h5 class="mb-1 font-medium leading-none tracking-tight">Calcul des points</h5>
        <table class="min-w-full divide-y divide-neutral-200">
            <thead>
                <tr class="text-white">
                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Matchs</th>
                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Nul</th>
                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Victoire</th>
                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Défaite</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-200">
                <tr class="text-neutral-800">
                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                        Point
                    </td>
                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                        1
                    </td>
                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                        3
                    </td>
                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                        0
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
