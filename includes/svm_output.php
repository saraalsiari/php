<!-- Size -->
<div class="row">
    <h3>Size</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Line no</th>
            <th scope="col">Program statements</th>
            <th scope="col">Nkw</th>
            <th scope="col">Nid</th>
            <th scope="col">Nop</th>
            <th scope="col">Nnv</th>
            <th scope="col">Nsl</th>
            <th scope="col">cs</th>

        </tr>
        </thead>
        <tbody>
        <?php

        $file = "config1.xml";
        $xml= simplexml_load_file($file);
        // write to a xml file to display in all factors table
        $totalFactorsFile = "total_factors.xml";
        $totalFactorsXml= simplexml_load_file($totalFactorsFile);
        $totalFactorsXml->cs = 0;
        file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());

        $wkw = $xml->wkw;
        $wid = $xml->wid;
        $wop = $xml->wop;
        $wnv = $xml->wnv;
        $wsl = $xml->wsl;

        $ccp = 0;

        require_once('svmRules.php');
        $rules = new svmRules();

        for ($i=0; $i<count($codeLine); $i++) {
            $Nkw = 0;
            $Nid = 0;
            $Nop = 0;
            $Nnv = 0;
            $Nsl = 0;

            $check = 0;


            if (strpos($codeLine[$i], "//") === false && strpos($codeLine[$i], "/*") === false
                && strpos($codeLine[$i], "#") === false ) {

                if (strpos($codeLine[$i], "class") !== false) {
                    $Nkw += 1;
                }

                if (strpos($codeLine[$i], "public") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "private") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "void") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "true") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "else") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "default") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "return") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "null") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "break") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "this") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "extends") !== false) {
                    $Nkw += 1;
                }
                if (strpos($codeLine[$i], "implements") !== false) {
                    $Nkw += 1;
                }

                if (strpos($codeLine[$i], '"') !== false) {
                    $Nsl += 1;
                }
                if (strpos($codeLine[$i], '+ "') !== false) {
                    $Nsl += 1;
                }


                //identifires

                //identifires-varibales


                if (strpos($codeLine[$i], "float") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "char") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "boolean") !== false) {
                    $Nid += 1;
                }

                //methods
                if (strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ');') !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], ';') !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false && strpos($codeLine[$i], '{') !== false) {
                    $Nid += 1;
                }

                /*    if (strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '"') !== false) {
                       $Nid -= 1;
                   } */

                /* if (strpos($codeLine[$i], '));') !== false ) {
                     $Nid += 1;
                 } */

                if (strpos($codeLine[$i], '().') !== false) {
                    $Nop += 1;
                }


                if (strpos($codeLine[$i], '),') !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], ').') !== false) {
                    $Nid += 1;
                }

                //data structures
                if (strpos($codeLine[$i], "Array") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "Stack") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "Queue") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "Linkedlist") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "implements") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "extends") !== false && strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], '.') !== false) {
                    $Nid += 2;
                }


                if (strpos($codeLine[$i], "implements") !== false && strpos($codeLine[$i], ',') !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nid += 2;
                }

                if (strpos($codeLine[$i], "public class") !== false) {
                    $Nid += 1;
                }

                if (strpos($codeLine[$i], "extends") !== false) {
                    $Nid += 1;
                }



                if (strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '.') !== false  && strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], '.') !== false  && strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], '"') !== false) {
                    $Nop -= 1;
                }

                $strlen = strlen($codeLine[$i]);
                for ($j = 0; $j < $strlen; $j++) {
                    $c = $codeLine[$i][$j];

                    if ($c == "a." || $c == "b." || $c == "c." ||  $c == "f." || $c == "j." || $c == "k."
                        || $c == "l." || $c == "m." || $c == "n." || $c == "o." || $c == "p." || $c == "q."
                        || $c == "r." || $c == "s." || $c == "t." || $c == "u." || $c == "v." || $c == "w."
                        || $c == "x." || $c == "y." || $c == "z." || $c == "e.") {
                        $Nid += 1;
                    }
                }



                //number of operators
                $strlen = strlen($codeLine[$i]);
                for ($y = 0; $y < $strlen; $y++) {
                    $c = $codeLine[$i][$y];

                    if ($c == '+' || $c == '-' || $c == '*' || $c == '/' || $c == '%' || $c == '++' || $c == '--'
                        || $c == '==' || $c == '!=' || $c == '>' || $c == '<' || $c == '>=' || $c == '<='
                        || $c == '&&' || $c == '||' || $c == '!' || $c == '|' || $c == '^' || $c == '~'
                        || $c == '<<' || $c == '>>' || $c == '>>>' || $c == '<<<' || $c == ',' || $c == '->'
                        || $c == '.' || $c == '::' || $c == '+=' || $c == '-=' || $c == '*=' || $c == '/='
                        || $c == '=' || $c == '>>>=' || $c == '|=' || $c == '&=' || $c == '%=' || $c == '<<='
                        || $c == '>>=' || $c == '^=') {
                        $Nop += 1;
                    }
                }

                //numercale values
                $strlen = strlen($codeLine[$i]);
                for ($z = 0; $z < $strlen; $z++) {
                    $num = $codeLine[$i][$z];

                    //  if ( is_numeric($num) )

                    if ($num == '1' || $num == '2' || $num == '3' || $num == '4' || $num == '5'
                        || $num == '6' || $num == '7'
                        || $num == '8' || $num == '9' || $num == '0') {
                        $Nnv += 1;
                    }

                }

                //

                if (strpos($codeLine[$i], '"') !== false  && strpos($codeLine[$i], '/') !== false  && strpos($codeLine[$i], '"') !== false) {
                    $Nop -= 1;
                }

                if (strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], '"') !== false) {
                    $Nop -= 1;
                }

                if (strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '-') !== false && strpos($codeLine[$i], '"') !== false) {
                    $Nop -= 1;
                }

                if (strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '!') !== false && strpos($codeLine[$i], '"') !== false) {
                    $Nop -= 1;
                }

                if (strpos($codeLine[$i], '"') !== false && strpos($codeLine[$i], '.') !== false  && strpos($codeLine[$i], '.') !== false && strpos($codeLine[$i], '"') !== false) {
                    $Nop -= 1;
                }
                //


                if($Nnv == 6){

                    $Nnv =  $Nnv / 2 - 1;
                }

                if($Nop == -1){

                    $Nop =  0;
                }


                //ignoring import
                if (strpos($codeLine[$i], "import") !== false ) {
                    $Nop = 0;

                }

                $arithmatic = $wop*$Nop;
                //$Numericle = $wnv*$Nnv;
                // $Nsl = $wsl*0;
                $Stringl = $wsl*$Nsl;

                $ccp = ($wkw * $Nkw) + ($Nid * $wid) + ($wop * $Nop) + ($wnv * $Nnv) + ($wsl * $Nsl);
                $totalFactorsXml->cs += $ccp;

                echo "<tr>
                            <td>". ($i+1) ."</td>
                            <td><pre>".$codeLine[$i]."</pre></td>
                            <td>". ($Nkw) ."</td>
                            <td>". ($Nid) ."</td>
                            <td>". ($arithmatic) ."</td>
                            <td>". $Nnv ."</td>
                            <td>". $Stringl ."</td>
                            <td>". ($ccp) ."</td>
                        </tr>";
            }
        }

        ?>
        </tbody>
    </table>
</div>

<!-- Variables -->

<div class="row">
    <h3>Variables</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Line no</th>
            <th scope="col">Program statements</th>
            <th scope="col">Wvs</th>
            <th scope="col">Nspdtv</th>
            <th scope="col">Ncdtv</th>
            <th scope="col">Cv</th>


        </tr>
        </thead>
        <tbody>
        <?php

        $file = "config2.xml";
        $xml= simplexml_load_file($file);
        $totalFactorsXml->cv = 0;
        file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());

        $wgv = $xml->wgv;
        $wlv = $xml->wlv;
        $wpdtv = $xml->wpdtv;
        $wcdtv = $xml->wcdtv;

        $ccp = 0;

        require_once('svmRules.php');
        $rules = new svmRules();

        for ($i=0; $i<count($codeLine); $i++) {
            $Wvs = 0;
            $Nspdtv = 0;
            $Ncdtv= 0;
            $Cv= 0;

            $local = 0;


            if (strpos($codeLine[$i], "//") === false && strpos($codeLine[$i], "/*") === false
                && strpos($codeLine[$i], "#") === false) {



                //number of premtive data types
                //int

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'int') !== false) {
                    $Nspdtv += 1;
                }


                if (strpos($codeLine[$i], "int") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nspdtv += 1;
                }

                if (strpos($codeLine[$i], "int") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Nspdtv += 1;
                }

                //long

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'long') !== false) {
                    $Nspdtv += 1;
                }


                if (strpos($codeLine[$i], "long") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nspdtv += 1;
                }

                if (strpos($codeLine[$i], "long") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Nspdtv += 1;
                }

                //double

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'double') !== false) {
                    $Nspdtv += 1;
                }


                if (strpos($codeLine[$i], "double") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nspdtv += 1;
                }

                if (strpos($codeLine[$i], "double") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Nspdtv += 1;
                }

                //float

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'float') !== false) {
                    $Nspdtv += 1;
                }


                if (strpos($codeLine[$i], "float") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nspdtv += 1;
                }

                if (strpos($codeLine[$i], "float") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Nspdtv += 1;
                }

                //boolean

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'boolean') !== false) {
                    $Nspdtv += 1;
                }


                if (strpos($codeLine[$i], "boolean") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nspdtv += 1;
                }

                if (strpos($codeLine[$i], "boolean") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Nspdtv += 1;
                }

                //char

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'char') !== false) {
                    $Nspdtv += 1;
                }


                if (strpos($codeLine[$i], "char") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Nspdtv += 1;
                }

                if (strpos($codeLine[$i], "char") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Nspdtv += 1;
                }

                ////number of composite data types
                //arrays
                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'Array') !== false) {
                    $Ncdtv += 1;
                }


                if (strpos($codeLine[$i], "Array") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Ncdtv += 1;
                }

                if (strpos($codeLine[$i], "Array") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Ncdtv += 1;
                }

                //Dimension

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'Dimension') !== false) {
                    $Ncdtv += 1;
                }


                if (strpos($codeLine[$i], "Dimension") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Ncdtv += 1;
                }

                if (strpos($codeLine[$i], "Dimension") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Ncdtv += 1;
                }

                //interface

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'interface') !== false) {
                    $Ncdtv += 1;
                }


                if (strpos($codeLine[$i], "interface") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Ncdtv += 1;
                }

                if (strpos($codeLine[$i], "interface") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Ncdtv += 1;
                }


                //list

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'list') !== false) {
                    $Ncdtv += 1;
                }


                if (strpos($codeLine[$i], "list") !== false && strpos($codeLine[$i], ',') !== false) {
                    $Ncdtv += 1;
                }

                if (strpos($codeLine[$i], "list") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $Ncdtv += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'int') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "int") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'Dimension') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "Dimension") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'long') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "long") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'double') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "double") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global
                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'float') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "float") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'boolean') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "boolean") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'char') !== false) {
                    $Wvs += 1;
                }


                //local
                if (strpos($codeLine[$i], "char") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'Array') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "Array") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //global

                if (strpos($codeLine[$i], "private") !== false && strpos($codeLine[$i], 'list') !== false) {
                    $Wvs += 1;
                }


                //local

                if (strpos($codeLine[$i], "list") !== false && strpos($codeLine[$i], '=') !== false && strpos($codeLine[$i], '();') !== false) {
                    $local += 1;
                }

                //$Wvs = $wgv * 0;
                //$Nspdtv = $wlv * 0;
                //$Ncdtv = $wpdtv*0;
                //$com= $wcdtv*$Ncdtv;

                $tot= ($Wvs * $wgv) + $local;

                $ccp= $tot * (($Nspdtv*$wpdtv) + ($Ncdtv*$wcdtv));
                $totalFactorsXml->cv += $ccp;
                echo "<tr>
                            <td>". ($i+1) ."</td>
                            <td><pre>".$codeLine[$i]."</pre></td>
                            <td>". ($tot) ."</td>
                            <td>". ($Nspdtv) ."</td>
                            <td>". ($Ncdtv) ."</td>
                            
                           
                            <td>". ($ccp) ."</td>
                        </tr>";
            }
        }

        ?>
        </tbody>
    </table>
</div>


<!-- Methods -->

<div class="row">
    <h3>Methods</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Line no</th>
            <th scope="col">Program statements</th>
            <th scope="col">Wmrt</th>
            <th scope="col">Npdtp</th>
            <th scope="col">Ncdtp</th>
            <th scope="col">Cm</th>


        </tr>
        </thead>
        <tbody>
        <?php

        $file = "config3.xml";
        $xml= simplexml_load_file($file);
        $totalFactorsXml->cm = 0;
        file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());

        $wprt = $xml->wprt;
        $wcrt = $xml->wcrt;
        $wmvrt = $xml->wmvrt;
        $wpdtp = $xml->wpdtp;
        $wcdtp = $xml->wcdtp;
        $ccp = 0;

        require_once('svmRules.php');
        $rules = new svmRules();

        for ($i=0; $i<count($codeLine); $i++) {
            $Wmrt = 0;
            $Npdtp = 0;
            $Ncdtp= 0;
            $Cm= 0;

            $preturnt = 0;


            if (strpos($codeLine[$i], "//") === false && strpos($codeLine[$i], "/*") === false
                && strpos($codeLine[$i], "#") === false) {




                //methods - npdtp
                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], "int") !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Npdtp += 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], "int") !== false && strpos($codeLine[$i], '()') !== false) {
                    $Npdtp -= 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'long') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Npdtp += 1;
                }

                if (strpos($codeLine[$i], 'public') !== false &&  strpos($codeLine[$i], 'long') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Npdtp -= 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'double') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Npdtp += 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'double') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Npdtp -= 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'float') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Npdtp += 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'float') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Npdtp -= 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'boolean') !== false  &&  strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Npdtp += 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'boolean') !== false  && strpos($codeLine[$i], '()') !== false) {
                    $Npdtp -= 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'char') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Npdtp += 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'char') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Npdtp -= 1;
                }

                //methods - ncdtp
                if (strpos($codeLine[$i], 'void') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Ncdtp += 1;
                }

                if (strpos($codeLine[$i], 'void') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Ncdtp -= 1;
                }

                if (strpos($codeLine[$i], 'Array') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Ncdtp += 1;
                }

                if (strpos($codeLine[$i], 'Array') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Ncdtp -= 1;
                }

                if (strpos($codeLine[$i], 'list') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Ncdtp += 1;
                }

                if (strpos($codeLine[$i], 'list') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Ncdtp -= 1;
                }

                if (strpos($codeLine[$i], 'interface') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Ncdtp += 1;
                }

                if (strpos($codeLine[$i], 'interface') !== false && strpos($codeLine[$i], '()') !== false) {
                    $Ncdtp -= 1;
                }

                //ch

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'aint') !== false || strpos($codeLine[$i], 'bint') !== false || strpos($codeLine[$i], 'cint') !== false || strpos($codeLine[$i], 'dint') !== false || strpos($codeLine[$i], 'eint') !== false || strpos($codeLine[$i], 'fint') !== false || strpos($codeLine[$i], 'gint') !== false || strpos($codeLine[$i], 'hint') !== false || strpos($codeLine[$i], 'iint') !== false || strpos($codeLine[$i], 'jint') !== false || strpos($codeLine[$i], 'kint') !== false || strpos($codeLine[$i], 'lint') !== false || strpos($codeLine[$i], 'mint') !== false || strpos($codeLine[$i], 'nint') !== false || strpos($codeLine[$i], 'oint') !== false || strpos($codeLine[$i], 'pint') !== false || strpos($codeLine[$i], 'qint') !== false || strpos($codeLine[$i], 'rint') !== false || strpos($codeLine[$i], 'sint') !== false || strpos($codeLine[$i], 'tint') !== false || strpos($codeLine[$i], 'uint') !== false || strpos($codeLine[$i], 'binv') !== false || strpos($codeLine[$i], 'xint') !== false || strpos($codeLine[$i], 'yint') !== false || strpos($codeLine[$i], 'zint') !== false) {
                    $Npdtp -= 1;
                }

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'aint') !== false || strpos($codeLine[$i], 'bint') !== false || strpos($codeLine[$i], 'cint') !== false || strpos($codeLine[$i], 'dint') !== false || strpos($codeLine[$i], 'eint') !== false || strpos($codeLine[$i], 'fint') !== false || strpos($codeLine[$i], 'gint') !== false || strpos($codeLine[$i], 'hint') !== false || strpos($codeLine[$i], 'iint') !== false || strpos($codeLine[$i], 'jint') !== false || strpos($codeLine[$i], 'kint') !== false || strpos($codeLine[$i], 'lint') !== false || strpos($codeLine[$i], 'mint') !== false || strpos($codeLine[$i], 'nint') !== false || strpos($codeLine[$i], 'oint') !== false || strpos($codeLine[$i], 'pint') !== false || strpos($codeLine[$i], 'qint') !== false || strpos($codeLine[$i], 'rint') !== false || strpos($codeLine[$i], 'sint') !== false || strpos($codeLine[$i], 'tint') !== false || strpos($codeLine[$i], 'uint') !== false || strpos($codeLine[$i], 'binv') !== false || strpos($codeLine[$i], 'xint') !== false || strpos($codeLine[$i], 'yint') !== false || strpos($codeLine[$i], 'zint') !== false) {
                    $preturnt -= 1;
                }

                //ch



                //wmrt - com
                if (strpos($codeLine[$i], 'String') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Wmrt += 1;
                }


                if (strpos($codeLine[$i], 'Array') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Wmrt += 1;
                }


                if (strpos($codeLine[$i], 'interface') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Wmrt += 1;
                }

                if (strpos($codeLine[$i], 'list') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $Wmrt += 1;
                }

                //wmrt - prem

                if (strpos($codeLine[$i], 'public') !== false && strpos($codeLine[$i], 'int') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $preturnt += 1;
                }

                if (strpos($codeLine[$i], 'long') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $preturnt += 1;
                }


                if (strpos($codeLine[$i], 'double') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $preturnt += 1;
                }


                if (strpos($codeLine[$i], 'float') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $preturnt += 1;
                }

                if (strpos($codeLine[$i], 'boolean') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $preturnt += 1;
                }

                if (strpos($codeLine[$i], 'char') !== false && strpos($codeLine[$i], '(') !== false && strpos($codeLine[$i], ')') !== false) {
                    $preturnt += 1;
                }




                $tot = ($Wmrt * $wcrt) + ($preturnt * $wprt);




                $Cm = $tot + ( $Npdtp * $wpdtp) + ($Ncdtp* $wcdtp);
                $totalFactorsXml->cm += $Cm;

                echo "<tr>
                            <td>". ($i+1) ."</td>
                            <td><pre>".$codeLine[$i]."</pre></td>
                            <td>". ($tot) ."</td>
                            <td>". ($Npdtp) ."</td>
                            <td>". ($Ncdtp) ."</td>
                            
                            <td>". ($Cm) ."</td>
                        </tr>";
            }
        }
        file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());

        ?>
        </tbody>
    </table>
</div>