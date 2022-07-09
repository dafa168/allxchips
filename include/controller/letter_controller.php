<?php
/**
 * 搜索文章
 *
 *
 */

class Letter_Controller
{
    function display($params)
    {
        $Log_Model = new Log_Model();
        $options_cache = Option::getAll();
        extract($options_cache, EXTR_OVERWRITE);

        $page = isset($params[4]) && $params[4] === 'page' ? abs((int)$params[5]) : 1;
        $keyword = isset($params[1]) && $params[1] === 'keyword' ? trim($params[2]) : '';
        $keyword = addslashes(htmlspecialchars(urldecode($keyword)));
        $keyword = str_replace(array('%', '_'), array('\%', '\_'), $keyword);


        include View::getView('header');
        include View::getView('letter_list');
    }
}
