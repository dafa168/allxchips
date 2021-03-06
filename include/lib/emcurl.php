<?php

class EmCurl {
	protected $_useragent = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36';
	protected $_url;
	protected $_followlocation = false;
	protected $_timeout;
	protected $_maxRedirects = 0;
	protected $_post;
	protected $_postFields;
	protected $_referer = BLOG_URL;
	protected $_response;
	protected $_includeHeader;
	protected $_noBody;
	protected $_status;

	public $authentication = false;
	public $auth_name = '';
	public $auth_pass = '';

	public function __construct($timeOut = 5, $includeHeader = false, $noBody = false) {
		$this->_timeout = $timeOut; // second
		$this->_noBody = $noBody;
		$this->_includeHeader = $includeHeader;
	}

	public function setPost($postFields) {
		$this->_post = true;
		$this->_postFields = $postFields;
	}

	public function request($url = 'nul') {
		if ($url !== 'nul') {
			$this->_url = $url;
		}

		$s = curl_init();

		curl_setopt($s, CURLOPT_URL, $this->_url);
		curl_setopt($s, CURLOPT_HTTPHEADER, array('Expect:'));
		curl_setopt($s, CURLOPT_TIMEOUT, $this->_timeout);
		curl_setopt($s, CURLOPT_MAXREDIRS, $this->_maxRedirects);
		curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($s, CURLOPT_FOLLOWLOCATION, $this->_followlocation);
		curl_setopt($s, CURLOPT_SSL_VERIFYPEER, false); // 规避ssl的证书检查
		curl_setopt($s, CURLOPT_SSL_VERIFYHOST, 0);     // 跳过host验证

		if ($this->authentication) {
			curl_setopt($s, CURLOPT_USERPWD, $this->auth_name . ':' . $this->auth_pass);
		}

		if ($this->_post) {
			curl_setopt($s, CURLOPT_POST, true);
			curl_setopt($s, CURLOPT_POSTFIELDS, $this->_postFields);
		}

		if ($this->_includeHeader) {
			curl_setopt($s, CURLOPT_HEADER, true);
		}

		if ($this->_noBody) {
			curl_setopt($s, CURLOPT_NOBODY, true);
		}

		curl_setopt($s, CURLOPT_USERAGENT, $this->_useragent);
		curl_setopt($s, CURLOPT_REFERER, $this->_referer);

		$this->_response = curl_exec($s);
		$this->_status = curl_getinfo($s, CURLINFO_HTTP_CODE);
		curl_close($s);
	}

	public function getHttpStatus() {
		return $this->_status;
	}

	public function getRespone() {
		return $this->_response;
	}
}
