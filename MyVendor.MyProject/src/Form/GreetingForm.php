<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Form;

use Ray\WebFormModule\AbstractForm;

final class GreetingForm extends AbstractForm
{
    public function init(): void
    {
        // set input fields
        $this->setField('name', 'text')
            ->setAttribs([
                'id' => 'name'
            ]);
        // set rules and user defined error message
        $this->filter->validate('name')->is('alnum');
        $this->filter->useFieldMessage('name', 'Name must be alphabetic only.');
    }
}
