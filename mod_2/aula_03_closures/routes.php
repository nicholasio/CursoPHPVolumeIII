<?php

class AppRouter {
	private $routes;
	protected $responseStatus = '200 OK';
	protected $responseBody   = "Defalt Body Response";

	public function __construct() {
		$this->routes = [];
	}

	public function add($route, $callback) {
		$this->routes[$route] = $callback->bindTo($this, __CLASS__);
	}

	public function dispatch( $url ) {
		foreach( $this->routes as $route => $callback ) {
			if ( $route == $url ) $callback();
		}

		$this->sendResponse();
	}

	public function sendResponse() {
		header('HTTP/1.1 ' . $this->responseStatus);
		header('Content-length ' . strlen($this->responseBody) );

		echo $this->responseBody;
	}
}

$appRouter = new AppRouter();

$appRouter->add('/users', function() {
	$this->responseBody = json_encode(['nicholas','rosana', 'maria']);
});

$appRouter->dispatch('/users');