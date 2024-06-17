<?php

declare(strict_types=1);

namespace MyVendor\MyProject\TemplateEngine;

use Aura\Session\Segment;
use Aura\Session\Session;
use Qiq\Helper\Html\HtmlHelpers;

class QiqCustomHelpers extends HtmlHelpers
{
    public function __construct(
        private readonly Session $session,
    ) {
        parent::__construct();
    }

    public function hello(): string
    {
        return 'Hello World! by Helper';
    }

    private function segment(): Segment
    {
        return $this->session->getSegment('xyz');
    }

    public function getSessionValue(string $key): string|null
    {
        return $this->segment()->get($key);
    }

    public function setSessionValue(string $key, string $value): void
    {
        $this->segment()->set($key, $value);
    }
}
