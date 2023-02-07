<?php

class Password {
    public $passLen, $passIncludes;
    public $letters = "abcdefghijklmnopqrstuvwxyz";
    public $number = "0123456789";
    public $symbol = "!@#$%^&*()_+=.";

    public function __construct($passLen = 16, $passIncludes = ["number", "lowLetter", "upLetter", "symbol"]) {
        $this->passLen = $passLen;
        $this->passIncludes = $passIncludes;
    }

    public function generate() {
        $chars = "";
        $result = "";

        if(in_array("number", $this->passIncludes)) {
            $chars .= $this->number;
        }

        if(in_array("lowLetter", $this->passIncludes)) {
            $chars .= $this->letters;
        }

        if(in_array("upLetter", $this->passIncludes)) {
            $chars .= strtoupper($this->letters);
        }

        if(in_array("symbol", $this->passIncludes)) {
            $chars .= $this->symbol;
        }

        $chars = str_shuffle($chars);


        for($i=0; $i < $this->passLen; $i++) {
            $result .= $chars[rand(0, strlen($chars))];
        }

        return $result;
    }
}

$obj = new Password(10, ["number", "lowLetter"]);
echo $obj->generate();