<?php
namespace Valorin\PinPusher\Pin;

class Color
{
    const MINT_GREEN              = '#AAFFAA';
    const MELON                   = '#FFAAAA';
    const SHOCKING_PINK           = '#FF55FF';
    const FOLLY                   = '#FF0055';
    const SUNSET_ORANGE           = '#FF5555';
    const ARMY_GREEN              = '#555500';
    const DUKE_BLUE               = '#0000AA';
    const TIFFANY_BLUE            = '#00AAAA';
    const SCREAMIN_GREEN          = '#55FF55';
    const PASTEL_YELLOW           = '#FFFFAA';
    const RICH_BRILLIANT_LAVENDER = '#FFAAFF';
    const BRIGHT_GREEN            = '#55FF00';
    const BRILLIANT_ROSE          = '#FF55AA';
    const CADET_BLUE              = '#55AAAA';
    const ROSE_VALE               = '#AA5555';
    const FASHION_MAGENTA         = '#FF00AA';
    const JAEGER_GREEN            = '#00AA55';
    const BABY_BLUE_EYES          = '#AAAAFF';
    const PURPUREUS               = '#AA55AA';
    const CHROME_YELLOW           = '#FFAA00';
    const DARK_GREEN              = '#005500';
    const RED                     = '#FF0000';
    const LIBERTY                 = '#5555AA';
    const LIGHT_GRAY              = '#AAAAAA';
    const VIVID_VIOLET            = '#AA00FF';
    const RAJAH                   = '#FFAA55';
    const INDIGO                  = '#5500AA';
    const MAY_GREEN               = '#55AA55';
    const ICTERINE                = '#FFFF55';
    const BULGARIAN_ROSE          = '#550000';
    const ORANGE                  = '#FF5500';
    const GREEN                   = '#00FF00';
    const WINDSOR_TAN             = '#AA5500';
    const LAVENDER_INDIGO         = '#AA55FF';
    const DARK_GRAY               = '#555555';
    const ELECTRIC_BLUE           = '#55FFFF';
    const BLUE_MOON               = '#0055FF';
    const CYAN                    = '#00FFFF';
    const BLACK                   = '#000000';
    const MEDIUM_AQUAMARINE       = '#55FFAA';
    const DARK_CANDY_APPLE_RED    = '#AA0000';
    const LIMERICK                = '#AAAA00';
    const COBALT_BLUE             = '#0055AA';
    const CELESTE                 = '#AAFFFF';
    const ELECTRIC_ULTRAMARINE    = '#5500FF';
    const PICTON_BLUE             = '#55AAFF';
    const INCHWORM                = '#AAFF55';
    const BLUE                    = '#0000FF';
    const VIVID_CERULEAN          = '#00AAFF';
    const PURPLE                  = '#AA00AA';
    const KELLY_GREEN             = '#55AA00';
    const MALACHITE               = '#00FF55';
    const MIDNIGHT_GREEN          = '#005555';
    const YELLOW                  = '#FFFF00';
    const MAGENTA                 = '#FF00FF';
    const SPRING_BUD              = '#AAFF00';
    const JAZZBERRY_JAM           = '#AA0055';
    const VERY_LIGHT_BLUE         = '#5555FF';
    const WHITE                   = '#FFFFFF';
    const ISLAMIC_GREEN           = '#00AA00';
    const OXFORD_BLUE             = '#000055';
    const IMPERIAL_PURPLE         = '#550055';
    const BRASS                   = '#AAAA55';
    const MEDIUM_SPRING_GREEN     = '#00FFAA';

    public static $colors = [
        '#AAFFAA',
        '#FFAAAA',
        '#FF55FF',
        '#FF0055',
        '#FF5555',
        '#555500',
        '#0000AA',
        '#00AAAA',
        '#55FF55',
        '#FFFFAA',
        '#FFAAFF',
        '#55FF00',
        '#FF55AA',
        '#55AAAA',
        '#AA5555',
        '#FF00AA',
        '#00AA55',
        '#AAAAFF',
        '#AA55AA',
        '#FFAA00',
        '#005500',
        '#FF0000',
        '#5555AA',
        '#AAAAAA',
        '#AA00FF',
        '#FFAA55',
        '#5500AA',
        '#55AA55',
        '#FFFF55',
        '#550000',
        '#FF5500',
        '#00FF00',
        '#AA5500',
        '#AA55FF',
        '#555555',
        '#55FFFF',
        '#0055FF',
        '#00FFFF',
        '#000000',
        '#55FFAA',
        '#AA0000',
        '#AAAA00',
        '#0055AA',
        '#AAFFFF',
        '#5500FF',
        '#55AAFF',
        '#AAFF55',
        '#0000FF',
        '#00AAFF',
        '#AA00AA',
        '#55AA00',
        '#00FF55',
        '#005555',
        '#FFFF00',
        '#FF00FF',
        '#AAFF00',
        '#AA0055',
        '#5555FF',
        '#FFFFFF',
        '#00AA00',
        '#000055',
        '#550055',
        '#AAAA55',
        '#00FFAA',
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
