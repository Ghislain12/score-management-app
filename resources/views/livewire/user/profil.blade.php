<div class="w-full px-6 mx-auto mt-4 space-y-8 max-w-7xl lg:px-8 md:w-7/12">
    <h3 class="my-4 text-xl font-extrabold md:text-4xl dark:text-white">Total des points de paris : {{ $totalPoint }}
    </h3>
    <h3 class="my-4 text-xl font-extrabold md:text-4xl dark:text-white">Détails des paris effectués : </h3>
    <div class="px-6">
        <h5 class="my-4 text-xl font-extrabold md:text-2xl dark:text-white">Paris gagnés : </h5>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead>
                                <tr class="text-neutral-500">
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Date du paris</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 1</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 2</th>
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">Option choisie</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Richard Hendricks</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">30</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">Pied Piper HQ, Palo Alto</td>
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Erlich Bachman</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">40</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">5230 Penfield Ave, Woodland Hills
                                    </td>
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
