<div class="w-full px-6 mx-auto mt-4 max-w-7xl lg:px-8 md:w-7/12">
    @if ($match)
        <div class="py-4 border shadow-sm">
            <div class="flex items-center justify-between px-4 xl:px-60">
                <div class="flex-col items-center justify-center">
                    <img src="{{ $match->firstTeam->picture }}" alt="logo" class="w-20 h-20 rounded-full">
                    <a href="{{ route('teams:show', ['team' => $match->firstTeam->id]) }}">
                        <h3
                            class="max-w-5xl mx-auto mt-4 mb-6 text-xl font-extrabold leading-none tracking-normal text-center text-gray-900 md:tracking-tight">
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">{{ $match->firstTeam->name }}</span>
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
                    <img src="{{ $match->secondTeam->picture }}" alt="logo" class="w-20 h-20 rounded-full">
                    <a href="{{ route('teams:show', ['team' => $match->secondTeam->id]) }}">
                        <h3
                            class="max-w-5xl mx-auto mt-4 mb-6 text-xl font-extrabold leading-none tracking-normal text-center text-gray-900 md:tracking-tight">
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 via-blue-500 to-purple-500 lg:inline">{{ $match->secondTeam->name }}</span>
                        </h3>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-4 font-bold">
                <span>{{ $match->first_team_score }}</span><span>:</span><span>{{ $match->second_team_score }}</span>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <h3 class="my-4 text-xl font-extrabold md:text-4xl dark:text-white">Détail du match</h3>
            <button type="button" wire:click="closeMatch('{{ $match->id }}')"
                class="inline-flex items-center justify-center h-10 px-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 bg-red-600 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-700 focus:shadow-outline focus:outline-none">
                Fin du match
            </button>
        </div>
        <div class="border shadow-sm py-4 mt-4 max-h-[45vh] overflow-auto  px-10">
            <ol class="relative border-l border-gray-200 dark:border-gray-700">
                @if ($match->event->count() > 0)
                    @foreach ($match->event as $detail)
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
                        class="relative md:w-5/12 w-full mx-auto rounded-lg border border-transparent bg-yellow-50 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-yellow-600 mt-5">
                        <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
        <h3 class="my-4 text-xl font-extrabold md:text-4xl dark:text-white">Ajouter un détail</h3>
        <div class="px-4 py-4 mt-4 border shadow-sm">
            <form wire:submit='saveDetail()' x-data="{ goal: false }">
                <div class="relative w-full mt-10 space-y-8">
                    <div class="relative">
                        <label class="font-medium text-gray-900">Titre</label>
                        <input type="text" wire:model.live='title'
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                            data-primary="blue-600" data-rounded="rounded-lg" placeholder="Entrer le titre" />
                        @error('title')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label class="font-medium text-gray-900">Détail</label>
                        <textarea x-data="{
                            resize() {
                                $el.style.height = '0px';
                                $el.style.height = $el.scrollHeight + 'px'
                            }
                        }" x-init="resize()" @input="resize()" type="text" wire:model.live='content'
                            placeholder="Taper votre le contenu de votre détail ici"
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"></textarea>
                        @error('content')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                            <input x-model='goal' wire:model.live="goal" id="goal" type="checkbox"
                                value="true"
                                class="w-4 h-4 rounded border-neutral-300 bg-neutral-50 focus:ring-3 focus:ring-blue-300">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="goal" class="text-neutral-900">Nouveau but</label>
                        </div>
                    </div>
                    @error('goal')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="relative" x-show='goal'>
                        <label for="scorerTeam" class="font-medium text-gray-900">Equipe ayant marqué</label>
                        <select
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                            data-primary="blue-600" data-rounded="rounded-lg" wire:model='scorerTeam' id="scorerTeam">
                            <option value="" hidden>Veuillez sélectionner une équipe</option>
                            <option value="{{ $match->firstTeam->id }}">{{ $match->firstTeam->name }}</option>
                            <option value="{{ $match->secondTeam->id }}">{{ $match->secondTeam->name }}</option>
                        </select>
                        @error('scorerTeam')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <button type="submit"
                            class="inline-block px-5 py-2 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg md:w-2/12 hover:bg-blue-700 ease"
                            data-primary="blue-600" data-rounded="rounded-lg">Ajouter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div
            class="relative text-center mx-auto md:w-4/12 rounded-lg border border-transparent bg-red-600 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white">
            <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
            <h5 class="mb-1 font-medium leading-none tracking-tight">Aucun match en cours</h5>
        </div>
    @endif
</div>
