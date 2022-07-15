<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiterTool extends Component
{
    public $volume;
    public $totalprice;
    public $width;
    public $depth;
    public $length;
    public $price;

    public $rules = [
        'width' => [
            'required',
            'numeric',
            'min:1',
        ],
        'length' => [
            'required',
            'numeric',
            'min:1',
        ],
        'depth' => [
            'required',
            'numeric',
            'min:1',
        ],
        'price' => [
            'required',
            'numeric',
            'min:0.1',
            'max:10'
        ],
    ];

    public function mount()
    {
        $this->fill([
            'inputs' => collect([['price' => '0.7']]),
        ]);
    }

    public function calculate() {
        $this->validate();
        $this->volume = ($this->width * $this->length * $this->depth) / 1000;
        $this->totalprice = ($this->volume * $this->price);
    }

    public function updated()
    {
        $validation = $this->validate();
        if($validation) {
            $this->calculate();
        }
    }

    public function render()
    {
        return view('livewire.liter-tool')->layout('layouts.guest');
    }
}
