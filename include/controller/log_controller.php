<?php
/**
 * 显示列表 和 内容
 *
 *
 */

class Log_Controller
{
    public function display($params)
    {
        $Log_Model = new Log_Model();
        $CACHE = Cache::getInstance();

        $options_cache = Option::getAll();
        extract($options_cache, EXTR_OVERWRITE);

        $page = isset($params[1]) && $params[1] === 'page' ? abs((int)$params[2]) : 1;

        $pageurl = '';
        $sqlSegment = 'ORDER BY top DESC ,date DESC';
        $sta_cache = $CACHE->readCache('sta');
        $lognum = $sta_cache['lognum'];
        $pageurl .= Url::logPage();
        $total_pages = ceil($lognum / $index_lognum);
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $logs = $Log_Model->getLogsForHome($sqlSegment, $page, $index_lognum);
        $page_url = pagination($lognum, $index_lognum, $page, $pageurl);

        include View::getView('header');
        include View::getView('log_list');
    }

    public function displayContent($params)
    {

        $Log_Model = new Log_Model();
        $CACHE = Cache::getInstance();

        $options_cache = $CACHE->readCache('options');
        extract($options_cache, EXTR_OVERWRITE);

        $logid = 0;
        if (isset($params[1])) {
            if ($params[1] === 'post') {
                $logid = isset($params[2]) ? (int)$params[2] : 0;
            } elseif (is_numeric($params[1])) {
                $logid = (int)$params[1];
            } else {
                $logalias_cache = $CACHE->readCache('logalias');
                if (!empty($logalias_cache)) {
                    $alias = addslashes(urldecode(trim($params[1])));
                    $logid = array_search($alias, $logalias_cache);
                    if (!$logid) {
                        show_404_page();
                    }
                }
            }
        }

        //取得单条文章
        $log = $Log_Model->getOneLogForHome($logid);
        if ($log === false) {
            show_404_page();
        }

        //meta
//        switch ($log['log_title_style']) {
//            case '0':
//                $site_title = $log['log_title'];
//                break;
//            case '1':
//                $site_title = $log['log_title'] . ' - ' . $blogname;
//                break;
//            case '2':
//                $site_title = $log['log_title'] . ' - ' . $site_title;
//                break;
//        }

        $site_title = str_replace(['(sku)', '(brand)', '(domain)'], [$log['log_title'], $log['brand'], $options_cache['blogurl']], $options_cache['show_title']); //$options_cache['show_title']
        $site_key = str_replace(['(sku)', '(brand)', '(domain)'], [$log['log_title'], $log['brand'], $options_cache['blogurl']], $options_cache['show_key']); //$options_cache['show_key'] ?? '';
        $site_description = str_replace(['(sku)', '(brand)', '(domain)', '(desc)'], [$log['log_title'], $log['brand'], $options_cache['blogurl'], $log['desc']], $options_cache['show_desc']); //$options_cache['show_desc'] ?? '';

        //描述
        $blog_info = extractHtmlData($log['log_content'], 90);

        //TAG
        $log_cache_tags = $CACHE->readCache('logtags');
        $tags = $log_cache_tags[$logid] ?? [];
//        if (!empty($log_cache_tags[$logid])) {
//            foreach ($log_cache_tags[$logid] as $value) {
//                $site_key .= ',' . $value['tagname'];
//            }
//        }

        //输出属性数据
        $attrs = $Log_Model->getAllBlogAttr($logid);

        //top data
        $hot_logs = $Log_Model->getTopBlogByLimit("sortid IN(1,2)");

        //模板可以直接用变量， 但要判断下
        extract($log, EXTR_OVERWRITE);
        include View::getView('header');


        //相关关键字：
        $rkeys = [
            ' RFQ',
            ' Semiconductors',
            ' Circuit Diagram',
            ' Inventory',
            ' Original Stock',
            ' Obsolete Part',
            ' Competitive Price',
            ' RFPDFQ',
            ' Pin Details',
            ' Hot Chips',
            ' Datasheet',
            ' End of life'
        ];

        //判断不同类型 设置不同模板
        if ($log['type'] === Log_Model::BLOG_TYPE) {
            //更新查看次数
            $Log_Model->updateViewCount($logid);

            //取得相似文章
            $similar_logs = $Log_Model->getSimilarLog("sortid = {$log['sortid']} AND gid <> {$log['logid']}");


            //取得随机文章
//            $random_logs = $Log_Model->getRandomLog();

            //取得点击量排序文章
//            $views_logs = $Log_Model->getSimilarLog("sortid = {$log['sortid']}", 10, "`views` DESC");

            //取得分类的详情模板
            $sortData = (new Sort_Model())->getOneSortById($log['sortid']);
            $template = $sortData['detail'];
            $template = !empty($template) && file_exists(TEMPLATE_PATH . $template . '.php') ? $template : 'echo_log';

            include View::getView($template);
        } elseif ($log['type'] === Log_Model::BLOG_PAGE) {
            $template = !empty($template) && file_exists(TEMPLATE_PATH . $template . '.php') ? $template : 'page';
            include View::getView($template);
        }
    }
}
