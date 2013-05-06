<?php defined('SYSPATH') or die('No direct script access.');
/*
 * @package		Debugger
 * @author      Pap Tamas
 * @copyright   (c) 2011-2012 Pap Tamas
 * @website		https://github.com/paptamas/kohana-debugger
 * @license		http://www.opensource.org/licenses/isc-license.txt
 *
 */

class Controller_Debugger extends Controller {
    public function action_index()
    {
        echo View::factory('Debugger');
    }
}