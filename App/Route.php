<?php

namespace App;
use MF\Init\Bootstrap;

class Route extends Bootstrap {

    protected function initRoutes() {
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        );

        $routes['deletar'] = array(
            'route' => '/deletar',
            'controller' => 'IndexController',
            'action' => 'deletar'
        );

        $routes['inserir_form'] = array(
            'route' => '/inserir_form',
            'controller' => 'IndexController',
            'action' => 'inserir_form'
        );

        $routes['inserir'] = array(
            'route' => '/inserir',
            'controller' => 'IndexController',
            'action' => 'inserir'
        );
        
        $routes['editar_form'] = array(
            'route' => '/editar_form',
            'controller' => 'IndexController',
            'action' => 'editar_form'
        );

        $routes['editar'] = array(
            'route' => '/editar',
            'controller' => 'IndexController',
            'action' => 'editar'
        ); 

        $routes['busca'] = array(
            'route' => '/busca',
            'controller' => 'IndexController',
            'action' => 'busca'
        );
        
        $routes['detalhes'] = array(
            'route' => '/detalhes',
            'controller' => 'IndexController',
            'action' => 'detalhes'
        );        

        $routes['exportar'] = array(
            'route' => '/exportar',
            'controller' => 'IndexController',
            'action' => 'exportar'
        );       

        $this->setRoutes($routes);
    }

}

?>