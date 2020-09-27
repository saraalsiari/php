<?php

class CouplingRules {

    public $identifiedMethods;
    public $identifiedMethodsInvokes;
    public $oneLineParts;

    public $userDefinedTypes;
    public $identifiedRecursions;
    private $notTerminatedLines;

    private $ignoreKeywords = array("if", "else if", "else", "switch",
     "case", "default", "for", "while", "class", "try", "catch", "finaly", "extends", "implements", "abstract", "throw", "import", "package");

    private $primitiveTypes = array("boolean", "byte", "short", "int",
     "float", "double", "long", "char");
    
    private $mustConsiderKeywords = array("new", "class", "print", "println", "return",
     "private", "public", "protected", "default", "static", "void");

    private $specialChars = array("_", "-", ".", "(", ")", "{", "}", "[", "]",
     "<", ">", "=", ":", ";", "?", "+", "/", "*", "\\", "!", "@", "#", "$", "%", "^",
     " ", "&", "~", ",", "'", "\"", "|");

    private $opendBracesInOneLine;
    private $closedBracesInOneLine;
    private $commasInOneLine;
    private $globalVariables;

    public function __construct() {
        $this->identifiedMethods = array();
        $this->identifiedMethodsInvokes = array();
        $this->oneLineParts = array();
        $this->userDefinedTypes = array();
        $this->identifiedMethods = array();
        $this->identifiedRecursions = array();
        $this->notTerminatedLines = "";
        $this->opendBracesInOneLine = array();
        $this->closedBracesInOneLine = array();
        $this->commasInOneLine = array();
        $this->globalVariables = array();
    }

    function findRecursiveMethods($line) {
        $appearedCount = 0;

        $lookup = preg_match("/([a-zA-Z_]+)([\(\)])/", $line, $matches);
        if (count($matches) > 1) {

            if (preg_match('/(void|public|private|String).+/', $line) === 0) {
                if (isset($matches) && in_array($matches[1], $this->identifiedMethods)) {
                    $this->identifiedMethods = [];
                    $appearedCount += 1;
                }
            }
            array_push($this->identifiedMethods, $matches[1]);
        }

        return $appearedCount;
    }

    function findARegularMethodCall($line) {
        $appearedCount = 0;

        $strlen = strlen($line);
        if ($strlen > 0) {

            if (preg_match("/[(?]\w[)?,*]^(;$)/", $line,  $matches) === 1) {
                $appearedCount += 1;
            }
            
            if (preg_match('/(void|public|private|String).+/', $line) === 0) {
                if (preg_match("/([a-zA-Z_]+)([\(\)])/", $line, $matches) === 1) {
                    // $appearedCount += 1;
                    foreach ($matches as $key => $val) {
                        if (preg_match("/\w+\(+/", $val) === 1) {
                            $appearedCount += 1;
                            // echo $val;
                            // echo "<br/>";
                        }
                    }
                }

                if (preg_match("/\(\),/", $line, $matches) === 1) {
                    $appearedCount += 1;
                }

                if (preg_match("/\(\)\./", $line, $matches) === 1) {
                    $appearedCount += 1;
                    // print_r($matches);
                    // echo "<br/>";
                }
            }
            return $appearedCount;
        }
    }

    function globalVariableCount($line) {
        $appearedCount = 0;
        if (preg_match("/([private|public|protected|default]?)\w+;$/", $line, $matches) === 1) {
            array_push($this->globalVariables, $matches[count($matches)-1]);
            $appearedCount += 1;
        }
        return $appearedCount;
    }

    function checkBraces($str) {
        $strlen = strlen($str);
        $openbraces = 0;

        for ($i = 0; $i < $strlen; $i++) {
            $c = $str[$i];
            if ($c == "(") {
                array_push($this->opendBracesInOneLine, $c);
                $openbraces++;
            }

            if ($c == ")") {
                array_push($this->closedBracesInOneLine, $c);
                $openbraces--;
            }
            
            if ($c == ",") {
                array_push($this->commasInOneLine, $c);
            }

            if ($openbraces < 0)
                return false;
        }

        return $openbraces == 0;
    }

    function checkCurlyBraces($str) {
        $strlen = strlen($str);
        $openbraces = 0;

        for ($i = 0; $i < $strlen; $i++) {
            $c = $str[$i];
            if ($c == "{") {
                $openbraces++;
            }

            if ($c == "}") {
                $openbraces--;
            }

            if ($openbraces < 0)
                return false;
        }

        return $openbraces == 0;
    }

    function displayArr() {
        print_r($this->identifiedMethods);
        print_r($this->identifiedMethodsInvokes);
        // print_r($this->oneLineParts);
    }
}

?>