<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\ResourceObject;
use MyVendor\MyProject\InputQuery\IndexInput;
use Ray\InputQuery\Attribute\Input;

class Index2 extends ResourceObject
{
    /** @var array{greeting: string} */
    public $body;

    public function onGet(#[Input] IndexInput $input): static
    {
        $this->body = [
            'greeting' => 'Hello ' . $input->name,
        ];

        return $this;
    }
}
