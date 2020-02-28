<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <title>GALAXY OS</title>
		<style>


html,
body,
.site_font {
  font-family: coda_regular, arial, helvetica, sans-serif;
}



html, body {
  background-color: #0b0c0d;
  color: #fff;
  font-size: 15px;
  margin: 0 auto -100px;
  padding: 0;

}

::-webkit-scrollbar { width: 0 !important }



a:link,
a:visited,
a:active{
 transition:0.5s;
color: #28f428;	
  text-decoration: none;
}

a:hover { color:yellow; }

input[type="text"],
input[type="submit"] {
  font-size: 18px;
}



input[type="text"],
input[type="submit"] {
  border: 1px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  height:42px;
 

}

input[type="text"] {
  background-color: rgb(11, 12, 13);
  color: #ddd;

 width:500px;
 padding-left:5px;

}

input[type="submit"] {
  background-color: rgb(0, 79, 74);
  color: #59fbea;
  padding: 5px 22px;
margin-left:3px;
  height:45px;
    
}

div{margin:5px;border:0;padding:0;}

#door {

margin-top:15px;
  
  font-size: 15px;
  

}

#newworld{

margin-top:100px;
  
  font-size: 15px;
  

}





#tech {

  
margin-left: 11px;
padding-left: 2px;
text-align: left;
vertical-align:middle;

  border: 0px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  font-size:24px;

width:98%;

 
  
}

@keyframes textShadow {
  0% {
    text-shadow: 0.4389924193300864px 0 1px rgba(0,30,255,0.5), -0.4389924193300864px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }

  100% {
    text-shadow: 2.6208764473832513px 0 1px rgba(0,30,255,0.5), -2.6208764473832513px 0 1px rgba(255,0,80,0.3), 0 0 3px;
  }
}

.crt::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: linear-gradient(rgba(18, 16, 16, 0) 80%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
  z-index: 2;
  background-size: 100% 2px;
  pointer-events: none;
}
.crt {
  animation: textShadow 0.00s infinite;
}

            #nav
            {
                /*width: 80%;*/
                margin: 0 auto;
				
			
                border: 0px solid #59fbea;
            }
            ul,li 
            {
                margin: 0px;
                padding: 0px;
                list-style: none;
            }
            ul 
            {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;


            }

			div:before {
  content:"";
  position:absolute;
  top:0px;
  bottom:0;
  left:0;
  right:0;
  background:linear-gradient(to bottom,transparent,#000 0px);
  animation:fadeIn 1s forwards
}

@keyframes fadeIn {
  0% {
    top:5%;
  }
  100% {
    top: 100%;
  }
}

            li
            {
                border: 1px solid #59fbea;
                width: 430px;
				height:100px;
				word-break: break-all;
			background-color: rgb(0, 79, 74);
                text-align: center;
                margin-top: 10px;
                margin-bottom: 7px;
				margin-right: 5px;
				margin-left: 5px;
				padding-top:10px;
				padding-left:2px;
				padding-right:2px;
                flex:auto;  
				

            }
#universe {

line-height:26px;
ont-weight:100px;
font-size: 22px;
position: absolute;
  
}

p
{

color:#ccc;
margin-top:2px;

}

</style>
		<body>

		


<?php 

include("rpc.php");

$rpc = new Raven();

$_REQ = array_merge($_GET, $_POST);

$messageacc="message";

	$listaccount = $rpc->listaccounts();
				
				

				if(in_array($messageacc,$listaccount))
			
					{
						$accaddress=$rpc->getaddressesbyaccount($messageacc);
					
						$shopaddress=$accaddress[0];
						$errorshop = $rpc->error;
		
						if($errorshop != "") 
			
						{
							echo "<p>&nbsp;&nbsp;error,message address</p>";
							exit;
						}
					}
			
				

			if(!$shopaddress)
			{

	$shopaddress = $rpc->getnewaddress($messageacc);

	$errorshop = $rpc->error;

	if($errorshop != "") 
		
				{
		echo "<p>&nbsp;&nbsp;Error,create new messages</p>";
		exit;
				}
			}
	
		




if(!isset($_REQUEST["asset"])) 

{
	

$turn=9;
$ux=9;

$unicode=" ";
$unioff=" ";
$sort=9;
$sortnum=9;


if(isset($_REQ["unicode"])){ $turn=$_REQ["unicode"];}

if(isset($_REQ["u"])){$ux=$_REQ["u"];}


echo "<div id=\"door\"  class=\"crt\"><form action=\"\" method=\"post\" ><div id=\"tech\"  class=\"crt\"><ul><li style=\"font-size: 30px;animation: textShadow 1.00s infinite;letter-spacing:4px;width:1%;margin-top:20px;padding-top:5px;height:40px;border: 1px solid #59fbea;background-color:#0b0c0d;\"><a href=index.php><b>GALAXY</b></a></li>";	

		echo "<li  style=\"border:0px;width:50%;text-align:left;background-color:#0b0c0d;\"><input type=\"text\" name=\"asset\" maxlength=\"34\" placeholder=\"ASSET\">";

		echo "<input type=\"hidden\" name=\"one\" value=\"rvn\" />";
		echo "<input type=\"submit\" value=\"KAW\"></div></form></div>";
	
$blocknum=$rpc->getblockcount();
$blocknum=$blocknum-5000;
$blockhash=$rpc->getblockhash($blocknum);

$agex= $rpc->listsinceblock($blockhash);



		
			
			$error = $rpc->error;

			if($error != "") 
		
				{
	
					echo "<p>&nbsp;&nbsp;Error ADDRESS</p>";
					exit;
				}


$arrx=array();
$totalassx=array();


		foreach($agex['asset_transactions'] as $g_value=>$g)

	{

		extract($g);

	

		if($category=="receive" & $message<>""){

			$txx= $rpc->getrawtransaction($txid);
			$raw= $rpc->decoderawtransaction($txx);


			$arrx["block"]=$confirmations;
			$arrx["time"]=$time;
			$arrx["name"]=$asset_name;
			$arrx["ipfs"]=$message;
			$arrx["to"]=$destination;

			if(($raw['vout'][2]['scriptPubKey']['type'])=="transfer_asset")
				{
					$arrx["from"]=$raw['vout'][2]['scriptPubKey']['addresses'][0];
				}

			
			
			
			array_push($totalassx,$arrx);






		}


	}

arsort($totalassx);

$age=$totalassx;


if($turn==1){$unicode="&nbsp;&nbsp;<font color=green>UNICODE</font>&nbsp; <a href=? >[ TURN-OFF ]</a><br>";}else{$unicode="&nbsp;&nbsp;<font color=red>UNICODE</font>&nbsp; <a href=?unicode=1 >[ TURN-ON ]</a><br>";}

echo "<div id=\"universe\" class=\"crt\"><div style=\"text-align:left;margin-top:0px;height:40px;\">".$unicode."</div><div id=\"nav\"><ul>";

echo "<a href=/?&asset=".$shopaddress."&mode=2><li style=\"background-color: rgb(0, 79, 74);height:130px;display:block;\"><h4>MESSAGE NODE ADDRESS</h4><hr style=\"background-color:#59fbea;height:1px;border:none;\"><font size=3>".$shopaddress."</font></a></li></ul><div id=\"nav\"><ul>";

		foreach($age as $xx_value=>$xx)

			{

				extract($xx);

				$x_value=$name;

				$assetlink=$x_value;
				$assettwo=$x_value;


		if($turn==1)

			{
			$x_value=uniworld($x_value,$assetlink,$assettwo);
			}


			$x_value=str_replace("U+","",$x_value);




			if(strlen($ipfs)=="46")

			{

				$messone="(<a href=https://gotoipfs.com/#path=".$ipfs.">IPFS</a>)";
			}
			if(strlen($ipfs)=="64")
			{
			$messone="(<a href=/keva/?txid=".$ipfs."&sname=".$x_value.">TXID</a>)";
			}


			echo "<li style=\"background-color: rgb(0, 79, 74);display:block;height:40px;width:800px;font-size:70%\"><table ><tr><td width=\"150px\">".date('Y-m-d H:i', $time)."</td><td width=\"350px\" align=left><a href=/?&unicode=".$turn."&asset=".$from.">".$x_value."</a> ".$messone."</td><td><a href=/?&unicode=".$turn."&asset=".$to.">TO: ".$to."</a></td></tr></table></li>";

			}

			echo "</ul></div></div>";

			echo "<div id=\"universe\" class=\"crt\">";

	

		}




?>

</ul></div>
</div>
</body>
</html>