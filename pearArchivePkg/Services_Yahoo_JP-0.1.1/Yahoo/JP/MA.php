<?php
/**
 * MA dispatcher
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to the New BSD license that is
 * available through the world-wide-web at the following URI:
 * http://www.opensource.org/licenses/bsd-license.php. If you did not receive  
 * a copy of the New BSD License and are unable to obtain it through the web, 
 * please send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Services
 * @package   Services_Yahoo_JP
 * @author    Tetsuya Nakase <phpizer@gmail.com>
 * @copyright 2008 Tetsuya Nakase
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @version   CVS: $Id: MA.php,v 1.1 2008/04/28 15:59:31 tetsuya Exp $
 * @link      http://phpize.net
 */

require_once "Services/Yahoo/Exception.php";

/**
 * MA dispatcher class
 *
 * This class provides a method to create a concrete instance of one
 * of the supported MA types (parse).
 *
 * Morphological Analysis
 * divide a Japanese sentence into a morpheme and 
 * offer the function that can acquire a part of speech,
 * the grant of the phonetic symbol, statistics information.
 *
 * @category  Services
 * @package   Services_Yahoo_JP
 * @author    Tetsuya Nakase <phpizer@gmail.com>
 * @copyright 2008 Tetsuya Nakase
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @version   Release: 0.0.1
 * @link      http://phpize.net
 */
class Services_Yahoo_JP_MA
{
    /**
     * Attempts to return a concrete instance of a MA class
     *
     * @param string $type Can be one of parse.
     *
     * @return  object Concrete instance of a MA class based on the paramter
     * @throws  Services_Yahoo_Exception
     */
    public function factory($type)
    {
        switch ($type) {
        case 'parse' :
            include_once 'Services/Yahoo/JP/MA/' . $type . '.php';
            $classname = 'Services_Yahoo_JP_MA_' . ucfirst($type);
            return new $classname;
        default :
            throw new Services_Yahoo_Exception('Unknown MA type ' . $type);
            break;
        }
    }
}
?>
