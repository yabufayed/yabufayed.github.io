<?php
/*
 * UnifonicNextGenLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace UnifonicNextGenLib\Controllers;

use UnifonicNextGenLib\APIException;
use UnifonicNextGenLib\APIHelper;
use UnifonicNextGenLib\Configuration;
use UnifonicNextGenLib\Models;
use UnifonicNextGenLib\Exceptions;
use UnifonicNextGenLib\Http\HttpRequest;
use UnifonicNextGenLib\Http\HttpResponse;
use UnifonicNextGenLib\Http\HttpMethod;
use UnifonicNextGenLib\Http\HttpContext;
use UnifonicNextGenLib\Servers;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class WrapperController extends BaseController
{
    /**
     * @var WrapperController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return WrapperController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Unifonic Get message query API allows you to get details of specified message.
     *
     * @param string  $appsid A character string that uniquely identifies your app
     * @param integer $msgid  A unique ID that identifies a message
     * @param integer $to     (optional) Destination mobile number, mobile numbers must be in international format
     *                        without 00 or + Example: (4452023498)
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetMsgQuery(
        $appsid,
        $msgid,
        $to = null
    ) {
        //check that all required arguments are provided
        if (!isset($appsid, $msgid)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/wrapper/msgQuery';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'appsid' => $appsid,
            'msgid'  => $msgid,
            'to'     => $to,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri(Servers::BASE_URL) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Authentication failed', $_httpContext);
        }

        if ($response->code == 402) {
            throw new APIException('Missing parameter AppSid', $_httpContext);
        }

        if ($response->code == 432) {
            throw new APIException('MessageId must be numeric', $_httpContext);
        }

        if ($response->code == 452) {
            throw new APIException('User must specify either messageId or recipient parameter', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'UnifonicNextGenLib\\Models\\GetMessageQueryResponse');
    }

    /**
     * Unifonic Send Wrapper API allows you to send  text messages to  multiple users at the same time
     *
     * @param string  $appsid     A character string that uniquely identifies your app
     * @param string  $msg        Message body supports both English and unicodes characters, concatenated messages is
     *                            supported
     * @param integer $to         Destination mobile number, mobile numbers must be in international format without 00
     *                            or + Example: (4452023498)
     * @param string  $sender     The SenderID to send from, App default SenderID is used unless else stated
     * @param bool    $baseEncode (optional) Binary-to-text encoding schemes that represent binary data in an ASCII
     *                            string format
     * @param string  $encoding   (optional) Converts information from a source into symbols for communication or
     *                            storage, GSM7 for English and UCS2 for Arabic
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createSendMessage(
        $appsid,
        $msg,
        $to,
        $sender,
        $baseEncode = false,
        $encoding = 'UCS2'
    ) {
        //check that all required arguments are provided
        if (!isset($appsid, $msg, $to, $sender)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/wrapper/sendSMS.php';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'appsid'     => $appsid,
            'msg'        => $msg,
            'to'         => $to,
            'sender'     => $sender,
            'baseEncode' => (null != $baseEncode) ? var_export($baseEncode, true) : false,
            'encoding'   => (null != $encoding) ? $encoding : 'UCS2',
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri(Servers::BASE_URL) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 401) {
            throw new APIException('Authentication failed', $_httpContext);
        }

        if ($response->code == 402) {
            throw new APIException('Missing parameter AppSid', $_httpContext);
        }

        if ($response->code == 459) {
            throw new APIException('Authentication parameters are incorrectly base64 encoded', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'UnifonicNextGenLib\\Models\\SendWrapperResponse');
    }
}
