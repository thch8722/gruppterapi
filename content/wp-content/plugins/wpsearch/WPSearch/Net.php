<?php
/**
 * This file contains a class for making webservice calls
 *
 * @author Kenny Katzgrau <kenny@oconf.org>
 */

/**
 * Facilitates HTTP GET, POST, PUT, and DELETE calls using cURL as a backend
 */
class WPSearch_Net
{
    /**
     * Fetch a web resource by URL
     * @param string $url The HTTP URL that the request is being made to
     * @param array  $options Any PHP cURL options that are needed
     * @return object An object with properties of 'url', 'body', and 'status'
     */
    public static function fetch($url, $options = array())
    {
        if(!function_exists('curl_exec'))
        {
            WPSearch_Log::add('error', "cURL is not installed! Throwing an exception..");
            throw new WPSearch_Exception("The cURL module must be installed");
        }

        $curl_handle = curl_init($url);
        $options    += array(CURLOPT_RETURNTRANSFER => true);

        curl_setopt_array($curl_handle, $options);

        $timer = "Call to $url via HTTP";
        WPSearch_Benchmark::start($timer);

        $body   = curl_exec($curl_handle);
        $status = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

        WPSearch_Benchmark::stop($timer);

        return (object)(array('url' => $url, 'body' => $body, 'status' => $status));
    }

    /**
     * Issues an HTTP GET request to the specified URL
     * @param string $url
     * @return object An object with properties of 'url', 'body', and 'status'
     */
    public static function get($url)
    {
        return self::fetch($url);
    }

    /**
     * Issues an HTTP POST request to the specified URL with the supplied POST
     *  body
     * @param string $url
     * @param string $data The raw POST body
     * @return object An object with properties of 'url', 'body', and 'status'
     */
    public static function post($url, $data)
    {
        return self::fetch($url, array (
                                        CURLOPT_POST       => true,
                                        CURLOPT_POSTFIELDS => $data
                                       )
                          );
    }

    /**
     * Issues an HTTP DELETE to the specified URL
     * @param string $url
     * @return object An object with properties of 'url', 'body', and 'status'
     */
    public static function delete($url)
    {
        return self::fetch($url, array (
                                        CURLOPT_CUSTOMREQUEST => 'DELETE'
                                      ));
    }

    /**
     * Issues an HTTP PUT to the specified URL
     * @param string $url
     * @param string $data Raw PUT data
     * @return object An object with properties of 'url', 'body', and 'status'
     */
    public static function put($url, $data)
    {
        $putData = tmpfile();

        fwrite($putData, $data);
        fseek($putData, 0);

        $result = self::fetch($url, array(
                                          CURLOPT_PUT        => true,
                                          CURLOPT_INFILE     => $putData,
                                          CURLOPT_INFILESIZE => strlen($putData)
                                        ));

        fclose($putData);

        return $result;
    }
}