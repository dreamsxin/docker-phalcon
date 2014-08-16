<?php

error_reporting(E_ALL);

try {
	/**
	 * Read the configuration
	 */
	$config = new \Phalcon\Config(array(
		'application' => array(
			'controllersDir' => __DIR__ . '/../app/controllers/',
			'modelsDir' => __DIR__ . '/../app/models/',
			'viewsDir' => __DIR__ . '/../app/views/',
			'baseUri' => '/'
		)
	));

	$loader = new \Phalcon\Loader();

	/**
	 * We're a registering a set of directories taken from the configuration file
	 */
	$loader->registerDirs(
			array(
				$config->application->controllersDir,
				$config->application->modelsDir
			)
	)->register();

	/**
	 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
	 */
	$di = new Phalcon\DI\FactoryDefault();

	$di->set('url', function() use ($config) {
		$url = new Phalcon\Mvc\Url();
		$url->setBaseUri($config->application->baseUri);
		return $url;
	}, true);

	$di->set('view', function() use ($config) {
		$view = new Phalcon\Mvc\View();
		$view->setViewsDir($config->application->viewsDir);
		return $view;
	}, true);

	$di->set('session', function() {
		$session = new Phalcon\Session\Adapter\Files();
		$session->start();
		return $session;
	});

	$application = new \Phalcon\Mvc\Application();
	$application->setDI($di);
	echo $application->handle()->getContent();
} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e) {
	echo $e->getMessage();
}
