<?php

//walletnode ip

$localip='127.0.0.1';

//on/off

$webmode=0;

//hidemenu

$hidemkey=0;

//index word

$indexm=1;

//language

$lang="en";

//system

$sysweb=10;
$syslocal=30;

//freekeva

$freekeva="http://galaxyos.io/";


//hide namespace

$hidenkey=1;




if($webmode==1){

$keva="off";
$keva_add="off";
$unsub="off";

$message_num=5000;

$tag_address="-";



}

if($webmode==0){

$keva="on";
$keva_add="on";
$unsub="on";

$message_num=50000;

}



class Keva {
    private $username;
    private $password;
    private $proto;
    var $host;
    private $port;
    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = 'galaxy'; // RPC Username
        $this->password      = 'frontier'; // RPC Password
        $this->host          = $host; // Localhost
        $this->port          = '9992';
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}




class Raven {
    private $username;
    private $password;
    private $proto;
    var $host;
    private $port;
    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = 'galaxy'; // RPC Username
        $this->password      = 'frontier'; // RPC Password
        $this->host          = $host; // Localhost
        $this->port          = '9991';
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}

function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return array($httpCode, $response);
}


function turnUrlIntoHyperlink($string){
    //The Regular Expression filter
    $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

    // Check if there is a url in the text
    if(preg_match_all($reg_exUrl, $string, $url)) {

        // Loop through all matches
        foreach($url[0] as $newLinks){
            if(strstr( $newLinks, ":" ) === false){
                $link = 'http://'.$newLinks;
            }else{
                $link = $newLinks;
            }

            // Create Search and Replace strings
            $search  = $newLinks;

			//$link=str_replace("https://","",$link);
            $replace = '<a href="'.$link.'" target=_blank>'.$link.'</a>';
		
            $string = str_replace($search, $replace, $string);
        }
    }

    //Return result
    return $string;
}


function getLine($file, $line, $length = 40960){
    $returnTxt = null; 
    $i = 1; 
 
    $handle = @fopen($file, "r");
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, $length);
            if($line == $i) $returnTxt = $buffer;
            $i++;
        }
        fclose($handle);
    }
    return $returnTxt;}

//utf

function check_utf8($str)
  {
      $len = strlen($str);
      for($i = 0; $i < $len; $i++){
          $c = ord($str[$i]);
          if ($c > 128) {
              if (($c > 247)) return false;
              elseif ($c > 239) $bytes = 4;
              elseif ($c > 223) $bytes = 3;
              elseif ($c > 191) $bytes = 2;
              else return false;
              if (($i + $bytes) > $len) return false;
              while ($bytes > 1) {
                  $i++;
                  $b = ord($str[$i]);
                  if ($b < 128 || $b > 191) return false;
                  $bytes--;
              }
          }
      }
      return true;
  } // end of 


function utf8_to_unicode( $str ) {

    $unicode = array();        
    $values = array();
    $lookingFor = 1;

    for ($i = 0; $i < strlen( $str ); $i++ ) {
        $thisValue = ord( $str[ $i ] );
    if ( $thisValue < ord('A') ) {
        // exclude 0-9
        if ($thisValue >= ord('0') && $thisValue <= ord('9')) {
             // number
             $unicode[] = chr($thisValue);
        }
        else {
             $unicode[] = '%'.dechex($thisValue);
        }
    } else {
          if ( $thisValue < 128) 
        $unicode[] = $str[ $i ];
          else {
                if ( count( $values ) == 0 ) $lookingFor = ( $thisValue < 224 ) ? 2 : 3;                
                $values[] = $thisValue;                
                if ( count( $values ) == $lookingFor ) {
                    $number = ( $lookingFor == 3 ) ?
                        ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ):
                        ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64 );
            $number = dechex($number);
            $unicode[] = (strlen($number)==3)?"0".$number:"".$number;
                    $values = array();
                    $lookingFor = 1;
          } // if
        } // if
    }
    } // for
    return implode("",$unicode);

} // utf8_to_unicod


function replaceString($search,$replace,$content,$limit=1){
    if(is_array($search)){
        foreach ($search as $k=>$v){
            $search[$k]='`'.preg_quote($search[$k],'`').'`';
        }
    }else{
        $search='`'.preg_quote($search,'`').'`';
    }
 
    $content=preg_replace("/alt=([^ >]+)/is",'',$content);
    return preg_replace($search,$replace,$content,$limit);
}

//unicode transform

function uniworld($x_value,$address,$asset) {

	
$testvalue = $x_value;

//rasset

$letterr="$";
$lettera="!";


if($letterr==substr($x_value,0,1)){ 

$x_value=str_replace("$","",$x_value);
$address=str_replace("$","",$address);
$asset=str_replace("$","",$asset);

$lettercheck=1;
}

if($lettera==substr($x_value,-1)){ 
	
$x_value=str_replace("!","",$x_value);
$address=str_replace("!","",$address);
$asset=str_replace("!","",$asset);
$lettercheck=2;
}

//test

$search = array('g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

    foreach($search as $value){

	if(preg_match ( "'/'", $testvalue)){

			list($aleft,$aright)=explode("/",$testvalue);
		
		if(stristr($aleft,$value)!==false & stristr($aright,$value)!==false)

				{ return $x_value;}
	}

	if(preg_match ( "'#'", $testvalue)){

			list($aleft,$aright)=explode("#",$testvalue);
		
		if(stristr($aleft,$value)!==false & stristr($aright,$value)!==false  & preg_match( "'_'", $aright)==false)

				{ return $x_value;}

	}
       if(preg_match ( "'#'", $testvalue)==false & preg_match ( "'/'", $testvalue)==false & stristr($testvalue,$value)!==false){
           return $x_value;
				}
    }

//u.

$x_value=str_replace("U.","U+",$x_value);
				
				$x_value = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $x_value), ENT_NOQUOTES, 'UTF-8');

				$x_value=str_replace("U+","U.",$x_value);
				
//no special


if(strlen($x_value)==strlen($address) && preg_match ('/^[-a-zA-Z0-9 .]+$/', $x_value )){


$assetsplit=str_split($asset,4);

foreach($assetsplit as $assety)

	{

$assetx="U+".$assety."";
$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

$x_value=str_replace($assety,$utf8string,$x_value);}

}
else
	{
if(preg_match ('/^[-a-zA-Z0-9 .]+$/', $x_value ) && (strlen($x_value) % 4) && strlen($x_value))
					{
	
	$assetsplit=str_split($x_value,4);

foreach($assetsplit as $assety)
	
{
$assetx="U+".$assety."";
$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

$x_value=str_replace($assety,$utf8string,$x_value);
	

		}
	}
	else{
			
			//sub asset

		if(preg_match ( "'/'", $x_value)){

			list($aleft,$aright)=explode("/",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}

				if (!(strlen($aleft) % 4) && strlen($aleft)){

						$assetsplit=str_split($aleft,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}


		}

		//#asset

		if(preg_match ( "'#'", $x_value) ){

			list($aleft,$aright)=explode("#",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}

				if (!(strlen($aleft) % 4) && strlen($aleft)){

						$assetsplit=str_split($aleft,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}


		}


		//ID_and Lang

		

		if(preg_match ( "'_'", $x_value) ){

			list($aleft,$aright)=explode("_",$x_value);

			if (!(strlen($aright) % 4) && strlen($aright)){

						$assetsplit=str_split($aright,4);

						foreach($assetsplit as $assety)
	
															{
							$assetx="U+".$assety."";
							$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);

															}	
														}



		}


								//else
if (!(strlen($asset) % 4) && strlen($asset)){
							$assetsplit=str_split($asset,4);

							foreach($assetsplit as $assety)
								{
								$assetx="U+".$assety."";
								$utf8string = html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $assetx), ENT_NOQUOTES, 'UTF-8');

								$x_value=str_replace($assety,$utf8string,$x_value);
								}}
	}
 }

if($lettercheck==1){ $x_value="$".$x_value;}
if($lettercheck==2){ $x_value=$x_value."!";}

 return $x_value;
}





//language

if($lang=="en" or $_REQUEST["langs"]=="en")

{

$langs="cn";

$index_local="LOCAL";
$index_console="CONSOLE";
$index_word="WORD";
$index_subscription="SUBSCRIPTION";
$index_channel="CHANNEL";
$index_message="MESSAGE";
$index_asset="ASSET";
$index_tag="TAG";
$index_assetexplorer="ASSET EXPLORER";
$index_ipfsexplorer="IPFS EXPLORER";
$index_checkasset="CHECK ASSETS AVAILIABLE";

$index_link="LINK";
$index_ipfsupload="IPFS UPLOAD";
$index_magnet="MAGNET TXID";

$index_system="SYSTEM";


$keva_myaddress="KEVA ADDRESS";
$keva_newspace="CREATE NEW SPACE";
$keva_free="GET FREE CREDIT";
$keva_newspacememo="Across the blockchain we can reach every corner in the galaxy";

$keva_submit="SUBMIT";
$keva_kaw="KAW";

$keva_showall="SHOW ALL CONTENTS";
$keva_showlist="SHOW LIST";
$keva_addnew="CREATE NEW WORD";
$keva_addnewmemo="one small step, one giant leap";
$keva_subscribe="SUBSCRIBE";
$keva_subscription="SUBSCRIPTION";
$keva_linkipfs="LINK IPFS";
$keva_edit="EDIT";
$keva_delete="DELETE";
$keva_broadcast="BROADCAST";
$keva_galaxylink="GALAXY LINK";

$keva_message="MESSAGE";
$keva_send="SEND";




}

if($lang=="cn" or $_REQUEST["lang"]=="cn")

{

$langs="kr";

$index_local="本地";
$index_console="控制台";
$index_word="链文字";
$index_subscription="订阅";
$index_channel="频道";
$index_message="消息";
$index_asset="资产";
$index_tag="标签";
$index_assetexplorer="资产浏览器";
$index_ipfsexplorer="IPFS浏览器";
$index_checkasset="查询资产注册";

$index_link="网址";

$index_system="系统";

$keva_myaddress="链文字地址";
$keva_newspace="创建新空间";
$keva_newspacememo="通过区块链到银河每一个角落";
$keva_free="获取免费点数";
$keva_submit="写入区块链";
$keva_kaw="搜索";
$keva_showall="显示全部内容";
$keva_showlist="显示列表";
$keva_addnew="新建链文档";
$keva_addnewmemo="一小步, 亦是一大步";
$keva_subscribe="订阅空间";
$keva_subscription="订阅";
$keva_linkipfs="生成IPFS链接";
$keva_edit="编辑";
$keva_kcode="K码";
$keva_delete="删除";
$keva_broadcast="广播";
$keva_galaxylink="银河链接";



}

if($lang=="kr" or $_REQUEST["lang"]=="kr")

{

$langs="jp";


$index_local="LOCAL";
$index_console="콘솔";
$index_word="WORD";
$index_subscription="신청";
$index_channel="채널";
$index_message="메시지";
$index_asset="유산";
$index_tag="꼬리표";
$index_assetexplorer="";
$index_ipfsexplorer="자산 탐색기";
$index_checkasset="자산 확인";

$index_linkipfs="IPFS URL 직접";
$index_ipfsupload="IPFS UPLOAD";
$index_link="LINK";

$index_system="SYSTEM";

$keva_myaddress="KEVA ADDRESS";
$keva_newspace="새로운 공간 만들기";
$keva_free="무료 크레딧 받기";
$keva_newspacememo="Across the blockchain we can reach every corner in the galaxy";

$keva_submit="SUBMIT";
$keva_kaw="KAW";

$keva_showall="모든 콘텐츠 표시";
$keva_showlist="쇼리스트";
$keva_addnew="새로운 단어 만들기";
$keva_addnewmemo="one small step, one giant leap";
$keva_subscribe="구독";
$keva_subscription="SUBSCRIPTION";
$keva_linkipfs="링크 IPFS";
$keva_edit="편집하다";
$keva_delete="지우다";
$keva_broadcast="방송";
$keva_galaxylink="GALAXY LINK";

}

if($lang=="jp"  or $_REQUEST["lang"]=="jp")

{

$langs="en";

$index_local="LOCAL";
$index_console="コンソール";
$index_word="WORD";
$index_subscription="サブスクリプション";
$index_channel="チャネル";
$index_message="メッセージ";
$index_asset="資産";
$index_tag="ラベル";
$index_assetexplorer="アセットエクスプローラー";
$index_ipfsexplorer="IPFS EXPLORER";
$index_checkasset="資産の確認";

$index_linkipfs="IPFS URL DIRECT";
$index_ipfsupload="IPFS UPLOAD";
$index_link="LINK";

$index_system="SYSTEM";

$keva_myaddress="KEVA ADDRESS";
$keva_newspace="新しいスペースを作成";
$keva_free="無料クレジットを取得";
$keva_newspacememo="Across the blockchain we can reach every corner in the galaxy";

$keva_submit="SUBMIT";
$keva_kaw="KAW";

$keva_showall="すべてのコンテンツを表示";
$keva_showlist="リストを表示";
$keva_addnew="新しい単語を作成";
$keva_addnewmemo="one small step, one giant leap";
$keva_subscribe="申し込む";
$keva_subscription="SUBSCRIPTION";
$keva_linkipfs="LINK IPFS";
$keva_edit="編集";
$keva_delete="削除";
$keva_broadcast="放送";
$keva_galaxylink="GALAXY LINK";

}


?>