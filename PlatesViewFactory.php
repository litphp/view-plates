<?php

declare(strict_types=1);

namespace Lit\View\Plates;

use League\Plates\Engine;

class PlatesViewFactory
{
    /**
     * @var Engine
     */
    protected $engine;

    /**
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function produce(string $name): PlatesView
    {
        return new PlatesView($this->engine, $name);
    }
}
