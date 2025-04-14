@extends('layout')

@section('content')
<div class="container mx-auto px-4">
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Nom</th>
                <th class="border border-gray-300 px-4 py-2">Prenom</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Phone</th>
                <th class="border border-gray-300 px-4 py-2">Adresse</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stagiaires as $stagiaire)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stagiaire->nom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stagiaire->prenom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stagiaire->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stagiaire->telephone }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stagiaire->adresse }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('stagiaires.edit', $stagiaire->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
