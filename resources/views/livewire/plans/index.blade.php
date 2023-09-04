<div
    class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
    <div class="px-6 mx-auto max-w-8xl lg:px-8">
        <div class="md:flex justify-between items-center mt-4 w-full">

            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date">
            </div>
        </div>
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
