<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LinkText extends Component
{
    public $referrer;

    public $target;

    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link, $referrer = false, $target = '_blank')
    {
        $this->link = $link;
        $this->referrer = $referrer ? 'external' : 'noreferrer';
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.link-text');
    }
}
