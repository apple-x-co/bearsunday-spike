<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\ResourceObject;
use MyVendor\MyProject\Annotation\RequiredLogin;
use MyVendor\MyProject\Annotation\Role;

class Index extends ResourceObject
{
    /** @var array{greeting: string} */
    public $body;

    #[RequiredLogin(Role::Users)]
    public function onGet(string $name = 'BEAR.Sunday'): static
    {
        $this->body = [
            'greeting' => 'Hello ' . $name,
        ];

        return $this;
    }
}
