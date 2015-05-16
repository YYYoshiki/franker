<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_homepage' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_index' => array (  0 =>   array (    0 => 'common_id',  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'common_id',    ),    1 =>     array (      0 => 'text',      1 => '/room',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_pc' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::pcAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/pc',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_classTop' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::classTopAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/class_top',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_getComment' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::getCommentAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/get_comment',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_setComment' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::setCommentAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/set_comment',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_top' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::topAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/top',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_createclass' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::createclassAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/createclass',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_setCreateclass' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::setCreateclassAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/set_createclass',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_getCreateclass' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::getCreateclassAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/get_createclass',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_menu' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::menuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/menu',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_deleteclass' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::deleteclassAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/deleteclass',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'chat_chat_roomdelete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Chat\\ChatBundle\\Controller\\ChatController::roomdeleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/roomdelete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/admin',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
