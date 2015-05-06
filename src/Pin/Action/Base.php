<?php
namespace Valorin\PinPusher\Pin\Action;

use Valorin\PinPusher\Generator;
use Valorin\PinPusher\GeneratorInterface;

abstract class Base implements GeneratorInterface
{
    use Generator;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $title;
}
