<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use BEAR\Resource\ResourceObject;
use MyVendor\MyProject\Annotation\RequiredLogin;
use MyVendor\MyProject\Interceptor\LoginCheckInterceptor;

use function dirname;

class AppModule extends AbstractAppModule
{
    protected function configure(): void
    {
        (new Dotenv())->load(dirname(__DIR__, 2));
        $this->install(new PackageModule());

        $this->bindInterceptor(
            $this->matcher->subclassesOf(ResourceObject::class),
            $this->matcher->annotatedWith(RequiredLogin::class),
            [LoginCheckInterceptor::class],
        );
    }
}
