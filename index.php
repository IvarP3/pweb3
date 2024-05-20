<?php
session_start();
require_once './config/global.php';

$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($request, '/'));

function error404()
{
    http_response_code(404);
    require ROOT_DIR . '/view/home.php';
    exit;
}

if ($segments[0] === 'appweb') {
    switch ($segments[1] ?? '') {
        case 'seg':
            switch ($segments[2] ?? '') {
                case 'seg_modulo':
                    switch ($segments[3] ?? '') {
                        case 'list':
                            require ROOT_DIR . '/view/seg/seg_modulo/list.php';
                            break;
                        case 'create':
                            require ROOT_DIR . '/view/seg/seg_modulo/create.php';
                            break;

                        case 'edit':
                            if (isset($segments[4])) {
                                $_GET['cod_mod'] = $segments[4];
                                require ROOT_DIR . '/view/seg/seg_modulo/edit.php';
                            } else {
                                error404();
                            }
                            break;
                        case 'delete':
                            if (isset($segments[4])) {
                                $_GET['cod_mod'] = $segments[4];
                                require ROOT_DIR . '/view/seg/seg_modulo/delete.php';
                            } else {
                                error404();
                            }
                            break;

                        default:
                            error404();
                            break;
                    }

                    break;
                case 'seg_aplicacion':
                    break;

                default:
                    error404();
                    break;
            }
            break;

        case 'con':
            break;
        case 'login':
            switch ($segments[2] ?? '') {
                case 'login':
                    require ROOT_DIR . '/view/login/login.php';
                    break;
                case 'register':
                    require ROOT_DIR . '/view/login/register.php';
                    break;
                default:
                    error404();
                    break;
            }
            break;
        default:
            error404();
            break;
    }
} else {
    error404();
}
