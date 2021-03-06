<?php

	namespace App\DeadMoras;

	use Mcrypt;

	class Cookie {
		/**
		 *
		 * @var object
		 */
		private $mobject;
		private static $cookie_object;

		private function __construct() {}

		public static function instance() {
			if (self::$cookie_object == NULL && self::$cookie_object == FALSE) {
				self::$cookie_object = new Cookie;
			}
			return self::$cookie_object;
		}

		/**
		 *
		 * @param string $name
		 * @param mixed $value
		 * @param time|string $time
		 * @param string $domens
		 * @param boolean $httponly
		 */
		public function set($name, $value, $time = FALSE, $domens = FALSE, $httponly = FALSE) {
			$value = $this->mcrypt()->encrypt($value);
			setcookie($name, $value, $time, $domens, $httponly);
		}

		/**
		 *
		 * @param string $name
		 * @return mixed
		 */
		public function get($name) {
			$value = empty($_COOKIE[$name]) ? 'Пусто' : $this->mcrypt()
					->decrypt($_COOKIE[$name]);
			return $value;
		}

		/**
		 *
		 * @param string $name
		 */
		public function remove($name) {
			$this->set($name, "0", time() - 1, "/");
		}

		/**
		 *
		 * @param string $name
		 * @return boolean
		 */
		public function has($name) {
			if ($_COOKIE[$name] !== NULL) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		/**
		 *
		 * @return object
		 */
		private function mcrypt() {
			if ($this->mobject == NULL) {
				$this->mobject = new Mcrypt;
			}
			return $this->mobject;
		}
	}