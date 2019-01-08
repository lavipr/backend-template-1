<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Tree;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Tree\ImmutableNodeTrait;
use Joomla\CMS\Tree\NodeInterface;

/**
 * Defines the trait for a Node Interface Trait Class.
 *
 * @since  __DEPLOY_VERSION__
 */
trait NodeTrait
{
	use ImmutableNodeTrait;

	/**
	 * Set the parent of this node
	 *
	 * If the node already has a parent, the link is unset
	 *
	 * @param   NodeInterface|null  $parent  NodeInterface for the parent to be set or null
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function setParent(NodeInterface $parent)
	{
		if (!is_null($this->_parent))
		{
			$key = array_search($this, $this->_parent->_children);
			unset($this->_parent->_children[$key]);
		}

		$this->_parent = $parent;

		$this->_parent->_children[] = & $this;

		if (count($this->_parent->_children) > 1)
		{
			end($this->_parent->_children);
			$this->_leftSibling = prev($this->_parent->_children);
			$this->_leftSibling->_rightsibling = $this;
		}
	}

	/**
	 * Add child to this node
	 *
	 * If the child already has a parent, the link is unset
	 *
	 * @param   NodeInterface  $child  The child to be added.
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function addChild(NodeInterface $child)
	{
		$child->setParent($this);
	}

	/**
	 * Remove a specific child
	 *
	 * @param   integer  $id  ID of a node
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function removeChild($id)
	{
		$key = array_search($this, $this->_parent->_children);
		unset($this->_parent->_children[$key]);
	}

	/**
	 * Function to set the left or right sibling of a node
	 *
	 * @param   NodeInterface  $sibling  NodeInterface object for the sibling
	 * @param   boolean        $right    If set to false, the sibling is the left one
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function setSibling(NodeInterface $sibling, $right = true)
	{
		if ($right)
		{
			$this->_rightSibling = $sibling;
		}
		else
		{
			$this->_leftSibling = $sibling;
		}
	}
}
