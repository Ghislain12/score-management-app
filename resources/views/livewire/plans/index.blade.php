<div>
    <div
        class="relative xl:w-7/12 mx-auto min-h-screen bg-center sm:flex sm:justify-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
        <div class="px-6 mx-auto w-full lg:px-8">
            <div class="flex flex-col mt-4">
                @if ($matchs->count() > 0)
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-neutral-200 ">
                                    <thead>
                                        <tr class="text-neutral-500">
                                            <th class="px-5 py-3 text-xs font-medium text-center uppercase">Equipe 1</th>
                                            <th></th>
                                            <th class="px-5 py-3 text-xs font-medium text-center uppercase">Equipe 2</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Arbitre de la
                                                rencontre</th>
                                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Date de la
                                                rencontre
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
                                                        class="rounded-full h-10 w-10 mx-auto">
                                                    <br>
                                                    <p class="text-center">{{ $match->firstTeam->name }}</p>
                                                </td>
                                                <td>vs</td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    <img src="{{ $match->secondteam->picture }}" alt="logo"
                                                        class="rounded-full h-10 w-10 mx-auto">
                                                    <br>
                                                    <p class="text-center">{{ $match->secondteam->name }}</p>
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $match->arbitrator }}
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $match->start_date }}
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap flex justify-end">
                                                    <button wire:click="modalData('{{ $match->id }}')"
                                                        data-modal-target="staticModal" data-modal-toggle="staticModal"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Parier
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $matchs->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        <h5 class="mb-1 font-medium leading-none tracking-tight text-center">Aucun match programmé</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" wire:ignore
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $name }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="staticModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its
                        citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25
                        and is
                        meant to ensure a common set of data rights in the European Union. It requires organizations to
                        notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="staticModal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="staticModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>
    {{-- @livewire('bet.index', ['id' => $matchId]) --}}
</div>
