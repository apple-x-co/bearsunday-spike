<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\App;

use BEAR\Resource\ResourceObject;

class Hello extends ResourceObject
{
    public function onGet(): static
    {
        $this->body['HELLO'] = 'Hello World!';

        return $this;
    }
}
