<?php
/**
 * 显示首页、内容
 *
 *
 */

class Index_Controller
{
    public function display($params)
    {
        $Log_Model = new Log_Model();
        $CACHE = Cache::getInstance();

        $options_cache = Option::getAll();
        extract($options_cache, EXTR_OVERWRITE);

        //top data
        $sort_a = $Log_Model->getTopBlogByLimit("sortid = 1", 12);
        $sort_b = $Log_Model->getTopBlogByLimit("sortid = 2", 12);
        $sort_c = $Log_Model->getTopBlogByLimit("sortid = 4", 12);
//        $top_logs = array_chunk($top_logs, 8, true);

        //sort A
//        $sort_a = $Log_Model->getSortBlogByLimit(1, '', 12);
//        $sort_b = $Log_Model->getSortBlogByLimit(2, '', 12);
//        $sort_c = $Log_Model->getSortBlogByLimit(4, '', 12);

        //blog list
        $logs = $Log_Model->getTopBlogByLimit("sortid = 3", 3);

        include View::getView('header');
        include View::getView('index_list');
    }

}
