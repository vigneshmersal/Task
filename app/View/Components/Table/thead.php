<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;
use App\Support\TextAlignment;

class thead extends Component
{
    public array $headers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $headers)
    {
        $this->headers = $this->formatHeaders($headers);
    }

    private function formatHeaders($headers): array
    {
        return array_map(function ($header) {
            return [
                'name' => is_array($header) ? $header['name'] : $header,
                'classes' => (new TextAlignment($header['align'] ?? 'left'))->className(),
            ];
        }, $headers);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.thead');
    }
}
