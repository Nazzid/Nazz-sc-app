<?php
function getServer($info){
	$server = json_decode(file_get_contents('https://raw.githubusercontent.com/Nazzid/Nazz-sc-app/master/db.json'), 1);
	foreach($server as $key=>$val){
		if($key == base64_encode($info['title'])){
			if($val['version'] == $info['version']){
				return "ok"; 
			}else{
				return $val['url'];
			}
		}
	}
}

function banner($server, $info){
	echo $banner = "
    _   __                _     __
   / | / /___ _________  (_)___/ /
  /  |/ / __ `/_  /_  / / / __  / 
 / /|  / /_/ / / /_/ /_/ / /_/ /  
/_/ |_/\__,_/ /___/___/_/\__,_/    
___________________________________
";
	if($server == "ok"){
		echo "Title : ".$info['title']."\n";
		echo "Versi : ".$info['version']."\n";
		echo "___________________________________\n";
		echo "Info  : ".$info['description'];
		echo "___________________________________\n";
	}else{
		echo "Title : ".$info['title']."\n";
		echo "Versi : ".$info['version']." (Old Version)\n";
		echo "___________________________________\n";
		echo "Mengupdate versi terbaru => ";
		file_put_contents('bot.php', file_get_contents($server));
		sleep(2);
		echo "Complete!\nMohon buka ulang!";
		exit;
	}
}
