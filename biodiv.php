<?php

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Router\ApiRouter;
use Joomla\Router\Route;

class PlgWebservicesBiodiv extends CMSPlugin
{
    public function onBeforeApiRoute(&$router)
    {
        // $router->createCRUDRoutes('v1/biodiv/user', 'user', ['component' => 'com_biodiv', 'public' => true ]);
		// $router->createCRUDRoutes('v1/biodiv/classify', 'classify', ['component' => 'com_biodiv']);
        // $router->createCRUDRoutes('v1/biodiv/analysis', 'analysis ', ['component' => 'com_biodiv']);
		
		$defaults    = [
            'component'  => 'com_biodiv',
            'public' => true
			// ,
            // 'format' => [
                // 'application/json'
            // ]
        ];
		
		
        $routes = [
            //new Route(['GET'], $baseName, $controller . '.displayList', [], $getDefaults),
            new Route(['GET'], 'biodiv/user/:id', 'user.displayItem', ['id' => '(\d+)'], $defaults),
			new Route(['POST'], 'biodiv/user', 'user.add', [], $defaults),
			new Route(['POST'], 'biodiv/classify', 'classify.add', [], $defaults),
			new Route(['POST'], 'biodiv/analysis/:type', 'analysis.add', ['type' => '(\w+)'], $defaults),
			
			new Route(['GET'], 'v1/biodiv/user/:id', 'user.displayItem', ['id' => '(\d+)'], $defaults),
			new Route(['POST'], 'v1/biodiv/user', 'user.add', [], $defaults),
			new Route(['POST'], 'v1/biodiv/classify', 'classify.add', [], $defaults),
			new Route(['POST'], 'v1/biodiv/analysis/:type', 'analysis.add', ['type' => '(\w+)'], $defaults),
			
			

            // new Route(['POST'], $baseName, $controller . '.add', [], $defaults),
            // new Route(['PATCH'], $baseName . '/:id', $controller . '.edit', ['id' => '(\d+)'], $defaults),
            // new Route(['DELETE'], $baseName . '/:id', $controller . '.delete', ['id' => '(\d+)'], $defaults),
        ];

        $router->addRoutes($routes);


    }
	
	
	
}

?>