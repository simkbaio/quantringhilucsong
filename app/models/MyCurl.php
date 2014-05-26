<?php
class MyCurl {
	public $curl;
	public $url;
	public $post;
	public function __construct($url=""){
		$this->post = 0;
		$this->curl = curl_init();
		$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624
		Netscape/7.1 (ax)";
		curl_setopt($this->curl, CURLOPT_URL, $url); 
		curl_setopt($this->curl, CURLOPT_USERAGENT, $agent);
		// curl_setopt($this->curl, CURLOPT_POST, $this->$post);
		curl_setopt($this->curl, CURLOPT_HEADER, false);
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->curl, CURLOPT_COOKIESESSION, true);
		curl_setopt($this->curl, CURLOPT_COOKIEFILE, public_path().'/cookiet.txt');
		curl_setopt($this->curl, CURLOPT_COOKIEJAR, public_path().'/cookiet.txt');
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);  // Return Page contents.
	}
	// get - set thuộc tính cho curl;
	public function URL($url=false){
		if($url==false){
			return $this->url;
		}else{
			$this->url = $url;
			curl_setopt($this->curl, CURLOPT_URL, $url); 
		}
	}
	public function POSTFIELD($POSTFIELD=""){
		curl_setopt($this->curl, CURLOPT_POSTFIELDS,$POSTFIELD);
	}
	public function FOLLOW($follow = 0){
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, $follow);
	}
	//set POST 
	public function POST($post = 0){
		$this->post = $post;
		curl_setopt($this->curl, CURLOPT_POST, $this->post);

	}
	//setOP
	public function setOP($data=NULL){
		if(!$data){
			return false;
		}
		try {
			if(is_array($data[0])){
			foreach($data as $item){
				curl_setopt($this->curl, $item[0],$item[1]); 
			}
		}else{
			curl_setopt($this->curl, $data[0],$data[1]); 
		}
			
		} catch (Exception $e) {
			return false;
		}
		return true;
	}

	public function execute(){
		return curl_exec($this->curl);
	}
	public function stop(){
		curl_close($this->curl);
	}

}