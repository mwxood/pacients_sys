<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', __DIR__ . DS . '..' . DS . '..');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."new_config.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."home.php");
require_once(INCLUDES_PATH.DS."posts.php");
// require_once(INCLUDES_PATH.DS."settings.php");
// require_once(INCLUDES_PATH.DS."services.php");
// require_once(INCLUDES_PATH.DS."home_contacts.php");
// require_once(INCLUDES_PATH.DS."home_about.php");
// require_once(INCLUDES_PATH.DS."about_us.php");
// require_once(INCLUDES_PATH.DS."rare_diseases.php");
// require_once(INCLUDES_PATH.DS."contact.php");
// require_once(INCLUDES_PATH.DS."banner.php");
// require_once(INCLUDES_PATH.DS."price_list.php");
// require_once(INCLUDES_PATH.DS."contact_form.php");
// require_once(INCLUDES_PATH.DS."gallery.php");
// require_once(INCLUDES_PATH.DS."paginate.php");  


