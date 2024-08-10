<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\ResourceObject;

class Apple extends ResourceObject
{
    /** @var array{greeting: string} */
    public $body;

    /** @Embed(rel="hello", src="app://self/hello") */
    public function onGet(): static
    {
        return $this;
    }
}
