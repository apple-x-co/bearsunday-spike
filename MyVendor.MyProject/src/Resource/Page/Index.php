<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\ResourceObject;
use Ray\Di\Di\Named;
use Ray\WebFormModule\Annotation\FormValidation;
use Ray\WebFormModule\FormInterface;

class Index extends ResourceObject
{
    /** @var array{greeting: string} */
    public $body;

    public function __construct(
        #[Named('greeting_form')]
        protected readonly FormInterface $form,
    ) {
         $this->body['form'] = $this->form;
    }

    #[Embed(rel: "hello", src: "app://self/hello")]
    public function onGet(string $name = 'BEAR.Sunday'): static
    {
        $this->body['greeting'] = ['Hello ' . $name];

        return $this;
    }

    /** @FormValidation(onFailure="onPostValidationFailed") */
    public function onPost(string $name): static
    {
        $this->body['_method'] = __METHOD__;

        return $this;
    }

    #[Embed(rel: "hello", src: "app://self/hello")]
    public function onPostValidationFailed(): static
    {
        $this->body['_method'] = __METHOD__;

        return $this;
    }
}
