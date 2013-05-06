<?php defined('SYSPATH') or die('No direct script access.');
/*
 * @package		Debugger
 * @author      Pap Tamas
 * @copyright   (c) 2011-2012 Pap Tamas
 * @website		https://github.com/paptamas/kohana-debugger
 * @license		http://www.opensource.org/licenses/isc-license.txt
 *
 */

class Kohana_Debugger {

    public static $html;
    public static $include_profiler = TRUE;
    public static $write_on_add = TRUE;
    public static $file_path;

    public static function file_path()
    {
        if (self::$file_path)
            return self::$file_path;

        return APPPATH.'/logs/debug.php';
    }

    public static function message($message)
    {
        $block = '<div class="block">';

        if (self::$include_profiler)
        {
            $block .= '<p>';
            $block .= '<span class="time">'.number_format((microtime(TRUE) - KOHANA_START_TIME), 4).' sec</span>';
            $block .= '<span class="memory">'.number_format(((memory_get_usage() - KOHANA_START_MEMORY) / 1024), 2).' kb</span>';
            $block .= '</p>';
        }

        $block .= '<p class="message">'.$message.'</p>';
        $block .= '</div>';
        self::$html .= $block;

        if (self::$write_on_add)
        {
            // Save to file
            self::write();
        }
    }

    public static function variable($var, $message = '')
    {
        if ( ! empty($message))
        {
            $message = '<p class="variable_message">'.$message.':</p>';
        }

        $message .= Debug::vars($var);
        self::message($message);
    }


    public static function write()
    {
        $content = "<?php defined('SYSPATH') or die('No direct script access.'); ?>".PHP_EOL;
        $content .= self::$html;

        file_put_contents(self::file_path(), $content);
    }
}
