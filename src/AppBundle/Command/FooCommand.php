<?php

namespace AppBundle\Command;

use AppBundle\Model\Bar;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FooCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('foo')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        var_dump($this->getValidator()->validate(new Bar()));
    }

    /**
     * @return ValidatorInterface
     */
    private function getValidator()
    {
        return $this->getContainer()->get('validator');
    }
}
