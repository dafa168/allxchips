<?php
/**
 * 数据库操作路由
 *
 * 
 */

class Database {

	public static function getInstance() {
        if (class_exists('mysqli', FALSE)) {
            return MySqlii::getInstance();
        }

        if (class_exists('pdo', false)) {
            return Mysqlpdo::getInstance();
        }

        emMsg('服务器空间PHP不支持MySql数据库');
    }

}
