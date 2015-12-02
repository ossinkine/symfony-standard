<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $data = [
            'text'   => 'foo',
            'choice' => 'foo',
        ];
        var_dump($data);
        // array (size=2)
        //   'text' => string 'foo' (length=3)
        //   'choice' => string 'foo' (length=3)
        $form = $this->createForm('test', $data);
        $form->submit(
            [
                'text'   => 'bar',
                'choice' => 'bar',
            ],
            false
        );
        var_dump($form->getData());
        // array (size=2)
        //   'text' => string 'bar' (length=3)
        //   'choice' => string 'foo' (length=3)

        return new Response();
    }
}
