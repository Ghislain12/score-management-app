<div>
    <div
        class="relative min-h-screen mx-auto bg-center xl:w-7/12 sm:flex sm:justify-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
        <div class="w-full px-6 mx-auto lg:px-8">
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
                                                        class="w-10 h-10 mx-auto rounded-full">
                                                    <br>
                                                    <p class="text-center">{{ $match->firstTeam->name }}</p>
                                                </td>
                                                <td>vs</td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">
                                                    <img src="{{ $match->secondteam->picture }}" alt="logo"
                                                        class="w-10 h-10 mx-auto rounded-full">
                                                    <br>
                                                    <p class="text-center">{{ $match->secondteam->name }}</p>
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $match->arbitrator }}
                                                </td>
                                                <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $match->start_date }}
                                                </td>
                                                <td class="flex justify-end px-5 py-4 text-sm whitespace-nowrap">
                                                    <button data-modal-target="staticModal"
                                                        data-modal-toggle="staticModal"
                                                        wire:click="modalData('{{ $match->id }}')"
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
        </div>
    </div>
    <div wire:ignore.self id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    @if ($data)
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Parier sur le match {{ $data->firstTeam->name }} vs {{ $data->secondTeam->name }}
                        </h3>
                    @endif
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="staticModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                @if ($data)
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between px-4 xl:px-20">
                            <div class="flex-col items-center justify-center">
                                <img src="{{ $data->firstTeam->picture }}" alt="logo"
                                    class="w-20 h-20 mx-auto rounded-full">
                                <a href="{{ route('teams:show', ['team' => $data->firstTeam->id]) }}">
                                    <h3
                                        class="max-w-5xl mx-auto mt-4 mb-6 text-xl font-extrabold leading-none tracking-normal text-center text-gray-900 md:tracking-tight">
                                        <span
                                            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">{{ $data->firstTeam->name }}</span>
                                    </h3>
                                </a>
                            </div>
                            <div>
                                <h3>
                                    <span
                                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">VS
                                    </span>
                                </h3>
                            </div>
                            <div>
                                <img src="{{ $data->secondTeam->picture }}" alt="logo"
                                    class="w-20 h-20 mx-auto rounded-full">
                                <a href="{{ route('teams:show', ['team' => $data->secondTeam->id]) }}">
                                    <h3
                                        class="max-w-5xl mx-auto mt-4 mb-6 text-xl font-extrabold leading-none tracking-normal text-center text-gray-900 md:tracking-tight">
                                        <span
                                            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">{{ $data->secondTeam->name }}</span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-center">Arbitre : {{ $data->arbitrator }}</h3>
                    </div>
                    <form class="px-8 my-8 space-y-4" wire:submit='saveBet()'>
                        <div class="flex justify-between">
                            <label
                                class="flex items-start p-5 space-x-3 bg-white border rounded-md shadow-sm cursor-pointer hover:bg-gray-50 border-neutral-200/70">
                                <input wire:model='bet' type="radio" name="bet" value="V1"
                                    class="text-gray-900 translate-y-px focus:ring-gray-700" />
                                <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                    <span class="font-semibold">V1</span>
                                </span>
                            </label>
                            <label
                                class="flex items-start p-5 space-x-3 bg-white border rounded-md shadow-sm cursor-pointer hover:bg-gray-50 border-neutral-200/70">
                                <input wire:model='bet' type="radio" name="bet" value="X"
                                    class="text-gray-900 translate-y-px focus:ring-gray-700" />
                                <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                    <span class="font-semibold">X</span>
                                </span>
                            </label>
                            <label
                                class="flex items-start p-5 space-x-3 bg-white border rounded-md shadow-sm cursor-pointer hover:bg-gray-50 border-neutral-200/70">
                                <input wire:model='bet' type="radio" name="bet" value="V2"
                                    class="text-gray-900 translate-y-px focus:ring-gray-700" />
                                <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                    <span class="font-semibold">V2</span>
                                </span>
                            </label>
                        </div>
                        @error('bet')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        @if ($succesMessage)
                            <div
                                class="relative w-full rounded-lg border border-transparent bg-green-500 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white">
                                <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h5 class="mb-1 font-medium leading-none tracking-tight">Message de succès</h5>
                                <div class="text-sm opacity-80">Nouveau parie fait avec succès</div>
                            </div>
                        @endif
                        <div class="flex items-center justify-end">
                            <button data-modal-hide="staticModal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Parier</button>
                        </div>
                    </form>
                @endif
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                    <button data-modal-hide="staticModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
