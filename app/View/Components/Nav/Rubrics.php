<?php

namespace App\View\Components\Nav;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rubrics extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $website = request()->tenant;

        $rubrics = $website->rubrics->where('is_publish', true)->take(10);

        return view('components.nav.rubrics', compact('rubrics'));
    }
}
