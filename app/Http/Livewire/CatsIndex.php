<?php

namespace App\Http\Livewire;

use Kilobyteno\Sureflap\Exceptions\SureflapAPIException;
use Kilobyteno\Sureflap\Sureflap;
use Livewire\Component;

class CatsIndex extends Component
{
    public array $pets;

    public function mount(): void
    {
        $this->pets = [];
    }

    public function loadData(): void
    {
        $this->pets = Sureflap::getPets();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.cats-index')->layout('layouts.guest');
    }
}
