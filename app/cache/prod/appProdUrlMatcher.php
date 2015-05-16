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

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        // chat_chat_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_chat_homepage')), array (  '_controller' => 'Chat\\ChatBundle\\Controller\\DefaultController::indexAction',));
        }

        // chat_chat_index
        if (0 === strpos($pathinfo, '/room') && preg_match('#^/room/(?P<common_id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_chat_index')), array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::indexAction',));
        }

        // chat_chat_pc
        if ($pathinfo === '/pc') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::pcAction',  '_route' => 'chat_chat_pc',);
        }

        // chat_chat_classTop
        if ($pathinfo === '/class_top') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::classTopAction',  '_route' => 'chat_chat_classTop',);
        }

        // chat_chat_getComment
        if ($pathinfo === '/get_comment') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::getCommentAction',  '_route' => 'chat_chat_getComment',);
        }

        // chat_chat_setComment
        if ($pathinfo === '/set_comment') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::setCommentAction',  '_route' => 'chat_chat_setComment',);
        }

        // chat_chat_top
        if ($pathinfo === '/top') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::topAction',  '_route' => 'chat_chat_top',);
        }

        // chat_chat_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::loginAction',  '_route' => 'chat_chat_login',);
        }

        // chat_chat_createclass
        if ($pathinfo === '/admin/createclass') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::createclassAction',  '_route' => 'chat_chat_createclass',);
        }

        // chat_chat_setCreateclass
        if ($pathinfo === '/set_createclass') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::setCreateclassAction',  '_route' => 'chat_chat_setCreateclass',);
        }

        // chat_chat_getCreateclass
        if ($pathinfo === '/get_createclass') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::getCreateclassAction',  '_route' => 'chat_chat_getCreateclass',);
        }

        // chat_chat_menu
        if ($pathinfo === '/menu') {
            return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::menuAction',  '_route' => 'chat_chat_menu',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // chat_chat_deleteclass
            if ($pathinfo === '/admin/deleteclass') {
                return array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::deleteclassAction',  '_route' => 'chat_chat_deleteclass',);
            }

            // chat_chat_roomdelete
            if (preg_match('#^/admin/(?P<id>[^/]++)/roomdelete$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat_chat_roomdelete')), array (  '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::roomdeleteAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
