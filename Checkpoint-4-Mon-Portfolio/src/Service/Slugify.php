<?php

namespace App\Service;

class Slugify
{
	/**
	 * @param string|null $imput
	 * @return string
	*/
	function generate(string $input) : string
	{
		// fonction reprise sur : https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string

		// remplace les nombres et autres par -
		$input = preg_replace('~[^\pL\d]+~u', '-', $input);

		// transliterate
		$input = iconv('utf-8', 'us-ascii//TRANSLIT', $input);

		// retire les caractères non désirés
		$input = preg_replace('~[^-\w]+~', '', $input);

		// supprime les espaces devant et après
		$input = trim($input);

		// évite les doubles, triples, etc. tirets
		$input = preg_replace('~-+~', '-', $input);

		// supprime le - à la fin
		$input = rtrim($input, '-');

		// met en minuscule
		$input = strtolower($input);

		return $input;
	}
}
