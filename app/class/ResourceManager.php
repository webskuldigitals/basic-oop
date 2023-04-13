<?php

class ResourceManager {

    /**
     * @param array<mixed> $data
     */
    public static function getContent( array $data)
    {
		$fileType = $data['b'];
		$moduleName = $data['a'];
		$fileName = $data['c'];

		if(empty($fileType) || empty($moduleName) || empty($fileName)){
			die;
		}

        switch ($fileType) {
            case 'css' : 
				header("Content-type: text/css", true);
                echo file_get_contents(ABS_PATH . DS . '..' . DS . 'module' . DS . $moduleName . DS . 'res' . DS . $fileType . DS . $fileName);
				return;
            break;
            case 'js' : 
				header('Content-Type: application/javascript');
                echo file_get_contents(ABS_PATH . DS . '..' . DS . 'module' . DS . $moduleName . DS . 'res' . DS . $fileType . DS .$fileName);
				return;
            break;
            case 'phpjs' : 
				header('Content-Type: application/javascript');
                ob_start();
                include_once ABS_PATH . DS . '..' . DS . 'module' . DS . $moduleName . DS . 'res' . DS . $fileType . DS .$fileName;
                $sContent = ob_get_contents();
                ob_end_clean();
                echo $sContent;
				return;
            break;
			case 'img':
				echo file_get_contents(ABS_PATH . DS . '..' . DS . 'module' . DS . $moduleName . DS . 'res' . DS . $fileType . DS .$fileName);
				return;
			break;

        }
    }
    
	/**
	 * method to generate url to resource
	 * @param string $sModule module name
	 * @param string $sType resource type
	 * @param string $sFile resource file
	 * @param array $aQueryString additional elements of query string
	 * @return string
	 */
	public static function getUrl( $sModule, $sType, $sFile, array $aQueryString = array() ){
		$sQueryString = null;
		if( ! empty( $aQueryString ) ){
			$aQSTmp = array();
			foreach( $aQueryString as $sKey => $mValue ){
				$aQSTmp[] = $sKey . '=' . $mValue;
			}
			if( !empty( $aQSTmp ) ){
				$sQueryString = '?' . implode( '&', $aQSTmp );
			}
		}

		return 'res/' . $sModule . '/' . strtolower($sType) . '/' . $sFile . ( empty( $sQueryString ) ? '' : $sQueryString );
	}

    /*
	* Load Module Level Resources
	* @param - string $moduleName
	* @param - array $resources
	*          ['js' => [],'css' => [],'phpjs' =>[]]
	* @param - array $config
	*/
	public static function loadResources($moduleName,$resources,$config = []){
	    $defaults = array_merge($config,['version'=>time()]);
	    $cssJs ='';
	    foreach($resources as $type => $resource){
	        foreach($resource as $file){
	            if($type == 'css'){
	                $cssJs .= "<link rel='stylesheet' href='".self::getUrl($moduleName, 'css', $file.'.css' ). "?ver=".$defaults['version']."'/>";
	            }elseif($type == 'js' || $type == 'phpjs'){
	                $cssJs .= "<script type='text/javascript' src='".self::getUrl($moduleName, $type, $file.'.js' ). "?ver=".$defaults['version']."'></script>";
	            }elseif($type == 'img'){
	                $cssJs .= self::getUrl($moduleName, $type, $file ). "?ver=".$defaults['version'];
	            }
	        }
	    }
	    return $cssJs;
	}
	
}