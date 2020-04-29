<?php

//////////////////////////////////////////////////////////////////////////////80
// Filmanager Dialog
//////////////////////////////////////////////////////////////////////////////80
// Copyright (c) Atheos & Liam Siira (Atheos.io), distributed as-is and without
// warranty under the modified License: MIT - Hippocratic 1.2: firstdonoharm.dev
// See [root]/license.md for more. This information must remain intact.
//////////////////////////////////////////////////////////////////////////////80
// Authors: Codiad Team, @Fluidbyte, Atheos Team, @hlsiira
//////////////////////////////////////////////////////////////////////////////80

require_once('../../common.php');

//////////////////////////////////////////////////////////////////////////////80
// Verify Session or Key
//////////////////////////////////////////////////////////////////////////////80
Common::checkSession();

$action = Common::data("action");
$path = Common::data("path");
$name = Common::data("name");

$type = Common::data("type");


if (!$action) {
	Common::sendJSON("E401m");
	die;
}
switch ($action) {

	//////////////////////////////////////////////////////////////////////////80
	// Preview
	//////////////////////////////////////////////////////////////////////////80
	case 'preview':
		?>
		<form>
			<h3><i class="fas fa-eye"></i><?php i18n("Inline Preview"); ?></h3>
			<div>
				<br><br><img src="<?php echo(str_replace(BASE_PATH . "/", "", WORKSPACE) . "/" . $path); ?>"><br><br>
			</div>
			<button class="btn-right" onclick="atheos.modal.unload();return false;"><?php i18n("Close"); ?></button>
		</form>

		<?php
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Default: Invalid Action
	//////////////////////////////////////////////////////////////////////////80
	default:
		Common::sendJSON("E401i");
		break;
}