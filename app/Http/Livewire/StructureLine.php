<?php

namespace App\Http\Livewire;
use App\Models\Line;
use App\Models\Structure;
use Livewire\Component;

class StructureLine extends Component
{
    public $structures;
    public $lines;
    public $selectedStructure =null;
    public $selectedState = null;
    public function mount($selectedLine=null){
        $this->structures = Structure::all();
        $this->lines=collect();
        $this->selectedLine = $selectedLine;

        if (!is_null($selectedLine)) {
                $line = Line::with('structure')->find($selectedLine);
                if ($line) {
                    $this->lines = Line::where('structure_id', $line->structure_id)->get();
                    $this->selectedStructure = $line->structure_id;
                }
             }
    }
    public function render()
    {
        return view('livewire.structure-line');
    }

     public function updatedSelectedStructure($structure)
     {
         $this->lines = Line::where('structure_id', $structure)->get();
         $this->selectedLine = NULL;
        }
}
