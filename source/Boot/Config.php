<?php

// DATABASE
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "db_bugdet");

// URLs
define("CONF_URL_BASE", "https://www.bugdet.com.br");
define("CONF_URL_TEST", "https://www.localhost/budget-front");


// DATES
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

// VIEW
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");

// MESSAGE
define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "info icon-info");
define("CONF_MESSAGE_SUCCESS", "p-4 rounded-2xl bg-green-100 text-green-800 border border-green-300");
define("CONF_MESSAGE_WARNING", "max-w-md mx-auto mt-4 p-4 rounded-2xl bg-red-100 text-red-800 border border-red-300");
define("CONF_MESSAGE_ERROR", "max-w-md mx-auto mt-4 p-4 rounded-2xl bg-red-100 text-red-800 border border-red-300");
define("CONF_IMG_ERROR", "d=\'M5 13l4 4L19 \7'");
define("CONF_IMG_SUCESS", "d=\'M6 18L18 6M6 6l12 12\'");