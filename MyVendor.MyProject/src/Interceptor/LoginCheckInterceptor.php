<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Interceptor;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

final class LoginCheckInterceptor implements MethodInterceptor
{
    public function invoke(MethodInvocation $invocation)
    {
        // TODO: Check login

        return $invocation->proceed();
    }
}
