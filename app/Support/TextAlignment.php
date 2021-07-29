<?php

namespace App\Support;

class TextAlignment
{
	public string $align;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $align = "left")
    {
        $this->align = $align;
    }

    public function className(): string
    {
        return [
            'left' => 'text-left',
            'right' => 'text-right',
            'center' => 'text-center',
        ][$this->align];
    }
}
