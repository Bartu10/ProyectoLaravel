<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Imagenes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
                        <tbody>
                        @foreach ($imagens as $image)
                            @if (!str_starts_with($image->imagen_path, "h"))
                                @php( $image->imagen_path = "/storage/imagenes/" . $image->imagen_path )
                            @endif
                            <tr>
                                <td><a href="{{route('showOne', ['id'=>$image->id])}}"><img src="{{ $image->imagen_path }}"></a></td>
                                <td>
                                    <h3>{{ $image->description }}</h3>
                                    <p>Likes: {{ $image->numeroLikes() }} Comentarios: {{ $image->numeroComentarios() }}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
