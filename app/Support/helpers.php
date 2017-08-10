<?php

if(false === function_exists('pretty')) {
	function pretty($expression, $die = false){
		if(env('APP_ENV') !== 'production'){
			echo '<pre>'; print_r($expression); echo '</pre>';
			if(true === $die)
				die();
		}
	}
}

if(false === function_exists('pd')) {
	function pd($expression, $die = false){
		if(false === function_exists('pretty')) {
			pretty($expression, $die);
		}
	}
}

if(false === function_exists('vd')){
	function vd($expression, $die = false){
		if(env('APP_ENV') !== 'production'){
			echo '<pre>'; var_dump($expression); echo '</pre>';
			if(true === $die)
				die();
		}
	}
}