<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Extension;

defined('JPATH_PLATFORM') or die;

/**
 * Loads extensions.
 *
 * @since  4.0.0
 */
interface ExtensionManagerInterface
{
	/**
	 * Boots the component with the given name.
	 *
	 * @param   string  $component  The component to boot.
	 *
	 * @return  ComponentInterface
	 *
	 * @since   4.0.0
	 */
	public function bootComponent($component): ComponentInterface;

	/**
	 * Boots the module with the given name.
	 *
	 * @param   string  $module           The module to boot
	 * @param   string  $applicationName  The application name
	 *
	 * @return  ModuleInterface
	 *
	 * @since   4.0.0
	 */
	public function bootModule($module, $applicationName): ModuleInterface;
}
