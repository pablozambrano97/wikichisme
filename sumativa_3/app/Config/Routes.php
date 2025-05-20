<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Home::index');
$routes->get("/", "Login::login");
$routes->get("/tema/(:num)", "Home::tema/$1");
//$routes->get("/login", "Login::login");
$routes->post("/login", "Login::autenticar");
$routes->get("/logout", function() {
    $session = session();
    $session->destroy();
    return redirect()->to("/");
});

//Administrar usuarios 
$routes->get("/admin/usuarios", "AdminUsuarios::index");
$routes->get("/admin/usuarios/editar/(:num)", "AdminUsuarios::editar/$1");
$routes->post("/admin/usuarios/guardar", "AdminUsuarios::guardar");
$routes->get("/admin/usuarios/eliminar/(:num)", "AdminUsuarios::eliminar/$1");
$routes->post("/admin/usuarios/eliminar/(:num)", "AdminUsuarios::eliminarDefinitivo/$1");

//Administrar temas 
$routes->get("admin/proyectos", "AdminTemas::index");
$routes->get("admin/temas/eliminar/(:num)", "AdminTemas::eliminar/$1");
$routes->post("/admin/temas/eliminar/(:num)", "AdminTemas::eliminarDefinitivo/$1");
$routes->get("/admin/temas/editar/(:num)", "AdminTemas::editar/$1");
$routes->post("/admin/temas/guardar", "AdminTemas::guardar");

//Administrar publicaciones 
$routes->get("/editar/publicacion/(:num)/(:num)", "AdminPublicaciones::editarPublicacion/$1/$2");
$routes->post("/editar/publicacion/guardar", "AdminPublicaciones::guardar");

$routes->get("/publicacion/(:num)", "Home::publicacion/$1");