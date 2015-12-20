<?php
class Translator {

  private $language	= 'en';
	private $lang 		= array();
	
	public function __construct($language){
		$this->language = $language;
    $this->findLangs();
	}
	
  private function findString($str) {
    if (array_key_exists($str, $this->lang[$this->language])) {
			return $this->lang[$this->language][$str];
    }
    return $str;
  }
    
	private function splitStrings($str) {
    return explode('=',trim($str));
	}
	
  private function findLangs(){
    if (count($this->lang) == 0){
      foreach (glob(dirname(__FILE__).'/translation/??.txt') as $file) {
        if (preg_match('/\/([^\/]+)\.txt$/', $file, $l)){
          $strings = array_map(array($this,'splitStrings'),file($file));
          foreach ($strings as $v) {
            if ($v[0]){
              $this->lang[$l[1]][$v[0]] = $v[1];
            }
          }
        }
      }
    }
    return $this->lang;
  }
  
  public function getLangs(){
    // die (print_r($this->lang));
    $ret = array();
    foreach (array_keys($this->lang) as $k){
      if ($k == $this->language){
        array_unshift($ret,$k);
      } else {
        array_push($ret,$k);
      }
    }
    return $ret;
  }

  public function t($str) {
    if (!array_key_exists($this->language, $this->lang)) {
    	$file = dirname(__FILE__).'/translation/'.$this->language.'.txt';
      if (file_exists($file)) {
        $strings = array_map(array($this,'splitStrings'),file($file));
        foreach ($strings as $k => $v) {
					if ($v[0]){
						$this->lang[$this->language][$v[0]] = $v[1];
					}
        }
        return $this->findString($str);
      } else {
        return $str;
      }
		} else {
			return $this->findString($str);
		}
	}
	public function __($str) {
//		echo $this->t($str);
		echo $this->findString($str);
		return;
	}
}
?>
