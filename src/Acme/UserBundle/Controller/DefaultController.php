<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Acme\UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$name = 'zhanglei';
        return $this->render('AcmeUserBundle:Default:index.html.twig', array('name' => $name));
    }

	public function listAction(){
		$repository = $this->getDoctrine()->getRepository("AcmeUserBundle:User");
        $lists = $repository->getUserLists();
        return $this->render('AcmeUserBundle:Default:lists.html.twig', array('lists' => $lists));
	}

	public function infoAction(){
        $request = $this->getRequest();
        $name = $request->get('name');
		$user = $this->getDoctrine()->getRepository('AcmeUserBundle:User')->findOneBy(array('username' => $name));
		print_r($user);die;
	}

	public function registerAction(){
		$user = new User();
		$user->setUsername('symfony');
		$user->setPassword(md5('symfony'));
		$user->setSex('1');
		$user->setEmail('zhanglei19881228@sina.com');
		$user_em = $this->getDoctrine()->getEntityManager();
		$user_em->persist($user);
		$user_em->flush();
	}
}
