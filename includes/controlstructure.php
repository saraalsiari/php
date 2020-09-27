<div class="row">
    <h3>Displaying the complexity of a program due to Control Structure</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Line no</th>
                <th scope="col">Program statements</th>
                
                <th scope="col">Wts</th>
                <th scope="col">NC</th>
                <th scope="col">Ccspps</th>
                <th scope="col">Cs</th>
           
            </tr>
        </thead>
        <tbody>
            <?php

                $file = "configcontrol.xml";
                $xml= simplexml_load_file($file);
                
                $totalFactorsFile = "total_factors.xml";
                $totalFactorsXml= simplexml_load_file($totalFactorsFile);
                $totalFactorsXml->ccs = 0;
                file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());
                 
                $ie = $xml->ie;
                $fw = $xml->fw;
                $sw = $xml->sw;
                $ca = $xml->ca;

                require_once('controlstructureRules.php');
                $rules = new controlstructureRules();


                for ($i=0; $i<count($codeLine); $i++) {
                    $ie = $ie;
                    $fw = $fw;
                    $sw= $sw;
                    $ca= $ca;
                    $nc= 0;
                    $wts= 0;
                    $ccs= 0;

                    $local = 0;

                    if (strpos($codeLine[$i], "if") !== false ) {
                        $wts = $ie = $ie;
                        $nc += 1;
                    }
                    if (strpos($codeLine[$i], "else if") !== false ){
                        $wts = $ie = 2;
                        $nc += 1; 
                    }
                    if (strpos($codeLine[$i], "for") !== false ){
                        $wts = $fw = 3;
                        $nc += 1;
                    }if (strpos($codeLine[$i], "while") !== false){
                        $wts = $fw = 3;
                        $nc += 1;
                    }
                    if (strpos($codeLine[$i], "do-while") !== false ){
                        $wts = $fw = 3;
                        $nc += 1;
                    }
                    if (strpos($codeLine[$i], "switch") !== false ){
                        $wts = $sw = 2;
                        $nc += 1;
                    }
                    if (strpos($codeLine[$i], "case") !== false){
                        $wts = $ca = 1;
                        $nc += 1;
                    }

                    $ccs = ($wts * $nc);
                    $totalFactorsXml->ccs += $ccs;
                   

                    echo "<tr>
                                <td>". ($i+1) ."</td>
                                <td><pre>".$codeLine[$i]."</pre></td>
                   
                                <td>". ($wts) ."</td>
                                <td>". ($nc) ."</td>
                                <td>". ($sw) ."</td>
                                <td>". ($ccs) ."</td>
                    
                            </tr>";

                }
                file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());
            
            ?>
        </tbody>
    </table>
</div>