<?php

namespace MyApp\Core;

class Routes {

    public function run() {

        $router = new App();
        $router->setDefaultController('HomeController');
        $router->setDefaultMethod('index');

        $router->get('/',['HomeController', 'index']);
        $router->get('/home',['HomeController', 'home']);
        $router->get('/about',['HomeController', 'about']);
        $router->get('/contact',['HomeController', 'contact']);
        $router->post('/contact',['HomeController', 'kirimPesan']);
        $router->get('/testimoni',['HomeController', 'testimoni']);
        $router->get('/cart',['HomeController', 'cart']);
        $router->post('/cart',['HomeController', 'store']);
        $router->post('/cart/edit',['HomeController', 'edit']);

        $router->get('/login',['AuthController', 'login']);
        $router->post('/login',['AuthController', 'login']);
        $router->get('/logout',['AuthController', 'logout']);

        $router->get('/register',['AuthController', 'register']);
        $router->post('/register',['AuthController', 'register']);

        $router->get('/destination',['DestinationController', 'index']);
        $router->get('/destination/(:id)',['DestinationController','show']);
        $router->post('/destination',['DestinationController','store']);
        $router->post('/destination/edit',['DestinationController', 'edit']);
        $router->post('/destination/delete',['DestinationController','destroy']);

        $router->get('/category_destination',['CategoryController', 'index']);
        $router->post('/category_destination',['CategoryController','store']);
        $router->post('/category_destination/edit',['CategoryController', 'edit']);
        $router->post('/category_destination/delete',['CategoryController','destroy']);

        $router->get('/city_destination', ['CityController', 'index']);
        $router->post('/city_destination', ['CityController', 'store']);
        $router->post('/city_destination/edit', ['CityController', 'edit']);
        $router->post('/city_destination/delete', ['CityController', 'destroy']);

        $router->get('/user_data',['UserController', 'index']);
        $router->post('/user_data',['UserController','store']);
        $router->post('/user_data/edit',['UserController', 'edit']);
        $router->post('/user_data/delete',['UserController','destroy']);

        $router->get('/testimoni_data',['TestimonialController', 'index']);
        $router->post('/testimoni_data',['TestimonialController','store']);
        $router->post('/testimoni_data/edit',['TestimonialController', 'edit']);
        $router->post('/testimoni_data/delete',['TestimonialController','destroy']);        

        $router->get('/order_data',['OrderController', 'index']);
        $router->post('/order_data',['OrderController','store']);
        $router->post('/order_data/edit',['OrderController', 'edit']);
        $router->post('/order_data/delete',['OrderController','destroy']);

        $router->run();
        
    }

}