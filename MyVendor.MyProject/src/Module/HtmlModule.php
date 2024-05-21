<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Package\AbstractAppModule;
use MyVendor\MyProject\TemplateEngine\QiqCustomHelpers;
use MyVendor\MyProject\TemplateEngine\QiqModule;
use MyVendor\MyProject\TemplateEngine\QiqProdModule;
use Qiq\Helpers;

final class HtmlModule extends AbstractAppModule
{
    protected function configure(): void
    {
        $appDir = $this->appMeta->appDir;
        $tmpDir = $this->appMeta->tmpDir;

        $this->bind(QiqCustomHelpers::class);
        $this->bind(Helpers::class)->to(QiqCustomHelpers::class);

        $this->install(new QiqModule([$appDir . '/var/qiq']));
        $this->install(new QiqProdModule($tmpDir . '/qiq'));
    }
}
