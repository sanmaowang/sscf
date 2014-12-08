<?php

// defining environment
if (preg_match('/.local$/', $_SERVER['HTTP_HOST'])) {
  define('ENV', 'development');
} else {
  define('ENV', 'production');
}

define('ALBUM_PAGE_ITEM_COUNT', 6);
define('IMG_CLOUD','http://seastar.b0.upaiyun.com');

?>