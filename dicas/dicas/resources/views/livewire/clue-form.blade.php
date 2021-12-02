<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 sm:pt-0">
        <h1 class="text-3xl text-gray-900 font-semibold">{{ $title }}</h1>
    </div>

    <div class="mt-8 bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <form wire:submit.prevent="submit" method="{{ $method }}">

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-gray-200 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="clue" class="block text-sm font-medium text-gray-700">Dica</label>
                            <input type="text" wire:model="clue" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('clue')<span class="text-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Veículo</label>
                            <select wire:model="type" class="block appearance-none w-full bg-gray-300 border border-gray-400 text-gray-800 py-3 px-4 pr-0 rounded leading-tight focus:outline-none">
                                <option value="" selected>Todos</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                                @endforeach
                            </select>
                            @error('type')<span class="text-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-span-6">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Marca</label>
                            <select wire:model="brand" class="block appearance-none w-full bg-gray-300 border border-gray-400 text-gray-800 py-3 px-4 pr-0 rounded leading-tight focus:outline-none">
                                <option value="" selected>Todos</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->description }}</option>
                                @endforeach
                            </select>
                            @error('brand')<span class="text-error">{{ $message }}</span>@enderror
                        </div>



                        <div class="col-span-6">
                            <label for="vehiclemodel" class="block text-sm font-medium text-gray-700">Modelo</label>
                            <select wire:model="vehiclemodel" class="block appearance-none w-full bg-gray-300 border border-gray-400 text-gray-800 py-3 px-4 pr-0 rounded leading-tight focus:outline-none">
                                <option value="" selected>Todos</option>
                                @foreach($vehiclemodels as $vehiclemodel)
                                    <option value="{{ $vehiclemodel->id }}">{{ $vehiclemodel->description }}</option>
                                @endforeach
                            </select>
                            @error('vehiclemodel')<span class="text-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Versão</label>
                            <select wire:model="version" class="block appearance-none w-full bg-gray-300 border border-gray-400 text-gray-800 py-3 px-4 pr-0 rounded leading-tight focus:outline-none">
                                <option value="" selected>Todos</option>
                                @foreach($versions as $version)
                                    <option value="{{ $version->id }}">{{ $version->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>

