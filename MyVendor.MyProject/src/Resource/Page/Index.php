<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\ResourceObject;
use MyVendor\MyProject\Query\ToDoItemInterface;

class Index extends ResourceObject
{
    public function __construct(
        private readonly ToDoItemInterface $todoItem,
    ) {
    }

    public function onGet(): static
    {
        $todoItem = $this->todoItem->getItem();

        $this->body = [
            'todo' => [
                'id' => $todoItem['id'],
                'title' => $todoItem['title'],
            ],
        ];

        return $this;
    }
}
