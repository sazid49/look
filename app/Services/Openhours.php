<?php

    namespace App\Services;

    use Exception;
    use \Spatie\OpeningHours\OpeningHours;
    use function date;
    use function json_decode;
    use function lcfirst;
    use function str_pad;
    use function str_replace;
    use function strlen;
    use function strpos;
    use function strtotime;
    use function trans;
    use const STR_PAD_LEFT;

    class Openhours
    {

        public static $days_of_week = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
        public static $times_of_day = ['morning_from','morning_to','afternoon_from','afternoon_to'];

        /**
         * @param $openhours
         * @return array
         */
        public static function getOpeningHoursSelect( $openhours )
        {
            $result = [];

            foreach( self::$days_of_week as $day_of_week ){

                $result[$day_of_week]['is_open_switch'] =
                    (
                        !empty($openhours->{$day_of_week}->morning_from )
                        &&
                        !empty($openhours->{$day_of_week}->morning_to)
                    )
                        ? 'checked'
                        : '' ;

                $result[ $day_of_week ][ 'split_switch_enabled' ] = empty($result[ $day_of_week ][ 'is_open_switch' ]) ? ' disabled ' : '';

                $result[$day_of_week]['is_split_switch_checked'] =
                    (
                        !empty($openhours->{$day_of_week}->afternoon_from )
                        &&
                        !empty( $openhours->{$day_of_week}->afternoon_to )
                    )
                        ? 'checked'
                        : '' ;

                foreach( self::$times_of_day as $time_of_day ){

                    if( 1 || \in_array($time_of_day,['morning_from','morning_to'])){
                        $select_disabled = empty( $result[ $day_of_week ][ 'is_open_switch' ] ) ? 'disabled' : '';
                         }
                    else{
                        $select_disabled = '';
                    }

                    $stored_value =
                        ( !empty( $openhours->$day_of_week) && !empty( $openhours->$day_of_week->$time_of_day ) )
                            ? $openhours->$day_of_week->$time_of_day
                            : FALSE;

                    $result[$day_of_week][$time_of_day] ="";
                    $result[ $day_of_week ][ $time_of_day ] .= "<select class='form-control' name='opening_hours[$day_of_week][{$time_of_day}]'  $select_disabled >\n"; //class='form-control-chosen'
                    $result[$day_of_week][$time_of_day] .= "<option value='' >" . trans($time_of_day) . "</option>/n";

                    $range = range( strtotime("00:00"), strtotime("24:00"),15*60);

                    if( !( $stored_value=="closed" || strpos( $stored_value, ":" ) ) )//if legacy format convert to new format
                        if( !(strlen ($stored_value) > 2) )
                            $stored_value = str_pad ((string)$stored_value,2,'0',STR_PAD_LEFT). ":00";
                        else
                            $stored_value = date("H:i", $stored_value );//convert timestamps to hour of day

                    foreach($range as $time){

                        $time_string = date("H:i",$time);
                        $selected = ( $stored_value == $time_string ) ? ' selected="true" ' : '';

                        $result[ $day_of_week ][ $time_of_day ] .= "<option value='$time' $selected >" . $time_string . " " . trans ( 'hour' ) . "</option>\n";
                    }

                    $result[$day_of_week][$time_of_day] .="</select>\n";
                }
            }

            return $result;
        }

        /**
         * @param $openhours
         * @return mixed
         *
         * convert $openhours $_POST to $openhours json
         */
        public static function prepareOpenHoursPostForStore( $openhours )
        {
            if(is_array($openhours) || is_object($openhours)) {
                foreach($openhours as $day=>&$hours)
                foreach($hours as &$hour)
                    if( !empty($hour) )
                        $hour = date("H:i",$hour);
            }
            return $openhours;
        }

        public static function isOpen(  $opening_hours )
        {
            $is_open = FALSE;

            if ( !\is_object ( $opening_hours ) )
                $opening_hours = json_decode ( $opening_hours );

            if($SpatieOpenHours = self::getOpenHours( $opening_hours ))
                $is_open = $SpatieOpenHours->isOpen();


            $current_time = strtotime( date('H:i') );
            $day_of_week = lcfirst ( date('l') );


            return $is_open;
        }

/*
        public static function isOpen(  $opening_hours )
        {

            if ( !\is_object ( $opening_hours ) )
                $opening_hours = \json_decode ( $opening_hours );

            /*$opening_hours = json_decode(
                '{"friday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"},"monday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"},"sunday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"},"tuesday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"},"saturday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"},"thursday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"},"wednesday":{"morning_to":"24:00","afternoon_to":"24:00","morning_from":"00:00","afternoon_from":"00:00"}}'
            );*-/


            //$OpenHours = OpeningHours\OpeningHours::create( $opening_hours );

            $current_time = strtotime( date('H:i') );

            $yesterday = lcfirst ( date('l', strtotime('yesterday') ) );

            $is_open = FALSE;

            $day_of_week = lcfirst ( date('l') );

            $opening_hours_today_of_week =  $opening_hours->$day_of_week ?? false;
            $opening_hours_yesterday_of_week =  $opening_hours->$yesterday ?? false;

            if ( $opening_hours_today_of_week )
                if(self::_isOpen ( $opening_hours_today_of_week,  $opening_hours_yesterday_of_week) ) {
                    $is_open = TRUE;
                }

            return $is_open;
        }

*/

/*
        private static function __isOpen( $opening_hours, $day_of_week )
        {
            if (
                ( !empty($opening_hours->$day_of_week) )
                &&
                (
                    (
                        ( $opening_hours->$day_of_week->morning_from != 'closed' )
                        &&
                        (
                            !empty( $opening_hours->$day_of_week->morning_to )
                            &&
                            ( $current_time > strtotime( $opening_hours->$day_of_week->morning_from ) )
                        )
                        &&
                        (
                            !empty( $opening_hours->$day_of_week->morning_to )
                            &&
                            ( $current_time < strtotime( $opening_hours->$day_of_week->morning_to ) )
                        )
                    )
                    ||
                    (
                        ( $opening_hours->$day_of_week->afternoon_from != 'closed' )
                        &&
                        (
                            !empty( $opening_hours->$day_of_week->morning_to )
                            &&
                            ( $current_time > strtotime( $opening_hours->$day_of_week->afternoon_from ) )
                        )
                        &&
                        (
                            !empty( $opening_hours->$day_of_week->morning_to )
                            &&
                            ( $current_time < strtotime( $opening_hours->$day_of_week->afternoon_to ) )
                        )
                    )
                    ||
                    (

                    (
                        ( empty( $opening_hours->$day_of_week->morning_to ) && empty( $opening_hours->$day_of_week->afternoon_from ) )
                        ||
                        (
                            ( !empty( $opening_hours->$day_of_week->morning_to ) && !empty( $opening_hours->$day_of_week->afternoon_from ) )
                            &&
                            $opening_hours->$day_of_week->afternoon_from != 'closed'
                            &&
                            $opening_hours->$day_of_week->morning_to != 'closed'
                            &&
                            ( $opening_hours->$day_of_week->morning_to ==  $opening_hours->$day_of_week->afternoon_from )
                        )
                        &&
                        (
                            ( $current_time > strtotime( $opening_hours->$day_of_week->morning_from ) )
                            &&
                            ( $current_time < strtotime( $opening_hours->$day_of_week->afternoon_to ) )
                        )

                    )
                    )
                )
            )
            {

                $is_open = true;
            }

            return $is_open;
        }
*/

        private static function _isOpen( $opening_hours_day_of_week, $opening_hours_day_of_week_previous )
        {

            $current_time = strtotime( date('H:i') );

            //logic to detect if closed is last closed, and if so, if it is before now, when it may be after 0hr

            $has_valid_morning_hours =  (
                !empty( $opening_hours_day_of_week->morning_from ) )
                &&
                ( $opening_hours_day_of_week->morning_from != 'closed' )
                &&
                ( !empty( $opening_hours_day_of_week->morning_to ) )
                &&
                ( $opening_hours_day_of_week->morning_to != 'closed' )
            ;

            $has_valid_evening_numbers =
                ( !empty( $opening_hours_day_of_week->afternoon_from ) )
                &&
                ( $opening_hours_day_of_week->afternoon_from != 'closed' )
                &&
                ( !empty( $opening_hours_day_of_week->afternoon_to ) )
                &&
                ( $opening_hours_day_of_week->afternoon_to != 'closed' )
            ;

            //previous day values

            $previous_day_has_valid_morning_numbers =
                ( !empty( $opening_hours_day_of_week_previous->morning_from ) )
                &&
                ( $opening_hours_day_of_week_previous->morning_from != 'closed' )
                &&
                ( !empty( $opening_hours_day_of_week_previous->morning_to ) )
                &&
                ( $opening_hours_day_of_week_previous->morning_to != 'closed' )
            ;

            $previous_day_has_valid_evening_numbers =
                ( !empty( $opening_hours_day_of_week_previous->afternoon_from ) )
                &&
                ( $opening_hours_day_of_week_previous->afternoon_from != 'closed' )
                &&
                ( !empty( $opening_hours_day_of_week_previous->afternoon_to ) )
                &&
                ( $opening_hours_day_of_week_previous->afternoon_to != 'closed' )
            ;


            return
            (
                (
                    (
                        $previous_day_has_valid_morning_numbers
                    )
                    &&
                    (
                        (
                            $previous_day_has_valid_evening_numbers
                            &&
                            $current_time < $opening_hours_day_of_week_previous->afternoon_to
                        )
                        ||
                        ( //if no evening numbers, use morning numbers morning_to
                            !$previous_day_has_valid_evening_numbers
                            &&
                            $current_time < $opening_hours_day_of_week_previous->morning_to
                        )
                    )
                )
                ||
                (
                    $has_valid_morning_hours
                    &&
                    (
                        ( $current_time > strtotime( $opening_hours_day_of_week->morning_from ) )
                        &&
                        ( $current_time < strtotime( $opening_hours_day_of_week->morning_to ) )
                    )
                )
                ||
                (
                    $has_valid_evening_numbers
                    &&
                    (
                        ( $current_time > strtotime( $opening_hours_day_of_week->afternoon_from ) )
                        &&
                        ( $current_time < strtotime( $opening_hours_day_of_week->afternoon_to ) )
                    )
                )
            );
        }

        //get formatted openhours object for rendering
        public static function getFormattedObject($openhours)
        {
            foreach($openhours as $day_of_week){

            }
        }

        /*
         * return OpeningHours\OpeningHours
         */
        public static function getOpenHours ( $open_hours )
        {
            $OpenHours = false;

            if(isset($open_hours)){
                $openhours = self::getFormattedArray ($open_hours);

                $openhours = array_merge(['overflow'=>true],$openhours);

                try{
                    $OpenHours = OpeningHours::create( $openhours );
                }
                catch(Exception $e){

                }
            }

            //$OpenHours = OpeningHours::create ( $open_hours );
            return $OpenHours;
        }

        private static function getFormattedArray ( $opening_hours )
        {
            if ( !\is_object ( $opening_hours ) )
                $opening_hours = json_decode ( $opening_hours, true );

            $formatted_openhours = [];

            foreach( $opening_hours as $day_of_week => $openhours_day ){

                $ranges = [];

                $has_valid_morning_hours =  (
                    !empty( $openhours_day->morning_from ) )
                    &&
                    ( $openhours_day->morning_from != 'closed' )
                    &&
                    ( !empty( $openhours_day->morning_to ) )
                    &&
                    ( $openhours_day->morning_to != 'closed' )
                ;

                $has_valid_evening_numbers =
                    ( !empty( $openhours_day->afternoon_from ) )
                    &&
                    ( $openhours_day->afternoon_from != 'closed' )
                    &&
                    ( !empty( $openhours_day->afternoon_to ) )
                    &&
                    ( $openhours_day->afternoon_to != 'closed' )
                ;

                if( $has_valid_morning_hours ){

                    $ranges[] =  $openhours_day->morning_from    . '-'   . $openhours_day->morning_to;

                    if( $has_valid_evening_numbers ){
                        $ranges[] =  $openhours_day->afternoon_from    . '-'   . $openhours_day->afternoon_to;

                    }
                }

                $formatted_openhours[$day_of_week] = $ranges;
            }

            return $formatted_openhours;
        }

    }
