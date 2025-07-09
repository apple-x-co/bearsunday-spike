<?php

declare(strict_types=1);

namespace MyVendor\MyProject\InputQuery;

use Ray\InputQuery\Attribute\Input;

final class IndexInput
{
    public function __construct(
        #[Input] public readonly string $name,
    ) {
    }
}
