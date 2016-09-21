<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_agency
 *
 * @copyright   Copyright (C) 2015 - 2016 Christophe Avonture. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);

// Include the syndicate functions only once
require_once __DIR__.DS.'helper.php';

$infos=ModAgencyHelper::getInfos($params);
$moduleclass_sfx=htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_agency', $params->get('layout', 'default'));
