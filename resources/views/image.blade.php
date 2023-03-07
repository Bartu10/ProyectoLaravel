
<tr>
    <td><a href="{{route('showOne', ['id'=>$image->id])}}"><img src="{{ $image->imagen_path }}"></a></td>
    <td>
        <h3>{{ $image->description }}</h3>
        <p>Likes: {{ $image->numeroLikes() }} Comentarios: {{ $image->numeroComentarios() }}</p>
        @foreach($comments as $comment)
            @if($image->id == $comment->imagen_id)
                <img style="height: 20px" src="{{$comment->user->rutafoto}}">
        {{$comment->user->name}}
        {{$comment->content}}<br>
                <form method="POST" action="{{ route('delete', ['id'=>$comment->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        @endforeach


        <section>

            <form method="POST" action="{{ route('store',['id'=> $image->id]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div>
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tu comentario</label>
                    <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Añade tu comentario aquí"></textarea>
                    div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Añadir') }}</x-primary-button>
                </div>
            </form>
        </section>
    </td>
</tr>
