<?php

namespace App\View\Components\web\backend\admin;

use Illuminate\View\Component;

class datatable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.backend.admin.datatable');
    }
}
