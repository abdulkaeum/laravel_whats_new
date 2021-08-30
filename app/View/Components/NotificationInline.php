<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationInline extends Component
{
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($description)
    {
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
<div {{ $attributes(['class' => 'bg-blue-400 text-white']) }}>
    {{ $description }}
</div>
blade;
    }
}
