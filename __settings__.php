<?php
include_once("/Users/riaf/Sites/pdt/rhaco1.6/Rhaco.php");
/** current event id */
define("VAR_CURRENT_EVENT","CURRENT_EVENT");
/** header title */
define("VAR_HEAD_TITLE","HEAD_TITLE");
/** header message */
define("VAR_HEAD_MSG","HEAD_MSG");
/** 問題 */
define("VAR_QUESTION","QUESTION");
/** 答え */
define("VAR_ANSWER","ANSWER");
Rhaco::constant("PROJECT_VERSION","0.0.1");
Rhaco::constant("CONTEXT_PATH",Rhaco::filepath(dirname(__FILE__)));
Rhaco::constant("CONTEXT_URL","http://localhost/~riaf/rhaco_kaigi");
Rhaco::constant("PROJECT_PATH",Rhaco::filepath("/Users/riaf/Sites/rhaco_kaigi/"));
Rhaco::constant("TEMPLATE_URL","http://localhost/~riaf/rhaco_kaigi/resources/templates");
Rhaco::constant("TEMPLATE_PATH",Rhaco::filepath("/Users/riaf/Sites/rhaco_kaigi/resources/templates/"));
Rhaco::constant("CACHE_PATH",Rhaco::filepath("/Users/riaf/Sites/rhaco_kaigi/work/cache/"));
Rhaco::constant("TEMPLATE_CACHE",false);
Rhaco::constant("TEMPLATE_CACHE_TIME","86400");
Rhaco::constant("FEED_CACHE",false);
Rhaco::constant("FEED_CACHE_TIME","10800");
Rhaco::constant("LOG_FILE_LEVEL","none");
Rhaco::constant("LOG_FILE_PATH",Rhaco::filepath("/Users/riaf/Sites/rhaco_kaigi/work/log/"));
Rhaco::constant("LOG_DISP_LEVEL","deep_debug");
Rhaco::constant("LOG_DISP_HTML",true);
Rhaco::constant("SESSION_CACHE_LIMITER","nocache");
Rhaco::constant(VAR_CURRENT_EVENT,"1");
Rhaco::constant(VAR_HEAD_TITLE,"rhaco kaigi 2009 new year party");
Rhaco::constant(VAR_HEAD_MSG,"rhaco-ja 新年会開催！");
Rhaco::constant(VAR_QUESTION,"rhaco-users.jp がサポートしている PHPライブラリの名前は？");
Rhaco::constant(VAR_ANSWER,"rhaco");
Rhaco::constant("DATABASE_kaigi_HOST","/Users/riaf/Sites/rhaco_kaigi/work/test.db");
Rhaco::constant("DATABASE_kaigi_USER","");
Rhaco::constant("DATABASE_kaigi_PASSWORD","");
Rhaco::constant("DATABASE_kaigi_NAME","kaigi");
Rhaco::constant("DATABASE_kaigi_PORT","");
Rhaco::constant("DATABASE_kaigi_ENCODE","UTF8");
Rhaco::constant("DATABASE_kaigi_TYPE","database.controller.DbUtilSQLite");
Rhaco::constant("DATABASE_kaigi_PREFIX","KAI_");
Rhaco::constant("APPLICATION_ID",strtoupper(preg_replace("/[\/\:\.]/","",Rhaco::constant("CONTEXT_URL"))));
Rhaco::import("resources.Message");
Rhaco::import("abbr.L");
?>