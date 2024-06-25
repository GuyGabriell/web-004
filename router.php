
<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [

  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
  '/testing' => 'controllers/testing.php'
];


function routesToControllers($uri, $routes) {


  if (array_key_exists($uri, $routes)) {

  require $routes[$uri];

} else {

  abort();
 
}

}

function abort($code = 404) {

   http_response_code(404);

  require "views/{$code}.php";


  die();
}


routesToControllers($uri, $routes);




