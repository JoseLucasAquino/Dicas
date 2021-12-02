<div class="table table-responsive rounded">
    <table class="table table-striped table-hover table-dark">
        <thead>
        <tr>
            <th>Descrição</th>
            <th>Usuário</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Versão</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th>
                <select wire:model="search.type_id" class="block appearance-none w-full bg-gray-300 border border-gray-400 text-gray-800 py-3 px-4 pr-0 rounded leading-tight focus:outline-none">
                    <option value="" selected>Todos</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->description }}</option>
                    @endforeach
                </select>
            </th>
            <th>
                <input type="text" wire:model.debounce.200ms="search.brand" placeholder="Marca" class="form-control">
            </th>
            <th>
                <input type="text" wire:model.debounce.200ms="search.vehiclemodel" placeholder="Modelo" class="form-control">
            </th>
            <th>
                <input type="text" wire:model.debounce.200ms="search.version" placeholder="Versão" class="form-control">
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse ($clues as $clue)
            <tr>
                <td>{{ $clue->description }}</td>
                <td>{{ $clue->user->name }}</td>
                <td>{{ $clue->type->description }}</td>
                <td>{{ $clue->brand->description }}</td>
                <td>{{ $clue->vehiclemodel->description }}</td>
                <td>{{ $clue->version->description ?? '' }}</td>
            </tr>
        @empty
            <tr><td>No data records</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $clues->links() }}
</div>
