<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Package\AbstractAppModule;
use MyVendor\MyProject\TemplateEngine\QiqModule;
use MyVendor\MyProject\TemplateEngine\QiqProdModule;

final class HtmlModule extends AbstractAppModule
{
    protected function configure(): void
    {
        $appDir = $this->appMeta->appDir;
        $tmpDir = $this->appMeta->tmpDir;

        $this->install(new QiqModule([$appDir . '/var/qiq']));
        $this->install(new QiqProdModule($tmpDir . '/qiq'));
    }
}
