<?php

namespace App\View\Components\Project;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $content;
    public $icon;
    public $color;
    public function __construct($content='', $icon='', $color='')
    {
        $this->content = $content;
        $this->color = $color;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project.alert');
    }
}
