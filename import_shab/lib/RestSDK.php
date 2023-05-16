<?php
    /**
     * Created by PhpStorm.
     * User: Radd, Norrin
     * Date: 6/22/2022
     * Time: 10:02 AM
     */

    namespace lookon\lib\import;

    use function base64_encode;
    use function count;
    use function curl_close;
    use function curl_getinfo;
    use function curl_init;
    use function curl_multi_add_handle;
    use function curl_multi_close;
    use function curl_multi_exec;
    use function curl_multi_getcontent;
    use function curl_multi_info_read;
    use function curl_multi_init;
    use function curl_multi_remove_handle;
    use function curl_multi_select;
    use function curl_setopt;
    use function is_array;
    use function json_decode;
    use function json_encode;
    use function var_export;
    use const CURLINFO_HTTP_CODE;
    use const CURLOPT_CONNECTTIMEOUT;
    use const CURLOPT_FOLLOWLOCATION;
    use const CURLOPT_HTTPHEADER;
    use const CURLOPT_RETURNTRANSFER;
    use const CURLOPT_SSL_VERIFYHOST;
    use const CURLOPT_SSL_VERIFYPEER;
    use const CURLOPT_TIMEOUT;

    /**
     *  Class RestSDK
     *
     *  Provides a simple http communication interface for interacting with API
     *
     */
    class RestSDK{

        /**
         *
         */
        public function __construct(){}

        /**
         * @param array $id_urls
         * @return array
         */
        public function queryIds ( array $id_urls ): array
        {

            //An array that will contain all of the information relating to each request.
            $requests =  $responses = [];
            $stillRunning = false;

            //Initiate a multiple cURL handle
            $mh = curl_multi_init();

            //Loop through each URL.
            foreach($id_urls as $k => $url){
                //echo "ID URL:".$url."\n";

                $requests[$k] = [];
                $requests[$k]['url'] = $url;

                //Create a normal cURL handle for this particular request.
                $requests[$k]['curl_handle'] = curl_init($url);

                //Configure the options for this request.
                $authentication_hash = base64_encode ("info@lookon.ch:Tnd&qTWv");
                $headers = ["Authorization: Basic $authentication_hash"];

                curl_setopt($requests[$k]['curl_handle'], CURLOPT_HTTPHEADER, $headers);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_RETURNTRANSFER, true);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_TIMEOUT, 10);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_SSL_VERIFYPEER, false);

                //Add our normal / single cURL handle to the cURL multi handle.
                curl_multi_add_handle($mh, $requests[$k]['curl_handle']);
            }

            //Execute our requests using curl_multi_exec.
            do {
                curl_multi_exec($mh, $stillRunning);

                if ($stillRunning)
                    curl_multi_select($mh);

            } while ($stillRunning);

            //Loop through the requests that we executed.
            foreach($requests as $k => $request){
                //Get the response content and the HTTP status code.
                $requests[$k]['http_code'] = curl_getinfo($request['curl_handle'], CURLINFO_HTTP_CODE);

                if( curl_getinfo($request['curl_handle'], CURLINFO_HTTP_CODE) == 200){
                    $response_string = curl_multi_getcontent($request['curl_handle']);

                    if($this->validateResponse($response_string))
                        $responses[$k] = json_decode ( $response_string );
                }

                //Remove the handle from the multi handle.
                curl_multi_remove_handle($mh, $request['curl_handle']);
                //Close the handle.
                curl_close($requests[$k]['curl_handle']);

            }
            //Close the multi handle.
            curl_multi_close($mh);

            return $responses;
        }

        /**
         * @param $date_urls
         * @return void
         */
        public function queryDates( $date_urls): array
        {
            //An array that will contain all of the information relating to each request.
            $requests =  $responses = [];

             $stillRunning = false;

            //Initiate a multiple cURL handle
            $mh = curl_multi_init();

            //Loop through each URL.
            foreach($date_urls as $k => $url){
                $requests[$k] = array();
                $requests[$k]['url'] = $url;
                //Create a normal cURL handle for this particular request.
                $requests[$k]['curl_handle'] = curl_init($url);

                //Configure the options for this request.
                $authentication_hash = base64_encode ("info@lookon.ch:Tnd&qTWv");
                $headers = ["Authorization: Basic $authentication_hash"];

                curl_setopt($requests[$k]['curl_handle'], CURLOPT_HTTPHEADER, $headers);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_RETURNTRANSFER, true);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_TIMEOUT, 10);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($requests[$k]['curl_handle'], CURLOPT_SSL_VERIFYPEER, false);
                //Add our normal / single cURL handle to the cURL multi handle.
                curl_multi_add_handle($mh, $requests[$k]['curl_handle']);
            }

            //Execute our requests using curl_multi_exec.
            do {
                curl_multi_exec($mh, $stillRunning);
                if ($stillRunning) {
                    curl_multi_select($mh);
                }
            } while ($stillRunning);

            echo "Total Requests:".count($requests)."\n";

            $count = 1;

            //Loop through the requests that we executed.
            foreach($requests as $k => $request){

                echo "Processing request #:$count ";

                //Get the response content and the HTTP status code.
                $requests[$k]['http_code'] = curl_getinfo($request['curl_handle'], CURLINFO_HTTP_CODE);


                if(  curl_getinfo($request['curl_handle'], CURLINFO_HTTP_CODE) == 200 ){
                    $response_string = curl_multi_getcontent($request['curl_handle']);

                    if($this->validateResponse($response_string))
                        $responses[] = json_decode ($response_string);
                }

                echo " with result code: " . $requests[$k]['http_code']. "\n";

                $count++;

                //Remove the handle from the multi handle.
                curl_multi_remove_handle($mh, $request['curl_handle']);
                //Close the handle.
                curl_close($requests[$k]['curl_handle']);

            }

            //Close the multi handle.
            curl_multi_close($mh);

            return $responses;
        }

        /**
         * @param string|null $response_string
         * @return void
         */
        private function validateResponse ( string $response_string ): bool
        {
            $valid_response = false;

            //echo "Response String Value:".substr( $response_string,0,25)."\n";
            //echo  "Response String Evaluation:" . (bool)(( json_decode ($response_string) ?? FALSE ) )."\n";
            //echo "Decoded Response String:".var_export( json_decode ($response_string) )."\n";
            //echo "Decoded Response String Evaluation:" . (!empty( json_decode ($response_string))) ?"true":"false" ."\n";
            //echo "Decoded Response Count:" . count(json_decode ($response_string))."\n";

            if( is_array (json_decode ($response_string)) && count(json_decode ($response_string)) > 0  )
                $valid_response = true;

            return $valid_response;
        }
    }
