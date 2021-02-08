<?php 

	class file{
	
		public $fileName = "./docs/users.txt";
		
		public function usserExist($user){
			
			$file = fopen("./docs/users.txt","r");
			
			while(!feof($file)){
				
				$linea = fgets($file);
				$palabra = "";
				
				for($i = 0; $i<strlen($linea)-1; $i++){
					$palabra = $palabra.$linea[$i];
				}
				
				if($palabra == $user){
					fclose($file);
					return true;
				} 
			}
			
			fclose($file);
			return false;
			
		}
		
		public function saveUser($user,$pass){
			
			$file = fopen("./docs/users.txt","a+");
			fwrite($file,$user."\n");
			fwrite($file,$pass."\n");
			fclose($file);
			
		}
		
		public function deleteUser($user){
			
		}
		
		public function loggin($user,$pass,$err){
			
			$aux = array();
			$cont = 0;
			$position = 0;
			
			if(!$this->usserExist($user)){
				array_push($err,"class = 'red'");
				array_push($err,"placeholder='El usuario no existe'");
			} 
			
			$file = fopen("./docs/users.txt","r");
			
			while(!feof($file)){
				
				$linea = fgets($file);
				$palabra = "";
				
				for($i = 0; $i<strlen($linea)-1; $i++){
					$palabra = $palabra.$linea[$i];
				}
				
				$aux[$cont] = $palabra;
				$cont++;
				
			}
			
			for($i = 0; $i<count($aux); $i++){
				if($aux[$i] == $user){
					$position = $i;
				}
				
			}
			
			if(count($aux) == 0){
				
			} else {
				
				$contra = $aux[$position+1];
			
			var_dump($contra);
			echo "<br>";
			var_dump($pass);
			
			if($contra != $pass){
				array_push($err,"errCont");
			}
			echo "<br>";
			var_dump($err);
				
			}
			
			
			return $err;
			
		}
	
	}
	
?>
