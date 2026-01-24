<?php
namespace App\Http\Components;

class PageHelper{
    private $xml_path=null;
    private $data=null;
    private $conf=null;

//	private $isSmartphone=null;

    public function init(){
	}
	public function setData($name){
        $xml_path=resource_path('xml/web.xml');
		if(!file_exists($xml_path)){
			throw new \Exception('web.xmlがありません。');
		}
		$this->conf['name'] = $name;

		$xml = simplexml_load_file($xml_path);
		$this->data = json_decode(json_encode($xml->{'conf-list'}), true);

//		$ua=$_SERVER['HTTP_USER_AGENT']??'';
//		if((strpos($ua,'iPhone')!==false)||(strpos($ua,'iPod')!==false)||(strpos($ua,'Android')!==false)) {
//			$this->isSmartphone=true;
//		}else{
//			$this->isSmartphone=false;
//		}
		$this->_settingConfig();
	}

	private function _settingConfig(){
        $name = $this->conf['name'];

        $keys =['robots','title','keywords','description'];

		foreach($keys AS $val){
			if(isset($this->data[$name])){
				//モジュールすらない場合
				$this->conf[$val]=$this->data[$name][$val];
			}else{
				$this->conf[$val]=$this->data['default'][$val];
			}

			//空の場合array[0]{}になるので空文字列をセット
			if(empty($this->conf[$val]))$this->conf[$val]='';
		}
		if(empty($this->conf['robots']))$this->conf['robots']='yes';

		$this->replace('SITE_NAME',env('APP_NAME'));
	}


	public function setConfig($key,$txt){
		if(in_array($key,['title','keywords','description','published_time','modified_time','next','prev','canonical'])){
			$this->conf[$key]=$txt;
		}elseif(in_array($key,['tags'])){
			$this->conf[$key][]=$txt;
		}
	}

	//出力
    public function get($key){
        if(array_key_exists($key,$this->conf)){
//        	return $this->conf[$key];
            return preg_replace('(%\_[_0-9A-Z]+\_%)','',$this->conf[$key]);
        }else{
            return '';
        }
    }

 	public function add($val,$key){
		$this->conf[$key]=$val;
	}


	//手前に文字追加
	public function prepend($str,$key=null){
		//手前
		if($key){
			foreach($this->conf AS $k=>$v){
				if($k==$key){
					$this->conf[$k]=$str.$this->conf[$k];
				}
			}
		}else{
			foreach($this->conf AS $k=>$v){
				if($k=='title' || $k=='keywords' || $k=='description'){
					$this->conf[$k]=$str.$this->conf[$k];
				}
			}
		}
	}

	//後ろに文字追加
	public function append($str,$key=null){
		if($key){
			foreach($this->conf AS $k=>$v){
				if($k==$key){
					$this->conf[$k]=$this->conf[$k].$str;
				}
			}
		}else{
			foreach($this->conf AS $k=>$v){
				if($k=='title' || $k=='keywords' || $k=='description'){
					$this->conf[$k]=$this->conf[$k].$str;
				}
			}
		}
	}

	public function replace($pattern,$replacement,$key=null){
		if($key){
			foreach($this->conf AS $k=>$v){
				if($k==$key){
					$this->conf[$k]=preg_replace('/'.preg_quote('%_'.$pattern.'_%').'/',$replacement,$this->conf[$k]);
				}
			}
		}else{
			foreach($this->conf AS $k=>$v){
				$this->conf[$k]=preg_replace('/'.preg_quote('%_'.$pattern.'_%').'/',$replacement,$this->conf[$k]);
			}
		}
	}

    public function setRobots($flg){
        if($flg){
            $this->conf['robots']='yes';
        }else{
            $this->conf['robots']='no';
        }
    }

	public function setModuleName($name){
		$this->conf['module'] = $name;
        $this->_settingConfig();
	}
	public function setControllerName($name){
		$this->conf['controller'] = $name;
        $this->_settingConfig();
	}
	public function setActionName($name){
		$this->conf['action'] = $name;
        $this->_settingConfig();
	}

	public function getConf(){
		return $this->conf;
	}
}









