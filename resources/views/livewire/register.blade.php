@section('title', 'Page de connexion')

<div class="mx-2">
    <div class="flex mt-8 border sm:mx-auto sm:w-full sm:max-w-7xl">
        <div
            class="items-center hidden w-6/12 px-4 lg:flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2">
            <img src="{{ asset('asset/undraw_goal_-0-v5v.svg') }}" alt="">
        </div>
        <div class="w-full bg-white lg:w-6/12">
            <form wire:submit='register'
                class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                <h4 class="w-full text-3xl font-bold">Créer un compte</h4>
                <div class="relative w-full mt-10 space-y-8">
                    <div class="relative">
                        <label class="font-medium text-gray-900">Nom complet</label>
                        <input wire:model='name' type="text"
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                            data-primary="blue-600" data-rounded="rounded-lg" placeholder="Nom complet" />
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label class="font-medium text-gray-900">Email</label>
                        <input wire:model='email' type="text"
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                            data-primary="blue-600" data-rounded="rounded-lg" placeholder="Email" />
                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label class="font-medium text-gray-900">Mot de passe</label>
                        <input type="password" wire:model='password'
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                            data-primary="blue-600" data-rounded="rounded-lg" placeholder="Mot de passe" />
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label class="font-medium text-gray-900">Confirmer le mot de passe</label>
                        <input type="password" wire:model='confirmPassword'
                            class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                            data-primary="blue-600" data-rounded="rounded-lg" placeholder="Confirmer le mot de passe" />
                        @error('confirmPassword')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <button type="submit"
                            class="inline-block my-2 w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease"
                            data-primary="blue-600" data-rounded="rounded-lg">Créer un compte</button>
                        <a href="{{ route('login:login') }}" type="submit"
                            class="inline-block my-2 w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease"
                            data-primary="blue-600" data-rounded="rounded-lg">Connexion</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
