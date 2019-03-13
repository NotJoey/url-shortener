<?php
require_once('../backend/controllers/defaultController.php');
require_once('../backend/models/defaultModel.php');
$defaultController = new defaultController();
$defaultModel = new defaultModel();

$uri = $defaultModel->escape($defaultModel->base($defaultModel->parse($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

if($uri == basename(__DIR__))
{
    $defaultController->index();
}
else if(preg_match_all('/^\A([a-z0-9]{8})$/', $uri, $matches, PREG_OFFSET_CAPTURE, 0))
{
    $defaultController->redirect($uri);
}
else
{
    $defaultController->index();
}