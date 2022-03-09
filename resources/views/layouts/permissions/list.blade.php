<table class="table-auto w-full"> 
    <thead>
        <tr class="bg-indigo-600 text-white">
            <th class="px-4 py-2">name</th>
            <th class="px-4 py-2">route</th>
            <th class="px-4 py-2">description</th>
            <th class="px-4 py-2">
                <button wire:click="create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4">New Permission</button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $registry)
            <tr>
                <td class="border px-4 py-2">{{$registry->name}}</td>
                <td class="border px-4 py-2">{{$registry->route}}</td>
                <td class="border px-4 py-2">{{$registry->description}}</td>
                <td class="border px-4 py-2 text-center">
                    <button title="Edit" wire:click="edit({{$registry->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">&#9997;</button>
                    <button title="Delete" wire:click="destroy({{$registry->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">&#9940;</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>