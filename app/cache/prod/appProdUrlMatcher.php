<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // acme_main_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'acme_main_homepage');
            }

            return array (  '_controller' => 'Acme\\MainBundle\\Controller\\DefaultController::indexAction',  '_route' => 'acme_main_homepage',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            // acme_user_homepage
            if ($pathinfo === '/user') {
                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\DefaultController::indexAction',  '_route' => 'acme_user_homepage',);
            }

            // acme_user_list
            if (0 === strpos($pathinfo, '/user/list') && preg_match('#^/user/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_user_list')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\DefaultController::listAction',  'page' => 1,));
            }

            // acme_user_user
            if (0 === strpos($pathinfo, '/user/info') && preg_match('#^/user/info/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_user_user')), array (  '_controller' => 'Acme\\UserBundle\\Controller\\DefaultController::infoAction',));
            }

            // acme_user_register
            if ($pathinfo === '/user/register') {
                return array (  '_controller' => 'Acme\\UserBundle\\Controller\\DefaultController::registerAction',  '_route' => 'acme_user_register',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
