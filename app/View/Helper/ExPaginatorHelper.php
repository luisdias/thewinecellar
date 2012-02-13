<?php
/**
 * Extends the PaginatorHelper
 */
 
App::uses('PaginatorHelper', 'View/Helper');
 
class ExPaginatorHelper extends PaginatorHelper {
 
	/**
	 * Adds and 'asc' or 'desc' class to the sort links
	 * @see /cake/libs/view/helpers/PaginatorHelper#sort($title, $key, $options)
	 */
	public function sort($key, $title = null, $options = array()) {
 
		// get current sort key & direction
		$sortKey = $this->sortKey();
		$sortDir = $this->sortDir();
 
		// add $sortDir class if current column is sort column
		if ($sortKey == $key && $key !== null) {
 
			$options['class'] = $sortDir;
 
		}
 
		return parent::sort($key,$title,$options);
 
	}
 
}