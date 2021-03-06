<?php
/**
 * 查看标签文章
 *
 *
 */

class Tag_Controller
{
    function display($params)
    {
        $Log_Model = new Log_Model();
        $options_cache = Option::getAll();
        extract($options_cache, EXTR_OVERWRITE);

        $page = isset($params[4]) && $params[4] == 'page' ? abs((int)$params[5]) : 1;
        $tag = isset($params[1]) && $params[1] == 'tag' ? addslashes(urldecode(trim($params[2]))) : '';

        $pageurl = '';

        //page meta
        $site_title = stripslashes($tag) . ' - ' . $site_title;

        $Tag_Model = new Tag_Model();
        $blogIdStr = $Tag_Model->getTagByName($tag);

        if ($blogIdStr === false) {
            show_404_page();
        }
        $sqlSegment = "and gid IN ($blogIdStr) order by date desc";
        $lognum = $Log_Model->getLogNum('n', $sqlSegment);
        $total_pages = ceil($lognum / $index_lognum);
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $pageurl .= Url::tag(urlencode($tag), 'page');

        $logs = $Log_Model->getLogsForHome($sqlSegment, $page, $index_lognum);
        $page_url = pagination($lognum, $index_lognum, $page, $pageurl);

        //最热文章
        $hot_logs = $Log_Model->getTopBlogByLimit("sortid =1", 5);

        include View::getView('header');
        include View::getView('tag_list');
    }
}
