<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Query;

use Ray\MediaQuery\Annotation\DbQuery;

interface ToDoItemInterface
{
    /** @return array{id: int<1, max>, title: string}|null */
    #[DbQuery('todo_item', type: 'row')]
    public function getItem(): array|null;
}
