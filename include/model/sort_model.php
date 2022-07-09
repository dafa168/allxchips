<?php
/**
 * article sort model
 *
 */

class Sort_Model
{

    private $db;

    const SORTS = [1, 2, 4];
    const SORTS_NAME = [
        1 => 'xilinx',
        2 => 'altera',
        4 => 'lattice',
    ];

    function __construct()
    {
        $this->db = Database::getInstance();
    }

    function getSorts()
    {
        $res = $this->db->query("SELECT * FROM " . DB_PREFIX . "sort ORDER BY taxis ASC");
        $sorts = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['sortname'] = htmlspecialchars($row['sortname']);
            $sorts[] = $row;
        }
        return $sorts;
    }

    function updateSort($sortData, $sid)
    {
        $Item = [];
        foreach ($sortData as $key => $data) {
            $Item[] = "$key='$data'";
        }
        $upStr = implode(',', $Item);
        $this->db->query("update " . DB_PREFIX . "sort set $upStr where sid=$sid");
    }

    function addSort($name, $alias, $pid, $description, $seoinfo, $template, $detail)
    {
        $sql = "insert into " . DB_PREFIX . "sort (sortname,seoinfo,alias,pid,description,template,detail) values('$name','$seoinfo',''$alias',$pid,'$description','$template','$detail')";
        $this->db->query($sql);
    }

    function deleteSort($sid)
    {
        $this->db->query("update " . DB_PREFIX . "blog set sortid=-1 where sortid=$sid");
        $this->db->query("update " . DB_PREFIX . "sort set pid=0 where pid=$sid");
        $this->db->query("DELETE FROM " . DB_PREFIX . "sort where sid=$sid");
    }

    function getOneSortById($sid)
    {
        $sql = "select * from " . DB_PREFIX . "sort where sid=$sid";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        $sortData = [];
        if ($row) {
            $sortData = array(
                'sortname' => htmlspecialchars(trim($row['sortname'])),
                'seoinfo' => $row['seoinfo'],
                'alias' => $row['alias'],
                'pid' => $row['pid'],
                'description' => htmlspecialchars(trim($row['description'])),
                'template' => !empty($row['template']) ? htmlspecialchars(trim($row['template'])) : 'blog_list',
                'detail' => !empty($row['detail']) ? htmlspecialchars(trim($row['detail'])) : 'echo_log',
            );
        }
        return $sortData;
    }

    function getSortName($sid)
    {
        $sortName = '未分类';
        if ($sid > 0) {
            $res = $this->db->query("SELECT sortname FROM " . DB_PREFIX . "sort WHERE sid = $sid");
            $row = $this->db->fetch_array($res);
            $sortName = htmlspecialchars($row['sortname'] ?? '');
        }
        return $sortName;
    }
}
