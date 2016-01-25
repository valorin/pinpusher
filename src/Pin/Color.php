<?php
namespace Valorin\PinPusher\Pin;

class Color
{
    const ARMY_GREEN              = '#555500';
    const BABY_BLUE_EYES          = '#AAAAFF';
    const BLACK                   = '#000000';
    const BLUE                    = '#0000FF';
    const BLUE_MOON               = '#0055FF';
    const BRASS                   = '#AAAA55';
    const BRIGHT_GREEN            = '#55FF00';
    const BRILLIANT_ROSE          = '#FF55AA';
    const BULGARIAN_ROSE          = '#550000';
    const CADET_BLUE              = '#55AAAA';
    const CELESTE                 = '#AAFFFF';
    const COBALT_BLUE             = '#0055AA';
    const CHROME_YELLOW           = '#FFAA00';
    const CYAN                    = '#00FFFF';
    const DARK_CANDY_APPLE_RED    = '#AA0000';
    const DARK_GRAY               = '#555555';
    const DARK_GREEN              = '#005500';
    const DUKE_BLUE               = '#0000AA';
    const ELECTRIC_BLUE           = '#55FFFF';
    const ELECTRIC_ULTRAMARINE    = '#5500FF';
    const FASHION_MAGENTA         = '#FF00AA';
    const FOLLY                   = '#FF0055';
    const GREEN                   = '#00FF00';
    const ICTERINE                = '#FFFF55';
    const IMPERIAL_PURPLE         = '#550055';
    const INCHWORM                = '#AAFF55';
    const INDIGO                  = '#5500AA';
    const ISLAMIC_GREEN           = '#00AA00';
    const JAEGER_GREEN            = '#00AA55';
    const JAZZBERRY_JAM           = '#AA0055';
    const LAVENDER_INDIGO         = '#AA55FF';
    const KELLY_GREEN             = '#55AA00';
    const LIBERTY                 = '#5555AA';
    const LIGHT_GRAY              = '#AAAAAA';
    const LIMERICK                = '#AAAA00';
    const MAGENTA                 = '#FF00FF';
    const MALACHITE               = '#00FF55';
    const MAY_GREEN               = '#55AA55';
    const MEDIUM_AQUAMARINE       = '#55FFAA';
    const MEDIUM_SPRING_GREEN     = '#00FFAA';
    const MELON                   = '#FFAAAA';
    const MIDNIGHT_GREEN          = '#005555';
    const MINT_GREEN              = '#AAFFAA';
    const ORANGE                  = '#FF5500';
    const OXFORD_BLUE             = '#000055';
    const PASTEL_YELLOW           = '#FFFFAA';
    const PICTON_BLUE             = '#55AAFF';
    const PURPLE                  = '#AA00AA';
    const RAJAH                   = '#FFAA55';
    const RED                     = '#FF0000';
    const RICH_BRILLIANT_LAVENDER = '#FFAAFF';
    const ROSE_VALE               = '#AA5555';
    const PURPUREUS               = '#AA55AA';
    const SCREAMIN_GREEN          = '#55FF55';
    const SHOCKING_PINK           = '#FF55FF';
    const SPRING_BUD              = '#AAFF00';
    const SUNSET_ORANGE           = '#FF5555';
    const TIFFANY_BLUE            = '#00AAAA';
    const VERY_LIGHT_BLUE         = '#5555FF';
    const VIVID_CERULEAN          = '#00AAFF';
    const VIVID_VIOLET            = '#AA00FF';
    const WHITE                   = '#FFFFFF';
    const WINDSOR_TAN             = '#AA5500';
    const YELLOW                  = '#FFFF00';

    public static $colors = [
        '#000000',
        '#000055',
        '#0000AA',
        '#0000FF',
        '#005500',
        '#005555',
        '#0055AA',
        '#0055FF',
        '#00AA00',
        '#00AA55',
        '#00AAAA',
        '#00AAFF',
        '#00FF00',
        '#00FF55',
        '#00FFAA',
        '#00FFFF',
        '#550000',
        '#550055',
        '#5500AA',
        '#5500FF',
        '#555500',
        '#555555',
        '#5555AA',
        '#5555FF',
        '#55AA00',
        '#55AA55',
        '#55AAAA',
        '#55AAFF',
        '#55FF00',
        '#55FF55',
        '#55FFAA',
        '#55FFFF',
        '#AA0000',
        '#AA0055',
        '#AA00AA',
        '#AA00FF',
        '#AA5500',
        '#AA5555',
        '#AA55AA',
        '#AA55FF',
        '#AAAA00',
        '#AAAA55',
        '#AAAAAA',
        '#AAAAFF',
        '#AAFF00',
        '#AAFF55',
        '#AAFFAA',
        '#AAFFFF',
        '#FF0000',
        '#FF0055',
        '#FF00AA',
        '#FF00FF',
        '#FF5500',
        '#FF5555',
        '#FF55AA',
        '#FF55FF',
        '#FFAA00',
        '#FFAA55',
        '#FFAAAA',
        '#FFAAFF',
        '#FFFF00',
        '#FFFF55',
        '#FFFFAA',
        '#FFFFFF',
    ];

    /**
     * Returns true if the specified color is a valid pebble color.
     *
     * @param string $color
     *
     * @return bool
     */
    public static function isValid($color)
    {
        return in_array($color, self::$colors);
    }

    /**
     * Returns a colour string for use as a foreground colour with the specified background colour.
     *
     * @param string $color
     *
     * @return string
     */
    public static function foreground($color)
    {
        list($red, $green, $blue) = str_split(substr($color, 1), 2);

        $red   = hexdec($red);
        $green = hexdec($green);
        $blue  = hexdec($blue);

        return ($red < 200 && $green < 100 && $blue < 200) ? self::WHITE : self::BLACK;
    }

    /**
     * Returns a random colour from the list of supported colours.
     *
     * @return string
     */
    public static function random()
    {
        return self::$colors[array_rand(self::$colors)];
    }
}
