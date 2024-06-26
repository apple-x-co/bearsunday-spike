<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use function setcookie;
use function time;

final class DeleteCookieInvoker
{
    /** @param array{path: string, domain: string} $params */
    public function __invoke(string $name, array $params): void
    {
        setcookie(
            $name,
            '',
            time() - 42000,
            $params['path'],
            $params['domain']
        );
    }
}
