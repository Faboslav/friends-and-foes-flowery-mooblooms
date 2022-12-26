<?php

$types = [
	'poppy',
];

$blocks = [
	'moobloom_buttercup.png',
];

$colors = [
	'buttercup' => [
		'edba00',
		'faca00',
		'fdd500',

		'fae57d',
		'f7edc1',
	],
	'allium' => [
    	'7b4ea0',
    	'a65ee1',
    	'b878ed',

    	'c17df9',
    	'dec0f6',
    ],
    'azure_bluet' => [
    	'd6e8e8',
    	'f7f7f7',
    	'ffffff',

    	'ffec4f',
    	'ffec4f',
    ],
    'blue_orchid' => [
        '27a9f4',
       	'2abffd',
        '2fcefd',

        '7dccf9',
       	'c0e3f6',
    ],
    'cornflower' => [
    	'2a4cc7',
    	'466aeb',
    	'6281e8',

    	'7d98f9',
    	'c0ccf6',
    ],
	'dandelion' => [
		'f19d25',
		'fed639',
		'ffec4f',

		'f9eb7c',
		'f7f1c1',
	],
	'lilac' => [
		'b66bb2',
		'd380d3',
		'de93f1',

		'e6aaf6',
		'f6c0f3',
	],
	'lily_of_the_valley' => [
		'd8d8d8',
		'e7e7e7',
		'efefef',

		'f8f8f8',
		'ffffff',
	],
    'oxeye_daisy' => [
    	'9bbdbd',
        'd6e8e8',
        'f7f7f7',

        'fed639',
        'ffec4f',
    ],
    'peony' => [
    	'de93f1',
    	'e3a1f7',
    	'e4aff4',

    	'ebc5fd',
    	'f6e2ff',
    ],
	'poppy' => [
		'9b221a',
		'bf2529',
		'ed302c',

		'f9847c',
		'f6c4c0'
	],
	'rose_bush' => [
		'bf2529',
		'ed302c',
		'ff4540',

		'f97d80',
		'f6c0c2',
	],
	'sunflower' => [
		'f5ba27',
		'fed639',
		'ffec4f',

		'f9d67d',
		'f7e7c1'
	],
	'orange_tulip' => [
    	'bd6a22',
    	'd37d32',
    	'f19d25',

    	'f9b77d',
    	'f7dac1',
    ],
    'pink_tulip' => [
    	'dd7df9',
    	'e4aff4',
    	'eac0f6',

    	'ebc5fd',
    	'f6e2ff',
    ],
	'red_tulip' => [
		'9b221a',
        'bf2529',
        'ed302c',

        'f9847c',
        'f6c4c0',
	],
	'white_tulip' => [
		'9bbdbd',
		'd6e8e8',
		'f7f7f7',

		'fbfbfb',
		'ffffff',
	],
];

foreach ( $colors as $type => $typeColors ) {
	if($type === 'buttercup') {
		continue;
	}

	foreach ( $blocks as $block ) {
		$blockPath = __DIR__.'/input/'.$block;
		$im = imagecreatefrompng($blockPath);
		imagealphablending($im, false);
		for ($x = imagesx($im); $x--;) {
			for ($y = imagesy($im); $y--;) {
				$rgb = imagecolorat($im, $x, $y);
				$currentColorRGB = imagecolorsforindex($im, $rgb);

				$currentColorHEX = sprintf(
					"%02x%02x%02x",
					$currentColorRGB['red'],
					$currentColorRGB['green'],
					$currentColorRGB['blue']
				);

				if(in_array($currentColorHEX, $colors['buttercup'])) {
					$index = array_search( $currentColorHEX, $colors[ 'buttercup' ] );
					$newColorHEX = $colors[ $type ][ $index ];
					$newColorRGB = list( $r, $g, $b ) = sscanf( $newColorHEX, "%02x%02x%02x" );
					$colorB = imagecolorallocatealpha( $im, $newColorRGB[ 0 ], $newColorRGB[ 1 ], $newColorRGB[ 2 ], $currentColorRGB[ 'alpha' ] );

					if($colorB === false) {
						continue;
					}

					imagesetpixel( $im, $x, $y, $colorB );
				}
			}
		}

		imageAlphaBlending($im, true);
		imageSaveAlpha($im, true);

		ob_start();
		imagepng($im);
		$imageString = ob_get_clean();
		file_put_contents(
			__DIR__.'/output/moobloom_'.$type.'.png',
			$imageString,
		);

	}
}
