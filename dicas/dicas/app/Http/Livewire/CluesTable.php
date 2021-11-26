<?php

namespace App\Http\Livewire;

use App\Models\Clue;
use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CluesTable extends Component
{
    use WithPagination;

    //public $type;
    public $search = ['type_id' => '', 'brand' => '', 'vehiclemodel' => '', 'version' => ''];
    public function render()
    {
        $clues = Clue::query();
        $clues = $this->applySearch($clues);
        return view('livewire.clues-table', [
            'clues' => $clues->paginate(5),
            'types' => Type::all()
        ]);
    }

    public function updateSearch(){
        $this->resetPage();
    }

    public function applySearch($clues){
        $clues = ($this->search['type_id']) ? $clues->where( 'type_id', '=', $this->search['type_id']) : $clues;
        $clues = ($this->search['brand']) ? $clues->select('clues.*', 'brands.description as brand_description')->join('brands', function ($join){
            $join->on('clues.brand_id', '=', 'brands.id')
                ->where('brands.description', 'like', '%'.$this->search['brand'].'%');
        }) : $clues;
        $clues = ($this->search['vehiclemodel']) ? $clues->select('clues.*', 'vehicle_models.id as vehicle_model_description')->join('vehicle_models', function ($join){
            $join->on('vehicle_models.id', '=', 'clues.vehicle_model_id')
                ->where('vehicle_models.description', 'like', '%'.$this->search['vehiclemodel'].'%');
        }) : $clues;
        $clues = ($this->search['version']) ? $clues->select('clues.*', 'versions.id as version_description')->join('versions', function ($join){
            $join->on('versions.id', '=', 'clues.version_id')
                ->where('versions.description', 'like', '%'.$this->search['version'].'%');
        }) : $clues;
        return $clues;
    }
}
