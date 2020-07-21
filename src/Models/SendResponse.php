<?php
/*
 * UnifonicNextGenLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace UnifonicNextGenLib\Models;

use JsonSerializable;

/**
 *Sends one message.
 */
class SendResponse implements JsonSerializable
{
    /**
     * The message sent successfully
     * @required
     * @var string $success public property
     */
    public $success;

    /**
     * The Error message if its false, Null if its true
     * @required
     * @var string $message public property
     */
    public $message;

    /**
     * The error code if there is any
     * @required
     * @var string $errorCode public property
     */
    public $errorCode;

    /**
     * Message id, Time created, correlation id., status, number of units, cost, balance, Recipient
     * @required
     * @var object $data public property
     */
    public $data;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $success   Initialization value for $this->success
     * @param string $message   Initialization value for $this->message
     * @param string $errorCode Initialization value for $this->errorCode
     * @param object $data      Initialization value for $this->data
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->success   = func_get_arg(0);
            $this->message   = func_get_arg(1);
            $this->errorCode = func_get_arg(2);
            $this->data      = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['success']   = $this->success;
        $json['message']   = $this->message;
        $json['errorCode'] = $this->errorCode;
        $json['data']      = $this->data;

        return $json;
    }
}
