<?php

declare(strict_types=1);

namespace Lit\View\Plates;

use Lit\Voltage\Interfaces\ViewInterface;

trait PlatesViewBuilderTrait
{
    abstract protected function attachView(ViewInterface $view);
    /**
     * @var PlatesViewFactory
     */
    protected $platesViewFactory;

    public function injectPlatesViewFactory(PlatesViewFactory $platesViewFactory)
    {
        $this->platesViewFactory = $platesViewFactory;
    }

    protected function plates(string $name): PlatesView
    {
        return $this->attachView($this->platesViewFactory->produce($name));
    }
}
