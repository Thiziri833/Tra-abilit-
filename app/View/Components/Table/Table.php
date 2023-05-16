<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public array $headers;
    /**
     * Create a new component instance.
     */
    public function __construct(array $headers)
    {
        //
        $this->headers=$headers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table');
    }
}
