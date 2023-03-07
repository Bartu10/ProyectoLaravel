<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Fotos') }}
        </h2>
    </x-slot>
    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form method="post" action="{{ route('photosCreate') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')



                <div>
                    <x-input-label for="rutafoto" :value="('Imagen')" />
                    <x-text-input id="rutafoto" name="rutafoto" type="file" class="mt-1 block w-full" :value="old('fotoperfil', $user->fotoperfil)" required autofocus autocomplete="imagen" />
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>

                <div>
                    <x-input-label for="description" :value="('Descripcion')" />
                    <x-text-input id="description" name="description" type="textarea" :value="old('nick', $user->nick)" required autofocus autocomplete="Descripcion..." />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>


                <div class="flex items-center gap-4">
                    <x-primary-button>{{ ('Subir') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ ('Publicado') }}</p>
                    @endif
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>