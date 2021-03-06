<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_templates
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<div id="template-manager-delete" class="container-fluid">
	<div class="mt-2">
		<div class="col-md-12">
			<p><?php echo Text::sprintf('COM_TEMPLATES_MODAL_FILE_DELETE', $this->fileName); ?></p>
		</div>
	</div>
</div>