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

    public $user;
    public function render()
    {
        return view('livewire.clues-table', ['clues' => Clue::where('user_id', '=', $this->user)->paginate(2), 'users' => User::all()]);
    }
}
