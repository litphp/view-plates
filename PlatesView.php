<?php

declare(strict_types=1);

namespace Lit\View\Plates;

use League\Plates\Engine;
use Lit\Air\Configurator as C;
use Lit\Voltage\AbstractView;
use Psr\Http\Message\ResponseInterface;

class PlatesView extends AbstractView
{
    /**
     * @var Engine
     */
    protected $engine;
    /**
     * @var string
     */
    protected $name;

    public function __construct(Engine $engine, string $name)
    {
        $this->engine = $engine;
        $this->name = $name;
    }

    public static function configuration(array $engineParams)
    {
        return [
            PlatesViewFactory::class => C::provideParameter([
                C::alias(PlatesViewFactory::class, Engine::class)
            ]),
            C::join(PlatesViewFactory::class, Engine::class) => C::instance(Engine::class, $engineParams),
        ];
    }

    public function render(array $data = []): ResponseInterface
    {
        $body = $this->getEmptyBody();
        $body->write($this->engine->render($this->name, $data));

        return $this->response;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }
}
