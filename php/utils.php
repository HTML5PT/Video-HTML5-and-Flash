<?php
function unformatString($texto) {
	$chars = array(
	"�" => "",
	"`" => "",
	"'" => "",
	"�" => "A",
	"�" => "A",
	"�" => "A",
	"�" => "AE",
	"�" => "E",
	"�" => "E",
	"�" => "I",
	"�" => "I",
	"�" => "D",
	"�" => "O",
	"�" => "O",
	"�" => "O",
	"�" => "O",
	"�" => "U",
	"�" => "U",
	"�" => "a",
	"�" => "a",
	"�" => "a",
	"�" => "ae",
	"�" => "e",
	"�" => "e",
	"�" => "i",
	"�" => "i",
	"�" => "o",
	"�" => "o",
	"�" => "o",
	"�" => "o",
	"�" => "o",
	"�" => "u",
	"�" => "u",
	"�" => "A",
	"�" => "A",
	"�" => "A",
	"�" => "C",
	"�" => "E",
	"�" => "E",
	"�" => "I",
	"�" => "I",
	"�" => "N",
	"�" => "O",
	"�" => "O",
	"�" => "U",
	"�" => "U",
	"�" => "Y",
	"�" => "B",
	"�" => "a",
	"�" => "a",
	"�" => "a",
	"�" => "c",
	"�" => "e",
	"�" => "e",
	"�" => "i",
	"�" => "i",
	"�" => "n",
	"�" => "o",
	"�" => "o",
	"�" => "u",
	"�" => "u",
	"�" => "y",
	"�" => "y");
	$texto =  str_replace(array_keys($chars),$chars,$texto);
	return $texto = strtolower(str_replace(" ", "-", $texto));
}





?>