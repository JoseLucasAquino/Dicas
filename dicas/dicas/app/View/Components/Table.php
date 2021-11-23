<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Type;
use Illuminate\View\Component;

class Table extends Component
{
    public $dataset;
    public $attr;
    public $heads;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($className)
    {
        $className = "App\Models\\$className";
        $entity = new $className();
        $this->attr = $entity->visible;
        $this->heads = $entity->labels;
        $this->dataset = $entity::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
