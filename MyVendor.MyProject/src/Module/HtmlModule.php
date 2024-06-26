<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Package\AbstractAppModule;
use MyVendor\MyProject\TemplateEngine\QiqCustomHelpers;
use MyVendor\MyProject\TemplateEngine\QiqModule;
use Qiq\Helpers;
use Ray\AuraSessionModule\AuraSessionModule;

final class HtmlModule extends AbstractAppModule
{
    protected function configure(): void
    {
        $appDir = $this->appMeta->appDir;

        $this->install(new AuraSessionModule());

        $this->bind(QiqCustomHelpers::class);
        $this->bind(Helpers::class)->to(QiqCustomHelpers::class);

        $this->install(new QiqModule([$appDir . '/var/qiq']));
    }
}
