<?php
/**
 * 视图控制
 *
 */

class View
{
    public static function getView($template, $ext = '.php')
    {
        if (!is_dir(TEMPLATE_PATH)) {
            emMsg('Template file not found');
        }
        return TEMPLATE_PATH . $template . $ext;
    }

    public static function output()
    {
        $content = ob_get_clean();
        ob_start();
        echo $content;
        ob_end_flush();
        exit;
    }

}
