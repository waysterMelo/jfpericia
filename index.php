<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use JF\Page;

require_once 'vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true,true,true);

$app->get('/', function (Request $req, Response $res){
    $app = new Page();
    $app->setTpl("index");
    return $res;
});

$app->get('/sobre-jfpericia', function (Request $request, Response $response){
   $app  = new Page([
       "header"=>false
   ]);
   $app->setTpl("sobre");
   return $response;
});

$app->get('/jf-pericia-contabil-servicos', function (Request $req, Response $res){
   $page  =  new Page([
       "header"=>false
   ]);
    $page->setTpl("servicos");
    return $res;
});

$app->get('/contato', function (Request $req, Response $res){
   $page = new Page([
       "header"=>false
   ]);
   $page->setTpl("contato");
   return $res;
});

$app->run();

