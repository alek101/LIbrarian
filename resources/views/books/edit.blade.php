<x-app-layout>
    <form method="POST" action="{{ route('books.update',['book' => $book->id]) }}">
        @csrf
        @method('PATCH')

        <x-text-input id="author_id" class="block mt-1 w-full" type="hidden" name="author_id" :value="$book->author_id" />
        <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$book->title" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- isbn -->
        <div>
            <x-input-label for="isbn" :value="__('ISBN')" />
            <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn" :value="$book->isbn" required autofocus autocomplete="isbn" />
            <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="block mt-1 w-full" name="description" required autofocus autocomplete="isbn" >{{$book->description}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
