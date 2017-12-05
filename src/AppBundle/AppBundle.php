<?php

namespace AppBundle;

use Acelaya\Doctrine\Type\PhpEnumType;
use AppBundle\Enum\Gender;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function boot()
    {
        PhpEnumType::registerEnumType('php_enum_gender', Gender::class);
    }
}
