<div class="px-2 md:w-6/12">
    <h3 class="md:text-4xl text-xl font-extrabold dark:text-white my-4">Classement du tournoi</h3>
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
                                <tr class="text-neutral-800">
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
