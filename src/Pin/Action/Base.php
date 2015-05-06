<?php
namespace Valorin\PinPusher\Pin\Action;

use Valorin\PinPusher\Generator;

abstract class Base
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
