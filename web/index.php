<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/1/12
 * Time: 下午7:28
 */
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../modules/config/web.php';

defined('SP_CONF_FILE') or define('SP_CONF_FILE', '/home/saber/webroot/study-palace/server.ini');
$server_ini = parse_ini_file(SP_CONF_FILE, true);

foreach ((array)$server_ini as $key => $userConfig) {
    if (strlen($key) > 3 && 'db_' === substr($key, 0, 3) && isset($config['components'][$key])) {
        $config['components'][$key] = array_merge($config['components'][$key], $userConfig);
    } elseif (isset($config['params'][$key])) {
        $config['params'][$key] = array_merge($config['params'][$key], $userConfig);
    } else {
        $config['params'][$key] = $userConfig;
    }
}

try {
    (new yii\web\Application($config))->run();
} catch (Exception $e) {
    header("http/1.1 404 Not Found");
    header("status: 404 Not Found");
}