<?php

declare(strict_types=1);

namespace MyVendor\MyProject\TemplateEngine;

use Qiq\Helper\Html\HtmlHelpers;

class QiqCustomHelpers extends HtmlHelpers
{
    public function hello(): string
    {
        return 'Hello World! by Helper';
    }
}
