<div
    class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
    <div class="px-6 mx-auto max-w-8xl lg:px-8">
        <div class="flex flex-col mt-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead>
                                <tr class="text-neutral-500">
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 1</th>
                                    <th></th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Equipe 2</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Arbitre de la
                                        rencontre</th>
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">Date de la rencontre
                                    </th>
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @foreach ($matchs as $match)
                                    <tr class="text-neutral-800">
                                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                            <img src="{{ $match->firstTeam->picture }}" alt="logo"
                                                class="rounded-full h-10 w-10">
                                            <br>
                                            <p>{{ $match->firstTeam->name }}</p>
                                        </td>
                                        <td>vs</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">
                                            <img src="{{ $match->secondteam->picture }}" alt="logo"
                                                class="rounded-full h-10 w-10">
                                            <br>
                                            <p>{{ $match->secondteam->name }}</p>
                                        </td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $match->arbitrator }}</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $match->start_date }}</td>
                                        <td class="px-5 py-4 text-sm whitespace-nowrap"><button
                                                data-modal-target="staticModal" data-modal-toggle="staticModal"
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Toggle modal
                                            </button></td>
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
