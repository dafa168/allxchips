<?php
/**
 * 路由分发器
 *
 */

class Dispatcher
{

    static $_instance;

    /**
     * 请求模块
     */
    private $_controller = '';

    /**
     * 请求模块方法
     */
    private $_method = '';

    /**
     * 请求参数
     */
    private $_params;

    /**
     * 路由表
     */
    private $_routingTable;

    /**
     * 访问路径
     */
    private $_path;

    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->_path = $this->setPath();
        $this->_routingTable = Option::getRoutingTable();

        $urlMode = Option::get('isurlrewrite');

        foreach ($this->_routingTable as $route) {

            if (!isset($route['reg_' . $urlMode])) {
                $reg = isset($route['reg']) ? $route['reg'] : $route['reg_0'];
            } else {
                $reg = $route['reg_' . $urlMode];
            }

            if (preg_match($reg, $this->_path, $matches)) {
                $this->_controller = $route['model'];
                $this->_method = $route['method'];
                $this->_params = $matches;
                break;
            } elseif (preg_match($route['reg_0'], $this->_path, $matches)) {
                $this->_controller = $route['model'];
                $this->_method = $route['method'];
                $this->_params = $matches;
                break;
            }
        }

        if (empty($this->_controller)) {
            show_404_page();
        }
    }

    public function dispatch()
    {
        $controller = new $this->_controller();
        $method = $this->_method;
        $controller->$method($this->_params);
    }

    public static function setPath()
    {
        //$path = '';
        if (isset($_SERVER['HTTP_X_REWRITE_URL'])) { //iis
            $path = $_SERVER['HTTP_X_REWRITE_URL'];
        } elseif (isset($_SERVER['REQUEST_URI'])) {
            $path = $_SERVER['REQUEST_URI'];
        } else {
            if (isset($_SERVER['argv'])) {
                $path = $_SERVER['PHP_SELF'] . '?' . $_SERVER['argv'][0];
            } else {
                $path = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
            }
        }

        //for iis6 path is GBK
        if (isset($_SERVER['SERVER_SOFTWARE']) && stripos($_SERVER['SERVER_SOFTWARE'], 'IIS') !== false) {
            if (function_exists('mb_convert_encoding')) {
                $path = mb_convert_encoding($path, 'UTF-8', 'GBK');
            } else {
                $path = @iconv('GBK', 'UTF-8', @iconv('UTF-8', 'GBK', $path)) == $path ? $path : @iconv('GBK', 'UTF-8', $path);
            }
        }
        //for ie6 header location
        $r = explode('#', $path, 2);
        $path = $r[0];
        //for iis6
        $path = str_ireplace('index.php', '', $path);
        //for subdirectory
        $t = parse_url(BLOG_URL);
        $path = str_replace($t['path'], '/', $path);

        return $path;
    }
}
