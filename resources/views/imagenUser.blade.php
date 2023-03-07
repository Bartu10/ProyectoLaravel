<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones Propias') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <tbody>
                        
                        @foreach ($images as $image)
                            @if ($image -> user_id == $id)
                                @foreach ($image->comentarios as $comentario)
                                <img src="{{$image->imagen_path}}">
                                <h3>{{$image->description}}</h3>
                                <h4>Comentarios</h4>
                                <h2>{{$comentario->content}}</h2>
        
        
                                @php($x = 0)    
        
                                
                                
                                @endforeach
                            @endif
                        @endforeach



                        
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
