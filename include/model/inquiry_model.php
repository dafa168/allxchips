<?php
/**
 * commment model
 *
 */

class Inquiry_Model
{

    const WAY_DETAIL = 1;
    const WAY_INQUIRY = 2;

    const WAY_LIST = [
        self::WAY_DETAIL => '详情页',
        self::WAY_INQUIRY => '询价页',
    ];

    const STATE_HANDLED = 1;
    const STATE_UNHANDLE = 0;

    const STATE_LIST = [
        self::STATE_HANDLED => '已处理',
        self::STATE_UNHANDLE => '未处理'
    ];

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * get comment list
     *
     * @param int $blogId
     * @param string $hide
     * @param int $page
     * @return array
     */
    function getComments($blogId = null, $hide = null, $page = null)
    {
        $andQuery = '1=1';
        $andQuery .= $blogId ? " and a.gid=$blogId" : '';
        $andQuery .= $hide ? " and a.hide='$hide'" : '';
        $condition = '';

        $sql = "SELECT * FROM " . DB_PREFIX . "comment as a where $andQuery ORDER BY a.date ASC $condition";

        $ret = $this->db->query($sql);
        $comments = array();
        while ($row = $this->db->fetch_array($ret)) {
            $row['poster'] = htmlspecialchars($row['poster']);
            $row['mail'] = htmlspecialchars($row['mail']);
            $row['url'] = htmlspecialchars($row['url']);
            $row['content'] = htmlClean($row['comment']);
            $row['date'] = smartDate($row['date']);
            $row['children'] = array();
            $row['level'] = isset($comments[$row['pid']]) ? $comments[$row['pid']]['level'] + 1 : 0;
            $comments[$row['cid']] = $row;
        }

        $commentStacks = array();
        $commentPageUrl = '';
        foreach ($comments as $cid => $comment) {
            $pid = $comment['pid'];
            if ($pid == 0) {
                $commentStacks[] = $cid;
            }
            if ($pid != 0 && isset($comments[$pid])) {
                if ($comments[$cid]['level'] > 4) {
                    $comments[$cid]['pid'] = $pid = $comments[$pid]['pid'];
                }
                $comments[$pid]['children'][] = $cid;
            }
        }
        if (Option::get('comment_order') == 'newer') {
            $comments = array_reverse($comments, true);
            $commentStacks = array_reverse($commentStacks);
        }
        if (Option::get('comment_paging') == 'y') {
            $pageurl = Url::log($blogId);
            if (Option::get('isurlrewrite') == 0 && strpos($pageurl, '=') !== false) {
                $pageurl .= '&comment-page=';
            } else {
                $pageurl .= '/comment-page-';
            }
            $commentPageUrl = pagination(count($commentStacks), Option::get('comment_pnum'), $page, $pageurl, '#comments');
            $commentStacks = array_slice($commentStacks, ($page - 1) * Option::get('comment_pnum'), Option::get('comment_pnum'));
        }
        $comments = compact('comments', 'commentStacks', 'commentPageUrl');

        return $comments;
    }

    /**
     * get comment list for admin
     *
     * @param int $blogId
     * @param string $hide
     * @param int $page
     * @return array
     */
    public function getInquiryForAdmin($page = null)
    {
        $andQuery = '1=1';
//        $andQuery .= $blogId ? " and a.gid=$blogId" : '';
//        $andQuery .= $hide ? " and a.hide='$hide'" : '';
        $condition = '';
        if ($page) {
            $pageSize = Option::get('admin_perpage_num');
            if ($page > PHP_INT_MAX) {
                $page = PHP_INT_MAX;
            }
            $currPage = ($page - 1) * $pageSize;
            $condition = "LIMIT $currPage, " . $pageSize;
        }

        $sql = "SELECT * FROM " . DB_PREFIX . "inquiry where $andQuery ORDER BY date_at DESC $condition";

        $ret = $this->db->query($sql);
        $comments = [];
        while ($row = $this->db->fetch_array($ret)) {

            $row['msg'] = htmlClean($row['msg']);
            $row['state_at'] = self::STATE_LIST[$row['state']] ?? '未知';
            $row['way_at'] = self::WAY_LIST[$row['way']] ?? '未知';
            $row['date_at'] = date('Y-m-d H:i:s', $row['date_at']);
            $row['update_at'] = $row['update_at'] > 0 ? date('Y-m-d H:i:s', $row['update_at']) : '';

            if ($row['file_url'] !== 'null') {
                $row['quote'] = BLOG_URL . 'content/backup/' . $row['file_url'];
            }
            $comments[$row['id']] = $row;
        }

        return $comments;
    }


    public function getInquiryNum()
    {
        $where = '1=1';
        $sql = "SELECT count(*) as total FROM " . DB_PREFIX . "inquiry where $where";
        $res = $this->db->once_fetch_array($sql);
        return $res['total'];
    }

    public function getOneComment($commentId, $nl2br = false)
    {
        $sql = "select * from " . DB_PREFIX . "inquiry where cid=$commentId";
        $res = $this->db->query($sql);
        if ($this->db->affected_rows() < 1) {
            return false;
        }
        $commentArray = $this->db->fetch_array($res);
//        $commentArray['comment'] = $nl2br ? htmlClean(trim($commentArray['comment'])) : htmlClean(trim($commentArray['comment']), FALSE);
//        $commentArray['poster'] = htmlspecialchars($commentArray['poster']);
        $commentArray['date'] = date("Y-m-d H:i", $commentArray['date']);
        return $commentArray;
    }

    //删除询价
    public function delInquiry($ids = [])
    {
        //TODO：如果询价内容有文件，要先删除文件

        $idStr = implode(',', $ids);
        $this->db->query("DELETE FROM " . DB_PREFIX . "inquiry WHERE id IN ($idStr) AND state=" . self::STATE_UNHANDLE);
        return true;
    }

//    public function delCommentByIp($ip)
//    {
//        $blogids = array();
//        $sql = "SELECT DISTINCT gid FROM " . DB_PREFIX . "comment WHERE ip='$ip'";
//        $query = $this->db->query($sql);
//        while ($row = $this->db->fetch_array($query)) {
//            $blogids[] = $row['gid'];
//        }
//        $this->db->query("DELETE FROM " . DB_PREFIX . "comment WHERE ip='$ip'");
//        $this->updateCommentNum($blogids);
//    }
//
//    public function hideComment($commentId)
//    {
//        $this->isYoursComment($commentId);
//        $row = $this->db->once_fetch_array("SELECT gid FROM " . DB_PREFIX . "comment WHERE cid=$commentId");
//        $blogId = (int)$row['gid'];
//        $commentIds = array($commentId);
//        /* 获取子评论ID */
//        $query = $this->db->query("SELECT cid,pid FROM " . DB_PREFIX . "comment WHERE gid=$blogId AND cid>$commentId ");
//        while ($row = $this->db->fetch_array($query)) {
//            if (in_array($row['pid'], $commentIds)) {
//                $commentIds[] = $row['cid'];
//            }
//        }
//        $commentIds = implode(',', $commentIds);
//        $this->db->query("UPDATE " . DB_PREFIX . "comment SET hide='y' WHERE cid IN ($commentIds)");
//        $this->updateCommentNum($blogId);
//    }
//
//    public function showComment($commentId)
//    {
//        $this->isYoursComment($commentId);
//        $row = $this->db->once_fetch_array("SELECT gid,pid FROM " . DB_PREFIX . "comment WHERE cid=$commentId");
//        $blogId = (int)$row['gid'];
//        $commentIds = array($commentId);
//        /* 获取父评论ID */
//        while ($row['pid'] != 0) {
//            $commentId = (int)$row['pid'];
//            $commentIds[] = $commentId;
//            $row = $this->db->once_fetch_array("SELECT pid FROM " . DB_PREFIX . "comment WHERE cid=$commentId");
//        }
//        $commentIds = implode(',', $commentIds);
//        $this->db->query("UPDATE " . DB_PREFIX . "comment SET hide='n' WHERE cid IN ($commentIds)");
//        $this->updateCommentNum($blogId);
//    }

    function replyComment($blogId, $pid, $content, $hide)
    {
        $CACHE = Cache::getInstance();
        $user_cache = $CACHE->readCache('user');
        if (isset($user_cache[UID])) {
            $name = addslashes($user_cache[UID]['name_orig']);
            $mail = addslashes($user_cache[UID]['mail']);
            $url = addslashes(BLOG_URL);
            $ipaddr = getIp();
            $utctimestamp = time();
            if ($pid != 0) {
                $comment = $this->getOneComment($pid);
                $content = '@' . addslashes($comment['poster']) . '：' . $content;
            }
            $this->db->query("INSERT INTO " . DB_PREFIX . "comment (date,poster,gid,comment,mail,url,hide,ip,pid)
                    VALUES ('$utctimestamp','$name','$blogId','$content','$mail','$url','$hide','$ipaddr','$pid')");
            $this->updateCommentNum($blogId);
        }
    }

//    function batchComment($action, $comments)
//    {
//        switch ($action) {
//            case 'delcom':
//                foreach ($comments as $val) {
//                    $this->delComment($val);
//                }
//                break;
//            case 'hidecom':
//                foreach ($comments as $val) {
//                    $this->hideComment($val);
//                }
//                break;
//            case 'showcom':
//                foreach ($comments as $val) {
//                    $this->showComment($val);
//                }
//                break;
//        }
//    }

    function updateCommentNum($blogId)
    {
        if (is_array($blogId)) {
            foreach ($blogId as $val) {
                $this->updateCommentNum($val);
            }
        } else {
            $sql = "SELECT count(*) FROM " . DB_PREFIX . "comment WHERE gid=$blogId AND hide='n'";
            $res = $this->db->once_fetch_array($sql);
            $comNum = $res['count(*)'];
            $this->db->query("UPDATE " . DB_PREFIX . "blog SET comnum=$comNum WHERE gid=$blogId");
            return $comNum;
        }
    }

    /**
     * 增加询价信息
     * @param $name
     * @param $cname
     * @param $file_url
     * @param $email
     * @param $tel
     * @param $msg
     * @param $quote
     * @param $url
     * @param $user_agent
     * @return int|string
     */
    public function addInquiry($name, $cname, $email, $phone, $msg, $quote, $url, $user_agent, $file_url = '', $way = 2)
    {
        $ip = getIp();
        $date_at = time();

        $sql = 'INSERT INTO ' . DB_PREFIX . "inquiry (name,cname,file_url,email,phone,msg,quote,date_at,url,ip,user_agent,way)
                VALUES ('$name','$cname','$file_url','$email','$phone','$msg','$quote','$date_at','$url','$ip','$user_agent', '$way')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function isInquiryTooFast()
    {
        $ipaddr = getIp();
        $utctimestamp = time() - Option::get('comment_interval');

        $sql = 'select count(*) as num from ' . DB_PREFIX . "inquiry where date_at > $utctimestamp AND ip='$ipaddr'";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);

        return (int)$row['num'] > 0;
    }


    function updateInquiry($id = 0, $update = [])
    {
        $update = array_merge($update, ['state' => self::STATE_HANDLED, 'update_at' => time()]);
        $id = (int)$id;
        $Item = [];
        foreach ($update as $key => $data) {
            $Item[] = "$key='$data'";
        }
        $upStr = implode(',', $Item);
        $this->db->query("UPDATE " . DB_PREFIX . "inquiry SET $upStr WHERE id=$id");
    }

//    function isCommentExist($blogId, $name, $content)
//    {
//        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "comment WHERE gid=$blogId AND poster='$name' AND comment='$content'");
//        if ($data['total'] > 0) {
//            return true;
//        } else {
//            return false;
//        }
//    }

//    function isYoursComment($cid)
//    {
//        if (ROLE == ROLE_ADMIN || ROLE == ROLE_VISITOR) {
//            return true;
//        }
//        $query = $this->db->query("SELECT a.cid FROM " . DB_PREFIX . "comment as a," . DB_PREFIX . "blog as b WHERE a.cid=$cid and a.gid=b.gid AND b.author=" . UID);
//        $result = $this->db->num_rows($query);
//        if ($result <= 0) {
//            emMsg('权限不足！', './');
//        }
//    }

//    function isNameAndMailValid($name, $mail)
//    {
//        $CACHE = Cache::getInstance();
//        $user_cache = $CACHE->readCache('user');
//        foreach ($user_cache as $user) {
//            if ($user['name'] == $name || ($mail != '' && $user['mail'] == $mail)) {
//                return false;
//            }
//        }
//        return true;
//    }

//    function isLogCanComment($blogId)
//    {
//        if (Option::get('iscomment') == 'n') {
//            return false;
//        }
//        $query = $this->db->query("SELECT allow_remark FROM " . DB_PREFIX . "blog WHERE gid=$blogId");
//        $show_remark = $this->db->fetch_array($query);
//        if ($show_remark['allow_remark'] == 'n' || $show_remark === false) {
//            return false;
//        } else {
//            return true;
//        }
//    }

//    function isCommentTooFast()
//    {
//        $ipaddr = getIp();
//        $utctimestamp = time() - Option::get('comment_interval');
//
//        $sql = 'select count(*) as num from ' . DB_PREFIX . "comment where date > $utctimestamp AND ip='$ipaddr'";
//        $res = $this->db->query($sql);
//        $row = $this->db->fetch_array($res);
//
//        return (int)$row['num'] > 0;
//    }

//    function setCommentCookie($name, $mail, $url)
//    {
//        $cookietime = time() + 31536000;
//        setcookie('commentposter', $name, $cookietime);
//        setcookie('postermail', $mail, $cookietime);
//        setcookie('posterurl', $url, $cookietime);
//    }
}
