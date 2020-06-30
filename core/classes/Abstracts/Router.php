<?php

namespace Core\Abstracts;

/**
 * Class Controller
 *
 * @package App\Abstracts
 * @author  Dainius Vaičiulis   <denncath@gmail.com>
 */
abstract class Router
{
    /**
     * This is the array where we will add routes, it will look like this:
     * $this->routes = [
     *  'login' => [
     *      'url' => '/login',
     *      'controller_name' => '\App\Controllers\Auth\LoginController',
     *      'controller_method' => 'index',
     *  ],
     *  ...
     * ]
     *
     * @var array
     */
    protected static $routes = [];

    /**
     * We will call this as follows:
     * Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index')
     *
     * Goal is to add entry to $this->routes
     * with the following information:
     *
     * @param string $name Route name determines the index,
     * which the route array will be saved in $this->routes
     *
     * @param string $url Url which belongs to controller
     *
     * @param string $controller_name Controller class name,
     * Example: \App\Controllers\HomeController
     *
     * @param string $controller_method Method name inside controller,
     * Example.: if controller has method index() for that page, we pass "index"
     *
     * @return mixed
     */
    abstract public static function add(string $name, string $url, string $controller_name, string $controller_method): void;

    /**
     * Creates controller object based on it's class name
     *
     * @param string $controller_name Controller class name, ex.: \App\Controllers\HomeController
     * @return mixed Controller Object
     */
    abstract protected static function getControllerInstance(string $controller_name);

    /**
     * Returns route array from $this->routes by $url
     * if route is not found, returns null
     *
     * @param $url
     * @return null|array
     */
    abstract protected static function getRouteByUrl($url): ?array;

    /**
     * Gets route url by route name from $this->routes
     * We will use this to print various links in pages
     *
     * @param $name
     * @return string|null
     */
    abstract protected static function getUrl($name): ?string;

    /**
     * Gets route based on current URL ($_SERVER['REQUEST_URI'])
     * creates controller instance and executes its method
     *
     * Note, that urls could have parameters like products?id=3
     * it should ignore it while choosing the right controller
     *
     * Returns the html string, that the controller returns
     *
     * @return string HTML
     */
    abstract public static function run(): string;


}
