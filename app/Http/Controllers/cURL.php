<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/06/18
 * Time: 09:48 م
 */

namespace App\Http\Controllers;


class cURL extends Controller
{
    /* ATTRIBUTES  */

    protected $url     ;
    protected $method  = 'GET' ;
    protected $headers = [] ;
    protected $body    = [] ;

    /**
     * @param $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;
        return $this ;
    }

    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = strtoupper($method) ;
        return $this ;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers)
    {
       $this->headers = $headers;
       return $this ;
    }

    /**
     * @param array $body
     * @return $this
     */
    public function setBody(array $body)
    {
        $this->body = $body ;
        return $this ;
    }

    /**
     * @param string $handler
     * For cUrl send curl parameter and for guzzle send guzzle parameter
     * @return mixed
     * @throws \Exception
     */
    public function send($handler = 'curl')
    {
        $handlers = ['curl','guzzle'];
        if(!in_array($handler ,$handlers)){
            throw new \Exception('Unsupported Handler , please use : cURL or Guzzle .');
        }
        return $this->{$handler."Call"}() ;
    }

    private function curlCall()
    {
        // CHECK IF cURL NOT INSTALL IN SERVER
        if(!function_exists('curl_init')) {
            throw new \Exception('Please Install cUrl Ext. First');
        }

        // START INIT cURL
        $ch = curl_init();

        // OPTION SET URL
        curl_setopt($ch, CURLOPT_URL, ($this->method == 'GET')?$this->url.'?'.http_build_query($this->body):$this->url);

        if($this->method != 'GET'){
            // OPTION TO SET IF HTTP METHOD POST
            curl_setopt($ch, CURLOPT_POST,true);
            // IF HTTP METHOD POST AND BODY CONTAIN DATA TO SEND
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->body));
        }else{
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        }

        // SET HEADER
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // DECODE RETURNED DATA AND ASSIGN TO VAR
        $data = json_decode(curl_exec($ch));

        // CHECK IF cURL HAS ENY ERR NO. TO THROW NEW EXCEPTION WITH ERR
        if(curl_errno($ch)){
            throw new \Exception(curl_error($ch));
        }
        // CLOSE cURL
        curl_close($ch);
        // RETURN DATA
        return $data ;
    }

    // If you want to make the Calls with Guzzle You Could Use this function
    private function guzzelCall()
    {
        //Guzzle Code Here
        return false ;
    }


}