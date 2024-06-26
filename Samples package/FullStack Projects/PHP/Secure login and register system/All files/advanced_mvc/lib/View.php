<?php
class View {

	static $blocks = array();

	static function make($file, $data = array()) {
		$cached = self::cache($file);
	    extract($data, EXTR_SKIP);
	    require $cached;
	}

	static function cache($file) {
		if (!file_exists(cache_path)) {
		  	mkdir(cache_path, 0744);
		}
	    $cacheLocation = cache_path . str_replace(array('/', '.html'), array('_', ''), $file . '.php');
	    if (!cache_enabled || !file_exists($cacheLocation) || filemtime($cacheLocation) < filemtime(BASE_PATH . '/app/views/' . $file)) {
			$code = self::includeFiles(BASE_PATH . '/app/views/' . $file);
			$code = self::compileCode($code);
	        file_put_contents($cacheLocation, '<?php class_exists(\'' . __CLASS__ . '\') or exit; ?>' . PHP_EOL . $code);
	    }
		return $cacheLocation;
	}

	static function clearCache() {
		foreach(glob(cache_path . '*') as $file) {
			unlink($file);
		}
	}

	static function compileCode($code) {
		$code = self::compileBlock($code);
		$code = self::compileYield($code);
		$code = self::compileEscapedEchos($code);
		$code = self::compileEchos($code);
		$code = self::compileStatic($code);
		$code = self::compileUrl($code);
		$code = self::compilePHP($code);
		return $code;
	}

	static function includeFiles($file) {
		$code = file_get_contents($file);
		preg_match_all('/{% ?(extends|include) ?\'?(.*?)\'? ?%}/i', $code, $matches, PREG_SET_ORDER);
		foreach ($matches as $value) {
			$code = str_replace($value[0], self::includeFiles(BASE_PATH . '/app/views/' . $value[2]), $code);
		}
		$code = preg_replace('/{% ?(extends|include) ?\'?(.*?)\'? ?%}/i', '', $code);
		return $code;
	}

	static function compileStatic($code) {
		$protocol = 'http://';
		if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) {
		    $protocol = 'https://';
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
		    $protocol = 'https://';
		}
		$current_link = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
		return preg_replace('/{% ?static ?\'?(.*?)\'? ?%}/i', '<?php echo "' . $current_link . '/app/static/$1" ?>', $code);
	}

	static function compileUrl($code) {
		return preg_replace('/{% ?url ?\'?(.*?)\'? ?%}/i', '<?php echo "' . App::root_url() . '/$1" ?>', $code);
	}

	static function compilePHP($code) {
		return preg_replace('~\{%\s*(.+?)\s*\%}~is', '<?php $1 ?>', $code);
	}

	static function compileEchos($code) {
		return preg_replace('~\{{\s*(.+?)\s*\}}~is', '<?php echo $1 ?>', $code);
	}

	static function compileEscapedEchos($code) {
		return preg_replace('~\{{{\s*(.+?)\s*\}}}~is', '<?php echo htmlentities($1, ENT_QUOTES, \'UTF-8\') ?>', $code);
	}

	static function compileBlock($code) {
		preg_match_all('/{% ?block ?(.*?) ?%}(.*?){% ?endblock ?%}/is', $code, $matches, PREG_SET_ORDER);
		foreach ($matches as $value) {
			if (!array_key_exists($value[1], self::$blocks)) self::$blocks[$value[1]] = '';
			if (strpos($value[2], '@parent') === false) {
				self::$blocks[$value[1]] = $value[2];
			} else {
				self::$blocks[$value[1]] = str_replace('@parent', self::$blocks[$value[1]], $value[2]);
			}
			$code = str_replace($value[0], '', $code);
		}
		return $code;
	}

	static function compileYield($code) {
		foreach(self::$blocks as $block => $value) {
			$code = preg_replace('/{% ?yield ?' . $block . ' ?%}/', $value, $code);
		}
		$code = preg_replace('/{% ?yield ?(.*?) ?%}/i', '', $code);
		return $code;
	}

}
?>
