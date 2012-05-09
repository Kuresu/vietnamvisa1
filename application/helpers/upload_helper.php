<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author  Nguyen Xuan Hung
 * @date    24.02.2011
 */
function create_dir($dirName)
{
    $dirs = explode('/', $dirName);
    $dir  = '';
    foreach ($dirs as $part) {
        $dir .= $part.'/';
        if (!is_dir($dir) && strlen($dir) > 0)
            mkdir($dir, 0777);
            //chmod($dir, 0777);
    }
}

/**
 * @author  Nguyen Xuan Hung
 * @date    03.03.2011
 */
function remove_dir($dir)
{
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!$this->remove_dir($dir.DIRECTORY_SEPARATOR.$item)) return false;
    }
    return rmdir($dir);
}

/**
 * @author  Nguyen Xuan Hung
 * @date    03.03.2011
 */
function get_ext($filename = '')
{
	$pieces = explode('.', $filename);
	return strtolower($pieces{count($pieces) - 1});
}

