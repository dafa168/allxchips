<?php
/**
 * RSS输出
 *
 */

require_once './init.php';

header('Content-type: application/xml');

$URL = BLOG_URL;
$blog = getBlog();

echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title><![CDATA[' . Option::get('blogname') . ']]></title> 
<description><![CDATA[' . Option::get('bloginfo') . ']]></description>
<link>' . $URL . '</link>
<language>en-us</language>
<generator>' . Option::get('blogurl') . '</generator>';
if (!empty($blog)) {

    foreach ($blog as $value) {
        $link = Url::log($value['id']);
        $abstract = str_replace('[break]', '', $value['content']);
        $pubdate = gmdate('r', $value['date']);
        $author = parse_url($URL, PHP_URL_HOST);
        doAction('rss_display');
        echo <<< END
<item>
    <title>{$value['title']}</title>
    <link>$link</link>
    <description><![CDATA[{$abstract}]]></description>
    <pubDate>$pubdate</pubDate>
    <author>$author</author>
    <guid>$link</guid>

</item>
END;
    }
}
echo <<< END
</channel>
</rss>
END;

function getBlog()
{
    $rss_output_num = Option::get('rss_output_num');
    if ($rss_output_num == 0) {
        return array();
    }
    $DB = Database::getInstance();

    $sql = "SELECT * FROM " . DB_PREFIX . "blog  WHERE hide='n' and type='blog' ORDER BY date DESC limit 0," . $rss_output_num;
    $result = $DB->query($sql);
    $blog = [];
    while ($re = $DB->fetch_array($result)) {
        $re['id'] = $re['gid'];
        $re['title'] = htmlspecialchars($re['title']);
        $re['content'] = extractHtmlData($re['content'], 330);
        $re['content'] .= ' <a href="' . Url::log($re['id']) . '">阅读全文&gt;&gt;</a>';
        $blog[] = $re;
    }
    return $blog;
}
