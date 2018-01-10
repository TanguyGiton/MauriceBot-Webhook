<?php

namespace MauriceBot\Webhook;

class Error implements \JsonSerializable
{
    /**
     * The request was invalid or cannot be served.
     */
    const CODE_BAD_REQUEST = 400;

    /**
     * The request requires user authentication.
     */
    const CODE_UNAUTHORIZED = 401;

    /**
     * The server understood the request but refuses to take any further action or the access is not allowed.
     */
    const CODE_FORBIDDEN = 403;

    /**
     * There is no resource behind the URI.
     */
    const CODE_NOT_FOUND = 404;

    /**
     * Internal Server Error.
     */
    const CODE_SERVER_FAULT = 500;

    /**
     * Internal Server Error.
     */
    const CODE_SERVICE_UNAVAILABLE = 503;

    private $code;

    private $message;

    public function __construct($code, $message)
    {
        $this->code    = $code;
        $this->message = $message;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}