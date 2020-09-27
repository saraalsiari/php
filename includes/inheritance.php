<div class="row">
    <h3>Displaying the complexity of a program due to inheritance</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Line no</th>
                <th scope="col">Program statements</th>
                <th scope="col">Ndi</th>
                <th scope="col">Nidi</th>
                <th scope="col">Ti</th>
                <th scope="col">Ci</th>
                
            </tr>
        </thead>
        <tbody>
            <?php

                $file = "configinheritance.xml";
                $xml= simplexml_load_file($file);
                // write to a xml file to display in all factors table
                $totalFactorsFile = "total_factors.xml";
                $totalFactorsXml= simplexml_load_file($totalFactorsFile);
                $totalFactorsXml->ci = 0;
                file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());

                $Ndi = $xml->Ndi; 
                $Nidi = $xml->Nidi;
                $Ti = $xml->Ti;
                $Ci = $xml->Ci;
                function getPartsByComa ($str){
                    $strArray = explode(",",$str);
                    return count($strArray);
                }

                for ($i=0; $i<count($codeLine); $i++) {
                    $Ni = 0;
                    $Nidi = 0;
                    $Ti= 0;
                    $Ci= 0;
                   
                    $parts = explode("{",$codeLine[$i]);
                   
                    if (strpos($parts[0],"class") !== false){
							
                        $extendsParts = explode("extends",$parts[0]);
                        if (count($extendsParts) > 1){
                            
                            $implementParts = explode("implements",$extendsParts[1]);
                            
                            if(count($implementParts) > 1){
                                $Nidi += getPartsByComa($implementParts[1]);
                            }
                            
                             $Ni += getPartsByComa($implementParts[0]);
                             //echo $implementParts[0];
                        }
                        
                        
                        //echo $extendsParts[0];
                    }
                    $Ti=$Ndi+$Nidi;
                    $totalFactorsXml->ci = $Ti;

                    echo "<tr>
                            <td>". ($i+1) ."</td>
                            <td><pre>".$codeLine[$i]."</pre></td>
                            <td>". ($Ni) ."</td>
                            <td>". ($Nidi) ."</td>
                            <td>". ($Ti) ."</td>
                            <td>". ($Ci) ."</td>
                            
                        </tr>";
                }
                file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());
            
            ?>
        </tbody>
    </table>
</div>