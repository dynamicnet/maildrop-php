<?php

declare(strict_types=1);

/*
* This software may be modified and distributed under the terms
* of the MIT license. See the LICENSE file for details.
*/

namespace Maildrop\Model;

use Maildrop\Exception\TransactionalMessageException;

class TransactionalMessage implements \JsonSerializable
{
    private $smtp_username;
    private $smtp_password;

    private $subject;
    private $from;
    private $reply_to = [];
    private $to = [];
    private $cc = [];
    private $bcc = [];
    private $headers = [];
    private $html;
    private $text;
    private $attachments = [];

    public function __construct($username, $password)
    {
        $this->smtp_username = $username;
        $this->smtp_password = $password;
    }

    public function subject($str_subject)
    {
        $this->subject = $str_subject;
        return $this;
    }

    public function from($str_email, $str_name=null)
    {
        $from = [
            "address" => $str_email
        ];

        if (! is_null($str_name)) {
            $from["name"] = $str_name;
        }

        $this->from = $from;

        return $this;
    }

    public function to($str_email, $str_name=null)
    {
        $to = [
            "address" => $str_email
        ];

        if (! is_null($str_name)) {
            $to["name"] = $str_name;
        }

        $this->to[] = $to;

        return $this;
    }

    public function replyTo($str_email, $str_name=null)
    {
        $reply_to = [
            "address" => $str_email
        ];

        if (! is_null($str_name)) {
            $reply_to["name"] = $str_name;
        }

        $this->reply_to[] = $reply_to;

        return $this;
    }

    public function cc($str_email, $str_name=null)
    {
        $cc = [
            "address" => $str_email
        ];

        if (! is_null($str_name)) {
            $cc["name"] = $str_name;
        }

        $this->cc[] = $cc;

        return $this;
    }

    public function bcc($str_email, $str_name=null)
    {
        $bcc = [
            "address" => $str_email
        ];

        if (! is_null($str_name)) {
            $bcc["name"] = $str_name;
        }

        $this->bcc[] = $bcc;

        return $this;
    }

    public function html($str_html)
    {
        $this->html = $str_html;
        return $this;
    }

    public function text($str_text)
    {
        $this->text = $str_text;
        return $this;
    }

    public function header($str_name, $str_content)
    {
        $this->headers[] = [
            "name" => $str_name,
            "content" => $str_content
        ];

        return $this;
    }

    public function attachment($url_or_filepath, $filename = null, $content_type=null)
    {
        if ( \preg_match("/^http?s:\/\//i", $url_or_filepath) ) {
            $attachment = [
                "url" => $url_or_filepath,
                "filename" => $filename,
                "content-type" => $content_type
            ];

            $this->attachments[] = $attachment;

            return $this;
        } elseif (\preg_match("/:\/\//i", $url_or_filepath)) {
            throw new TransactionalMessageException("Given URL seems invalid \"{$url_or_filepath}\"");
        } elseif (! \file_exists($url_or_filepath)) {
            throw new TransactionalMessageException("Unable to locate attached file \"{$url_or_filepath}\"");
        }

        return $this->attachment_base64(
            \base64_encode(\file_get_contents($url_or_filepath)),
            $filename,
            $content_type
        );
    }

    public function attachment_base64($data, $filename, $content_type)
    {
        $this->attachments[] = [
            "base64" => $data,
            "filename" => $filename,
            "content_type" => $content_type
        ];

        return $this;
    }

    public function reset_recipient()
    {
        $this->to = $this->cc = $this->bcc = [];
        return $this;
    }

    public function jsonSerialize()
    {
        $jsonable = [
            "smtp_auth" => [
                "username" => $this->smtp_username,
                "password" => $this->smtp_password
            ],
            "subject" => $this->subject,
            "from" => $this->from,
            "to" => $this->to,
            "cc" => $this->cc,
            "bcc" => $this->bcc,
            "reply_to" => $this->reply_to,

            "headers" => $this->headers,
            "toto" => "sdfsdf"
        ];

        if ($this->html) {
            $jsonable["html"] = $this->html;
        }

        if ($this->text) {
            $jsonable["text"] = $this->text;
        }

        if ($this->attachments) {
            $jsonable["attachments"] = $this->attachments;
        }

        return (object)$jsonable;
    }
}
