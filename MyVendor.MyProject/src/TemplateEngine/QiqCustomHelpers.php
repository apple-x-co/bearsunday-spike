<?php

declare(strict_types=1);

namespace MyVendor\MyProject\TemplateEngine;

use MyVendor\MyProject\Query\ToDoItemInterface;
use Qiq\Helper\Html\HtmlHelpers;

class QiqCustomHelpers extends HtmlHelpers
{
    public function __construct(
        private readonly ToDoItemInterface $todoItem,
    ) {
        parent::__construct();
    }

    public function hello(): string
    {
        return 'Hello World! by Helper';
    }

    public function todoItem(): array|null
    {
        return $this->todoItem->getItem();
    }
}
