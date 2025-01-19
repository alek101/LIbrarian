<x-app-layout>
    <form method="POST" action="{{ route('authors.update' , ['author' => $author->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$author->name}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div>
            <x-input-label for="surname" :value="__('Surname')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="{{$author->surname}}" required autofocus autocomplete="surname" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>

    <p><a href="{{route('books.create',$author->id)}}">Add book</a></p>

    @foreach ($books as $book)
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{$book->title}}</h5>
                <p class="card-text">{{$book->description}}</p>
                <a href="{{route('books.edit', ['book' => $book->id])}}" class="btn btn-primary">Edit</a>
                {{-- <a href="{{route('books.show', ['book' => $book->id])}}" class="btn btn-primary">Show</a> --}}
                <form method="POST" action="{{route('books.destroy', ['book' => $book->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $books->links() }}
</x-app-layout>
