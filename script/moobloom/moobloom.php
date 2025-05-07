<?php

$types = [
	'default',
	'buttercup',
	'allium',
	'azure_bluet',
	'blue_orchid',
	'cornflower',
	'dandelion',
	'lilac',
	'lily_of_the_valley',
	'oxeye_daisy',
	'peony',
	'poppy',
	'rose_bush',
	'sunflower',
	'orange_tulip',
	'pink_tulip',
	'red_tulip',
	'white_tulip',
];

$blocks = [
	'default.png',
];

$colors = [
	'default' => [
		'860e14',
		'991012',
		'a81012',
		'9c5153',
		'000fff',

		'818181',
		'a1a1a1',
		'b3b3b3'
		//'946868',
	],
	'buttercup' => ['edba00','faca00','fdd500','fae57d','f7edc1', 'fae57d', 'f7edc1', 'f7edc1'],
	'allium' => ['7b4ea0','a65ee1','b878ed','c17df9','dec0f6', 'c17df9', 'dec0f6', 'dec0f6'],
	'azure_bluet' => ['d6e8e8','f7f7f7','ffffff','ffec4f','ffec4f', 'ffec4f', 'ffec4f', 'ffec4f'],
	'blue_orchid' => ['27a9f4','2abffd','2fcefd','7dccf9','c0e3f6', '7dccf9', 'c0e3f6', 'c0e3f6'],
	'cornflower' => ['2a4cc7','466aeb','6281e8','7d98f9','c0ccf6', '7d98f9', 'c0ccf6', 'c0ccf6'],
	'dandelion' => ['f19d25','fed639','ffec4f','f9eb7c','f7f1c1', 'f9eb7c', 'f7f1c1', 'f7f1c1'],
	'lilac' => ['b66bb2','d380d3','de93f1','e6aaf6','f6c0f3', 'e6aaf6', 'f6c0f3', 'f6c0f3'],
	'lily_of_the_valley' => ['d8d8d8','e7e7e7','efefef','f8f8f8','ffffff', 'f8f8f8', 'ffffff', 'ffffff'],
	'oxeye_daisy' => ['9bbdbd','d6e8e8','f7f7f7','fed639','ffec4f', 'fed639', 'ffec4f', 'ffec4f'],
	'peony' => ['de93f1','e3a1f7','e4aff4','ebc5fd','f6e2ff', 'ebc5fd', 'f6e2ff', 'f6e2ff'],
	'poppy' => ['9b221a','bf2529','ed302c','f9847c','f6c4c0', 'f9847c', 'f6c4c0', 'f6c4c0'],
	'rose_bush' => ['bf2529','ed302c','ff4540','f97d80','f6c0c2', 'f97d80', 'f6c0c2', 'f6c0c2'],
	'sunflower' => ['f5ba27','fed639','ffec4f','f9d67d','f7e7c1', 'f9d67d', 'f7e7c1', 'f7e7c1'],
	'orange_tulip' => ['bd6a22','d37d32','f19d25','f9b77d','f7dac1', 'f9b77d', 'f7dac1', 'f7dac1'],
	'pink_tulip' => ['dd7df9','e4aff4','eac0f6','ebc5fd','f6e2ff', 'ebc5fd', 'f6e2ff', 'f6e2ff'],
	'red_tulip' => ['9b221a','bf2529','ed302c','f9847c','f6c4c0', 'f9847c', 'f6c4c0', 'f6c4c0'],
	'white_tulip' => ['9bbdbd','d6e8e8','f7f7f7','fbfbfb','ffffff', 'fbfbfb', 'ffffff', 'ffffff'],
];

foreach ($colors as $type => $typeColors) {
	if ($type === 'red') continue; // optional skip

	foreach ($blocks as $block) {
		$blockPath = __DIR__ . '/input/' . $block;

		// Load and convert to truecolor with transparency support
		$src = imagecreatefrompng($blockPath);
		$width = imagesx($src);
		$height = imagesy($src);

		$im = imagecreatetruecolor($width, $height);
		imagealphablending($im, false);
		imagesavealpha($im, true);
		$transparent = imagecolorallocatealpha($im, 0, 0, 0, 127);
		imagefill($im, 0, 0, $transparent);
		imagecopy($im, $src, 0, 0, 0, 0, $width, $height);
		imagedestroy($src);

		for ($x = 0; $x < $width; $x++) {
			for ($y = 0; $y < $height; $y++) {
				$rgb = imagecolorat($im, $x, $y);
				$currentColor = imagecolorsforindex($im, $rgb);

				// Skip fully transparent
				if ($currentColor['alpha'] === 127) continue;

				$hex = strtolower(sprintf("%02x%02x%02x", $currentColor['red'], $currentColor['green'], $currentColor['blue']));
				$index = array_search($hex, $colors['default']);

				if ($index !== false && isset($colors[$type][$index])) {
					list($r, $g, $b) = sscanf($colors[$type][$index], "%02x%02x%02x");
					$newColor = imagecolorallocatealpha($im, $r, $g, $b, $currentColor['alpha']);
					if ($newColor !== false) {
						imagesetpixel($im, $x, $y, $newColor);
					}
				}
			}
		}

		// Save image
		ob_start();
		imagepng($im);
		$imageString = ob_get_clean();

		file_put_contents(
			__DIR__ . '/output/' . $type . '_moobloom.png',
			$imageString
		);

		imagedestroy($im);
	}
}