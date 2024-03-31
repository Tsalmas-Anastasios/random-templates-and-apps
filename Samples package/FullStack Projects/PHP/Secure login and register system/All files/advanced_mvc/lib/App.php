<?php
class App {

	private $data = [];

    function __construct($params) {
		foreach ($params as $k => $v) {
			$this->data[$k] = $v;
		}
    }

	function __set($name, $value) {
        $this->data[$name] = $value;
    }

    function __get($name) {
		switch ($name) {
			case 'route':
				if (!isset($this->data[$name])) {
					$this->data[$name] = new Route($this);
				}
			break;
		}
        return array_key_exists($name, $this->data) ? $this->data[$name] : null;
    }

	static function root_url() {
		$protocol = 'http://';
		if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) {
		    $protocol = 'https://';
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
		    $protocol = 'https://';
		}
		return rtrim($protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/');
	}

	static function redirect($location) {
		header('Location: ' . App::root_url() . '/' . ltrim($location, '/'));
		exit;
	}

	static function print_r($value) {
		echo '<pre>';
		print_r($value);
		echo '</pre>';
	}

}
?>
