<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\MediaQuery\DbQueryConfig;
use Ray\MediaQuery\MediaQueryModule;
use Ray\MediaQuery\Queries;

use function dirname;

class AppModule extends AbstractAppModule
{
    protected function configure(): void
    {
        (new Dotenv())->load(dirname(__DIR__, 2));
        $this->install(new PackageModule());

        $appDir = $this->appMeta->appDir;

        $this->install(
            new MediaQueryModule(
                Queries::fromDir($appDir . '/src/Query'),
                [new DbQueryConfig($appDir . '/var/sql')],
            ),
        );
        $this->install(new AuraSqlModule('sqlite:' . $appDir . '/var/db/db.sqlite3', '', ''));
    }
}
