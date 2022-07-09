<?php
/**
 * article and page model
 *
 *
 */

class Log_Model
{

    private $db;
    private $Parsedown;

    const BLOG_TYPE = 'blog'; // 博文
    const BLOG_PAGE = 'page'; //页面

    const BLOG_TYPE_LIST = [
        self::BLOG_TYPE => '博文',
        self::BLOG_PAGE => '单页面',
    ];

    function __construct()
    {
        $this->db = Database::getInstance();
        $this->Parsedown = new Parsedown();
        $this->Parsedown->setBreaksEnabled(true); //automatic line wrapping
    }

    /**
     * create article
     */
    function addlog($logData)
    {
        $kItem = [];
        $dItem = [];
        foreach ($logData as $key => $data) {
            $kItem[] = $key;
            $dItem[] = $data;
        }
        $field = implode(',', $kItem);
        $values = "'" . implode("','", $dItem) . "'";
        $this->db->query("INSERT INTO " . DB_PREFIX . "blog ($field) VALUES ($values)");
        return $this->db->insert_id();
    }

    /**
     * update article
     */
    function updateLog($logData, $blogId)
    {
        $author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
        $Item = [];
        foreach ($logData as $key => $data) {
            $Item[] = "$key='$data'";
        }
        $upStr = implode(',', $Item);
        $this->db->query("UPDATE " . DB_PREFIX . "blog SET $upStr WHERE gid=$blogId $author");
    }

    /**
     * Gets the number of articles for the specified condition
     *
     * @param int $spot 0:前台 1:后台
     * @param string $hide
     * @param string $condition
     * @param string $type
     * @return int
     */
    function getLogNum($hide = 'n', $condition = '', $type = 'blog', $spot = 0)
    {
        $hide_state = $hide ? "and hide='$hide'" : '';

        if ($spot == 0) {
            $author = '';
        } else {
            $author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
        }

        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE type='$type' $hide_state $author $condition");
        return $data['total'];
    }

    /**
     * Get single article for admin
     */
    function getOneLogForAdmin($blogId)
    {
        $author = ROLE === ROLE_ADMIN ? '' : 'AND author=' . UID;
        $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE gid=$blogId $author";
        $res = $this->db->query($sql);
        if ($this->db->affected_rows() < 1) {
            emMsg('权限不足！', './');
        }
        $row = $this->db->fetch_array($res);
        if ($row) {
            $row['title'] = htmlspecialchars($row['title']);
            $row['content'] = htmlspecialchars($row['content']);
            $row['excerpt'] = htmlspecialchars($row['excerpt']);
            $row['password'] = htmlspecialchars($row['password']);
            $row['template'] = !empty($row['template']) ? htmlspecialchars(trim($row['template'])) : 'page';
            return $row;
        }

        return false;
    }

    /**
     * get single article
     */
    function getOneLogForHome($blogId)
    {
        $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE gid=$blogId AND hide='n' AND checked='y'";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        if ($row) {
            $logData = array(
                'log_title' => htmlspecialchars($row['title']),
                'timestamp' => $row['date'],
                'date' => $row['date'],

                /**
                 * 增加的部分
                 */
                'sku' => $row['alias'],
//                'status' => $row['status'],
                'package' => $row['package'],
                'unit_price' => $row['unit_price'],
                'part_status' => $row['part_status'],
                'brand' => $row['brand'],
                'datasheet' => $row['datasheet'],

                'logid' => (int)$row['gid'],
                'sortid' => (int)$row['sortid'],
                'sortname' => (new Sort_Model())->getSortName($row['sortid']),
                'type' => $row['type'],
                'author' => $row['author'],
                'desc' => $row['excerpt'],
                'log_cover' => getFileUrl($row['cover'], $row['sortid']),
                'log_content' => $this->Parsedown->text($row['content']),
                'views' => (int)$row['views'],
                'comnum' => (int)$row['comnum'],
                'top' => $row['top'],
                'sortop' => $row['sortop'],
                'attnum' => (int)$row['attnum'],
                'allow_remark' => Option::get('iscomment') === 'y' ? $row['allow_remark'] : 'n',
                'template' => $row['template'],
            );
            return $logData;
        }

        return false;
    }

    /**
     * 后台获取文章列表
     *
     * @param string $condition
     * @param string $hide_state
     * @param int $page
     * @param string $type
     * @return array
     */
    function getLogsForAdmin($condition = '', $hide_state = '', $page = 1, $type = 'blog')
    {
        $perpage_num = Option::get('admin_perpage_num');
        $start_limit = !empty($page) ? ($page - 1) * $perpage_num : 0;
        $author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
        $hide_state = $hide_state ? "and hide='$hide_state'" : '';
        $limit = "LIMIT $start_limit, " . $perpage_num;
        $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='$type' $author $hide_state $condition $limit";
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['date'] = date("Y-m-d H:i", $row['date']);
            $row['title'] = !empty($row['title']) ? htmlspecialchars($row['title']) : '无标题';
            $logs[] = $row;
        }
        return $logs;
    }

    public function getAllBlogAttr($gid)
    {
        $sql = "SELECT `gid`,`name`,`value` FROM " . DB_PREFIX . "blog_attr where 1=1 AND gid=" . (int)$gid;
        $res = $this->db->query($sql);
        $attrs = [];
        while ($row = $this->db->fetch_array($res)) {
            $attrs[] = [
                'name' => $row['name'],
                'value' => $row['value']
            ];
        }
        return $attrs;
    }

    /**
     * 取得首页
     * @param string $condition
     * @param int $limit
     * @return array
     */
    public function getTopBlogByLimit($condition = '', $limit = 10)
    {
        $where = "1=1";
        if (!empty($condition)) {
            $where .= " and " . $condition;
        }

        $sql = "SELECT * FROM " . DB_PREFIX . "blog ";
        $sql .= "WHERE $where and type='blog' and checked='y' ORDER BY `date` DESC LIMIT " . $limit;
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {
            $temp = [];
            $temp['log_title'] = htmlspecialchars(trim($row['title']));
            $temp['log_cover'] = getFileUrl($row['cover'], $row['sortid']);
            $temp['log_url'] = Url::log($row['gid']);
            $temp['log_id'] = $row['gid'];
            $temp['log_price'] = $row['unit_price'];
            $temp['log_excerpt'] = $row['excerpt'];
            $logs[] = $temp;
        }
        return $logs;
    }

    /**
     * 取得分类下的
     * @param $sort
     * @param string $condition
     * @param int $limit
     * @return array
     */
    public function getSortBlogByLimit($sort, $condition = '', $limit = 10)
    {
        $where = "1=1";
        $where .= $condition;
        $sql = "SELECT s.sid, s.sortname, s.seoname, s.seoinfo,	b.gid, b.title, b.unit_price, b.excerpt, b.cover
FROM e_sort AS s
LEFT JOIN e_blog AS b ON b.sortid = s.sid
WHERE $where AND s.sid = $sort
ORDER BY b.date DESC LIMIT " . $limit;

        $res = $this->db->query($sql);

        $temp = [];
        while ($row = $this->db->fetch_array($res)) {
            $temp['sid'] = $row['sid'];
            $temp['url'] = Url::sort($row['sid']);
            $temp['sortname'] = $row['sortname'];
            $temp['seoname'] = $row['seoname'];
            $temp['seoinfo'] = $row['seoinfo'];
            if (!empty($row['title'])) {
                $temp['logs'][] = [
                    'log_title' => htmlspecialchars(trim($row['title'])),
                    'log_cover' => getFileUrl($row['cover'], $row['sid']),
                    'log_url' => Url::log($row['gid']),
                    'log_id' => $row['gid'],
                    'log_price' => $row['unit_price'],
                    'log_desc' => $row['excerpt']
                ];
            }
        }
        return $temp;
    }

    /**
     * 前台获取文章列表
     *
     * @param string $condition
     * @param int $page
     * @param int $perPageNum
     * @return array
     */
    public function getLogsForHome($condition = '', $page = 1, $perPageNum = 10)
    {
        $start_limit = !empty($page) ? ($page - 1) * $perPageNum : 0;
        $limit = $perPageNum ? "LIMIT $start_limit, $perPageNum" : '';
        $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='blog' and hide='n' and checked='y' $condition $limit";
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['log_title'] = htmlspecialchars(trim($row['title']));
            $row['log_cover'] = getFileUrl($row['cover'], $row['sortid']);
            $row['log_url'] = Url::log($row['gid']);
            $row['logid'] = $row['gid'];
            $row['log_description'] = $row['excerpt'];
            $row['tag'] = '';
            $logs[] = $row;
        }
        return $logs;
    }

    /**
     * 获取全部页面列表
     */
    public function getAllPageList()
    {
        $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='page'";
        $res = $this->db->query($sql);
        $pages = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['date'] = date("Y-m-d H:i", $row['date']);
            $row['title'] = !empty($row['title']) ? htmlspecialchars($row['title']) : '无标题';
            $pages[] = $row;
        }
        return $pages;
    }

    /**
     * delete article
     *
     * @param int $blogId
     */
    public function deleteLog($blogId)
    {
        emMsg('权限不足！', './');

        $author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
        $this->db->query("DELETE FROM " . DB_PREFIX . "blog where gid=$blogId $author");
        if ($this->db->affected_rows() < 1) {
            emMsg('权限不足！', './');
        }
        // comment
        $this->db->query("DELETE FROM " . DB_PREFIX . "comment where gid=$blogId");
        // tag
        $this->db->query("UPDATE " . DB_PREFIX . "tag SET gid= REPLACE(gid,',$blogId,',',') WHERE gid LIKE '%" . $blogId . "%' ");
        $this->db->query("DELETE FROM " . DB_PREFIX . "tag WHERE gid=',' ");
        // 附件
        $query = $this->db->query("select filepath from " . DB_PREFIX . "attachment where blogid=$blogId ");
        while ($attach = $this->db->fetch_array($query)) {
            if (file_exists($attach['filepath'])) {
                $fpath = str_replace('thum-', '', $attach['filepath']);
                if ($fpath != $attach['filepath']) {
                    @unlink($fpath);
                }
                @unlink($attach['filepath']);
            }
        }
        $this->db->query("DELETE FROM " . DB_PREFIX . "attachment where blogid=$blogId");
    }

    /**
     * 隐藏/显示文章
     *
     * @param int $blogId
     * @param string $state
     */
    public function hideSwitch($blogId, $state)
    {
        $author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
        $this->db->query("UPDATE " . DB_PREFIX . "blog SET hide='$state' WHERE gid=$blogId $author");
        $this->db->query("UPDATE " . DB_PREFIX . "comment SET hide='$state' WHERE gid=$blogId");
        $Comment_Model = new Comment_Model();
        $Comment_Model->updateCommentNum($blogId);
    }

    /**
     * 审核/驳回作者文章
     *
     * @param int $blogId
     * @param string $state
     */
    public function checkSwitch($blogId, $state)
    {
        $this->db->query("UPDATE " . DB_PREFIX . "blog SET checked='$state' WHERE gid=$blogId");
        $state = $state == 'y' ? 'n' : 'y';
        $this->db->query("UPDATE " . DB_PREFIX . "comment SET hide='$state' WHERE gid=$blogId");
        $Comment_Model = new Comment_Model();
        $Comment_Model->updateCommentNum($blogId);
    }

    /**
     * 增加阅读次数
     *
     * @param int $blogId
     */
    public function updateViewCount($blogId)
    {
        $this->db->query("UPDATE " . DB_PREFIX . "blog SET views=views+1 WHERE gid=$blogId");
    }

    /**
     * 判断是否重复发文
     */
    public function isRepeatPost($title, $time)
    {
        $sql = "SELECT gid FROM " . DB_PREFIX . "blog WHERE title='$title' and date='$time' LIMIT 1";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        return isset($row['gid']) ? (int)$row['gid'] : false;
    }

    /**
     * 获取相邻文章
     *
     * @param int $date unix时间戳
     * @return array
     */
    public function neighborLog($date)
    {
        $neighborlog = [];
        $neighborlog['nextLog'] = $this->db->once_fetch_array("SELECT title,gid FROM " . DB_PREFIX . "blog WHERE `date` < $date and hide = 'n' and checked='y' and type='blog' ORDER BY date DESC LIMIT 1");
        $neighborlog['prevLog'] = $this->db->once_fetch_array("SELECT title,gid FROM " . DB_PREFIX . "blog WHERE `date` > $date and hide = 'n' and checked='y' and type='blog' ORDER BY date LIMIT 1");
        if ($neighborlog['nextLog']) {
            $neighborlog['nextLog']['title'] = htmlspecialchars($neighborlog['nextLog']['title']);
        }
        if ($neighborlog['prevLog']) {
            $neighborlog['prevLog']['title'] = htmlspecialchars($neighborlog['prevLog']['title']);
        }
        return $neighborlog;
    }

    /**
     * 取得不包含自己的本分类下的其他产品
     * @param string $condition
     * @param int $limit
     * @return array
     */
    public function getSimilarLog($condition = '', $limit = 16, $order = '')
    {
        $where = "1=1";
        if (!empty($condition)) {
            $where .= " and " . $condition;
        }

        if ($order == '') {
            $order = '`date` DESC';
        }

        $sql = "SELECT * FROM " . DB_PREFIX . "blog ";
        $sql .= "WHERE $where and type='blog' ORDER BY $order LIMIT " . $limit;
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {
            $temp = [];
            $temp['log_title'] = htmlspecialchars(trim($row['title']));
            $temp['log_cover'] = getFileUrl($row['cover'], $row['sortid']);
            $temp['log_views'] = $row['views'];
            $temp['log_url'] = Url::log($row['gid']);
            $temp['log_id'] = $row['gid'];
            $temp['log_desc'] = $row['excerpt'];
            $temp['log_datasheet'] = $row['datasheet'];
            $temp['log_price'] = $row['unit_price'];
            $logs[] = $temp;
        }
        return $logs;
    }

    /**
     * 随机获取指定数量文章
     */
    public function getRandomLog($num = 9)
    {
        $CACHE = Cache::getInstance();
        $sta_cache = $CACHE->readCache('sta');
        $lognum = $sta_cache['lognum'];
        $start = $lognum > $num ? random_int(0, $lognum - $num) : 0;
        $sql = "SELECT gid,title,excerpt,cover,alias,unit_price,datasheet,sortid FROM " . DB_PREFIX . "blog WHERE sortid IN(1,2) AND type='blog' LIMIT $start, $num";
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {

            $temp = [];
            $temp['log_title'] = htmlspecialchars(trim($row['title']));
            $temp['log_cover'] = getFileUrl($row['cover'], $row['sortid']);
            $temp['log_url'] = Url::log($row['gid']);
            $temp['log_id'] = $row['gid'];
            $temp['log_desc'] = $row['excerpt'];
            $logs[] = $temp;
        }
        return $logs;
    }

    /**
     * 获取热门文章
     */
    public function getHotLog($num)
    {
        $sql = "SELECT gid,title FROM " . DB_PREFIX . "blog WHERE hide='n' and checked='y' and type='blog' ORDER BY views DESC, comnum DESC LIMIT 0, $num";
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['gid'] = (int)$row['gid'];
            $row['title'] = htmlspecialchars($row['title']);
            $logs[] = $row;
        }
        return $logs;
    }

    /**
     * 处理文章别名，防止别名重复
     */
    public function checkAlias($alias, $logalias_cache, $logid)
    {
        static $i = 2;
        $key = array_search($alias, $logalias_cache);
        if (false !== $key && $key != $logid) {
            if ($i == 2) {
                $alias .= '-' . $i;
            } else {
                $alias = preg_replace("|(.*)-([\d]+)|", "$1-{$i}", $alias);
            }
            $i++;
            return $this->checkAlias($alias, $logalias_cache, $logid);
        }
        return $alias;
    }

    /**
     * 加密文章访问验证
     */
//    function authPassword($postPwd, $cookiePwd, $logPwd, $logid)
//    {
//        $url = BLOG_URL;
//        $pwd = $cookiePwd ?: $postPwd;
//        if ($pwd !== addslashes($logPwd)) {
//            echo <<<EOT
//<!doctype html>
//<html lang="zh-cn">
//<head>
//    <meta charset="utf-8">
//    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
//    <meta http-equiv="X-UA-Compatible" content="IE=edge">
//	<meta name=renderer  content=webkit>
//<title>emlog</title>
//<link href="{$url}admin/views/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
//</head>
//<body class="text-center">
//	<form action="" method="post" class="form-signin" style="width: 100%;max-width: 330px;padding: 15px;margin: 0 auto;">
//      <input type="password" id="logpwd" name="logpwd" class="form-control" placeholder="请输入文章的访问密码" required autofocus>
//      <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">提交</button>
//      <p class="mt-5 mb-3 text-muted"><a href="$url">&larr;返回首页</a></p>
//    </form>
//</body>
//</html>
//EOT;
//            if ($cookiePwd) {
//                setcookie('em_logpwd_' . $logid, ' ', time() - 31536000);
//            }
//            exit;
//        } else {
//            setcookie('em_logpwd_' . $logid, $logPwd);
//        }
//    }
}
