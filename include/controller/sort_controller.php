<?php
/**
 * 查看分类文章
 *
 *
 */

class Sort_Controller
{
    function display($params)
    {
        $Log_Model = new Log_Model();
        $CACHE = Cache::getInstance();
        $options_cache = Option::getAll();
        extract($options_cache, EXTR_OVERWRITE);

        $page = isset($params[4]) && $params[4] === 'page' ? abs((int)$params[5]) : 1;

        $sortid = '';
        if (!empty($params[2])) {
            if (is_numeric($params[2])) {
                $sortid = (int)$params[2];
            } else {
                $sort_cache = $CACHE->readCache('sort');
                foreach ($sort_cache as $key => $value) {
                    $alias = addslashes(urldecode(trim($params[2])));
                    if (in_array($alias, $value, true)) {
                        $sortid = $key;
                        break;
                    }
                }
            }
        }

        $pageurl = '';

        $sort_cache = $CACHE->readCache('sort');
        if (!isset($sort_cache[$sortid])) {
            show_404_page();
        }
        $sort = $sort_cache[$sortid];
        $sortName = $sort['sortname'];

        //page meta
        $site_title = $sortName . ' - ' . $site_title;
        if (!empty($sort_cache[$sortid]['description'])) {
            $site_description = $sort_cache[$sortid]['description'];
        }
        if ($sort['pid'] != 0 || empty($sort['children'])) {
            $sqlSegment = "and sortid=$sortid";
        } else {
            $sortids = array_merge(array($sortid), $sort['children']);
            $sqlSegment = "and sortid in (" . implode(',', $sortids) . ")";
        }
        $sqlSegment .= " order by sortop desc, date desc";
        //当前分类总文章数
        $lognum = $Log_Model->getLogNum('n', $sqlSegment);

        //每页条数 默认 12 条
        $pageSize = $sort_pagesize ?? 12 ;

        //分页
        $total_pages = ceil($lognum / $pageSize);
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $pageurl .= Url::sort($sortid, 'page');
        $page_url = pagination($lognum, $pageSize, $page, $pageurl);

        //文章列表
        $logs = $Log_Model->getLogsForHome($sqlSegment, $page, $pageSize);

        //分类列表模板
        $template = !empty($sort['template']) && file_exists(TEMPLATE_PATH . $sort['template'] . '.php') ? $sort['template'] : 'blog_list';

        //输出TAGS
        $Tag_Model = new Tag_Model();
        $tags = $Tag_Model->getTag();

        //最热文章
        $hot_logs = $Log_Model->getTopBlogByLimit("sortid =" . $sort['sid']);

        include View::getView('header');
        include View::getView($template);
    }
}
