<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;

use MyVendor\MyProject\Form\GreetingForm;
use Ray\WebFormModule\AuraInputModule;

use Ray\WebFormModule\FormInterface;

use function dirname;

class AppModule extends AbstractAppModule
{
    protected function configure(): void
    {
        (new Dotenv())->load(dirname(__DIR__, 2));
        $this->install(new PackageModule());

        $this->install(new AuraInputModule());

        $this->bind(FormInterface::class)->annotatedWith('greeting_form')->to(GreetingForm::class);
    }
}
