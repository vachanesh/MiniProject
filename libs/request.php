<?php
	/**
	* This class is use for track the url content
	*/
	class Request {
		
		private $_controller;

		private $_method;

		private $_args;

		public function __construct() {
			// replace project name from url only for local env
			$url = str_replace('/MiniProject', '', $_SERVER['REQUEST_URI']);
			//for serve env
			// $url = $_SERVER['REQUEST_URI'];
			$parts = explode('/',$url);
			$parts = array_filter($parts);
				
			$this->_controller = ($c = array_shift($parts))? ucfirst($c): 'Home';
			$this->_method = ($c = array_shift($parts))? $c: 'index';
			$this->_args = (isset($parts[0])) ? $parts : array();
		}

		public function getController() {
			return $this->_controller;
		}

		public function getMethod() {
			return $this->_method;
		}
		
		public function getArgs() {
			return $this->_args;
		}
	}