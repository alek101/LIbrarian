<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Autori') }}

                    <p><a href="{{route('authors.create')}}">Create</a></p>

                    <table>
                        <tr>
                            {{-- <th>Id</th> --}}
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($authors as $author)
                            <tr>
                                {{-- <td>{{$author->id}}</td> --}}
                                <td>{{$author->name}}</td>
                                <td>{{$author->surname}}</td>
                                <td>
                                    <a href="{{route('authors.edit', $author->id)}}">Edit</a>
                                    <form method="POST" action="{{route('authors.destroy', $author->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $authors->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



