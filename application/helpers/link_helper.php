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
		'a'	=>	array('áº¥','áº§','áº©','áº«','áº­','áº¤','áº¦','áº¨','áºª','áº¬','áº¯','áº±','áº³','áºµ','áº·','áº®','áº°','áº²','áº´','áº¶','Ã¡','Ã ','áº£','Ã£','áº¡','Ã¢','Äƒ','Ã�','Ã€','áº¢','Ãƒ','áº ','Ã‚','Ä‚'),
		'e' =>	array('áº¿','á»�','á»ƒ','á»…','á»‡','áº¾','á»€','á»‚','á»„','á»†','Ã©','Ã¨','áº»','áº½','áº¹','Ãª','Ã‰','Ãˆ','áºº','áº¼','áº¸','ÃŠ'),
		'i'	=>	array('Ã­','Ã¬','á»‰','Ä©','á»‹','Ã�','ÃŒ','á»ˆ','Ä¨','á»Š'),
		'o'	=>	array('á»‘','á»“','á»•','á»—','á»™','á»�','á»’','á»”','Ã”','á»˜','á»›','á»�','á»Ÿ','á»¡','á»£','á»š','á»œ','á»ž','á» ','á»¢','Ã³','Ã²','á»�','Ãµ','á»�','Ã´','Æ¡','Ã“','Ã’','á»Ž','Ã•','á»Œ','Ã”','Æ '),
		'u'	=>	array('á»©','á»«','á»­','á»¯','á»±','á»¨','á»ª','á»¬','á»®','á»°','Ãº','Ã¹','á»§','Å©','á»¥','Æ°','Ãš','Ã™','á»¦','Å¨','á»¤','Æ¯'),
		'y'	=>	array('Ã½','á»³','á»·','á»¹','á»µ','Ã�','á»²','á»¶','á»¸','á»´'),
		'd'	=>	array('Ä‘','Ä�'),
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