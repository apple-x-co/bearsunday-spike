<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class RequiredLogin
{
    public function __construct(
        public readonly Role $role,
    ) {
    }
}
