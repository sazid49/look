<?php
    /**
     * Created by PhpStorm.
     * User: Radd, Norrin
     * Date: 11/16/2022
     * Time: 4:34 PM
     */

    /**
     * Created by PhpStorm.
     * User: Radd, Norrin
     * Date: 12/4/2019
     * Time: 10:51 AM
     */
    class slugger
    {
        public static function slugify ( $string ): string
        {
            $string = str_replace ( array( '[\', \']' ), '', $string );
            $string = preg_replace ( '/[.*]/U', '', $string );
            $string = preg_replace ( '/&(amp;)?#?[a-z0-9]+;/i', '-', $string );
            $string = htmlentities ( $string, ENT_COMPAT, 'utf-8' );
            $string = preg_replace ( '/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\1', $string );
            $string = preg_replace ( array( '/[^a-z0-9]/i', '/[-]+/' ), '-', $string );

            return strtolower ( trim ( $string, '-' ) );
        }
    }
