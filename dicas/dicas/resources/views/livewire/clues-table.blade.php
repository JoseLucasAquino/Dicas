<div class="table table-responsive">
    <div class="w-full relative">
        <div class="w-3/6 relative mx-1">
            <select wire:model="user" class="block appearance-none w-full bg-gray-300 border border-gray-400 text-gray-800 py-3 px-4 pr-0 rounded leading-tight focus:outline-none">
                <option value="0" selected>Usuário</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
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
        </thead>
        <tbody>
        @forelse ($clues as $clue)
            <tr>
                <td>{{ $clue->description }}</td>
                <td>{{ $clue->user->name }}</td>
                <td>{{ $clue->type->description }}</td>
                <td>{{ $clue->brand->description }}</td>
                <td>{{ $clue->vehiclemodel->description }}</td>
                <td>{{ $clue->version->description }}</td>
            </tr>
        @empty
            <tr><td>No data records</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $clues->links() }}
</div>
