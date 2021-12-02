<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Clue;
use App\Models\Type;
use App\Models\VehicleModel;
use App\Models\Version;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClueForm extends Component
{
    public $clue;
    public $type;
    public $brand;
    public $vehiclemodel;
    public $version;

    public $title;
    public $method;

    protected $rules = [
        'clue' => 'required|min:10',
        'type' => 'required',
        'brand' => 'required',
        'vehiclemodel' => 'required'
    ];

    protected $messages = [
        'clue.required' => 'O campo \'Dica\' é Obrigatório',
        'clue.min' => 'O campo \'Dica\' deve conter ao menos 10 caracteres',
        'type.required' => 'O campo \'Tipo\' é Obrigatório',
        'brand.required' => 'O campo \'Marca\' é Obrigatório',
        'vehiclemodel.required' => 'O campo \'Modelo\' é Obrigatório'
    ];

    public function submit(){
        $this->validate();

        Clue::create([
            'description' => $this->clue,
            'user_id' => Auth::user()->id,
            'type_id' => $this->type,
            'brand_id' => $this->brand,
            'vehicle_model_id' => $this->vehiclemodel,
            'version_id' => $this->version,
        ]);

        $this->redirect(route('dashboard'));
    }

    public function render()
    {
        $brands = $this->filterBrand();
        $vehiclemodels = $this->filterVehicleModel();
        $versions = $this->filterVersion();
        return view('livewire.clue-form', [
            'types' => Type::all(),
            'brands' => $brands,
            'vehiclemodels' => $vehiclemodels,
            'versions' => $versions,
        ]);
    }

    public function filterBrand(){
        return Brand::query()
            ->when($this->type, function ($query, $type) {
                return $query->join('brand_type', 'brands.id', '=', 'brand_type.brand_id')
                    ->join('types', 'types.id', '=', 'brand_type.type_id')
                    ->select('brands.*')
                    ->where('types.id', '=', $type)
                    ->get();
            });
    }

    public function filterVehicleModel(){
        $query = VehicleModel::query()
            ->when($this->brand, function ($query, $brand){
                return $query->where('brand_id', '=', $brand);
            });
        return $query->get();
    }

    public function filterVersion(){
        return Version::query()
            ->when($this->vehiclemodel, function ($query, $vehiclemodel) {
                return $query->join('vehicle_model_version', 'versions.id', '=', 'vehicle_model_version.version_id')
                    ->join('vehicle_models', 'vehicle_models.id', '=', 'vehicle_model_version.vehicle_model_id')
                    ->select('versions.*')
                    ->where('vehicle_models.id', '=', $vehiclemodel)
                    ->get();
            });
    }

}
