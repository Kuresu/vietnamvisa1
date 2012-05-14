<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function admin_url($uri = '')
{
    $CI =& get_instance();
    
	if(is_array($uri)) {
		$uri = implode('/', $uri);
	}
    return site_url($CI->uri->segment(1).'/'.$uri);
}


function admin_redirect($uri = '', $method = 'location', $http_response_code = 302)
{
    $CI =& get_instance();
    
    if ( ! preg_match('#^https?://#i', $uri)) {
        $uri = $CI->uri->segment(1).'/'.$uri;
    }
    
    redirect($uri, $method, $http_response_code);
}


function css_link($css_file = '', $module = '', $folder = 'css')
{
    if($module == '') {
        $CI =& get_instance();
        $module = $CI->router->fetch_module();
    }
    return base_url().'public/'.$module.'/'.$folder.'/'.$css_file;
}

function img_link($img_file = '', $module = '', $folder = 'img')
{
    if($module == '') {
        $CI =& get_instance();
        $module = $CI->router->fetch_module();
    }
    return base_url().'public/'.$module.'/'.$folder.'/'.$img_file;
}

function js_link($js_file = '', $module = '', $folder = 'js')
{
    if($module == '') {
        $CI =& get_instance();
        $module = $CI->router->fetch_module();
    }
    return base_url().'public/'.$module.'/'.$folder.'/'.$js_file;
}


function action_link($method = '', $controller = '')
{
    if($controller == '') {
        $CI =& get_instance();
        $controller = $CI->router->class;
    }
    
    return admin_url($controller.'/'.$method);
}


function go_back($default = '')
{
	if(isset($_SERVER['HTTP_REFERER'])) {
		$default = $_SERVER['HTTP_REFERER'];
	}
	
	redirect($default);
}


function current_link()
{
    return current_url().($_SERVER['QUERY_STRING'] ? '/?'.$_SERVER['QUERY_STRING'] : '');
}


function utf8_to_ascii($str)
{
	$chars = array(
		'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
		'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
		'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị','I'),
		'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
		'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'd'	=>	array('đ','Đ'),
	);
	foreach ($chars as $key => $arr) 
		$str = str_replace($arr, $key, $str);

	return $str;
}

function ascii_link($title = '', $char = '-')
{
    $name = strtolower(utf8_to_ascii($title));
    $name = preg_replace("/[^a-z0-9]/i", ' ', $name);// a-z - . space
    $name = preg_replace("/\s{2,}/i" , ' ', trim($name));// Replace 2 or more space = 1 space
	$name = str_replace(' ', $char, $name);
    return $name;
}


function format_type_money($str, $decimal = ".")
{
		$a = $str; 
		$c = ""; 
		$b = "";
		if(strlen($a) > 3){
			while(strlen($a) > 3){
				$b = substr($a, strlen($a)-3, strlen($a)-1);
				$a = substr($a, 0, strlen($a)-3);
				strlen($a) > 3?($c = $decimal . $b . $c):($c = $a . $decimal . $b . $c);
			}
		}else{
			$c = $str;
		}
		return $c;
}


function download_link($doc_ascii_name = '', $ext = '/')
{
	$CI =& get_instance();
	$CI->load->helper('string');
	
	if(!isset($_SESSION['dl_key'])) 
	{		
		$dl_key = random_string('unique');
		$_SESSION['dl_key'] = $dl_key;
		//setcookie("dl_key", $dl_key, time() + 20*60);// 20 minutes
	}
	else 
	{
		$dl_key = $_SESSION['dl_key'];
	}
	
	//$sid = $CI->encrypt->encode($doc_ascii_name, $_SERVER['REMOTE_ADDR'].'_'.$dl_key);
	$sid = md5($doc_ascii_name.'_'.$_SERVER['REMOTE_ADDR'].'_'.$dl_key);
	
    return base_url().'download/'.$sid.'/'.$doc_ascii_name.$ext;
}