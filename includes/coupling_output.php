<div class="row">
    <h3>Displaying the complexity of a program due to coupling</h3>
    <div class="col-md-2">
        <form action="generate_pdf.php" method="POST">
            <?php foreach ($codeLine as $line) : ?>
                <input type="hidden" name="codeLine[]" value="<?= htmlspecialchars($line); ?>" />
            <?php endforeach; ?>
            <input type="submit" class="btn btn-info" name="generate" id="generate" 
                value="Generate PDF" />
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Line no</th>
                <th scope="col">Program statements</th>
                <th scope="col">Nr</th>
                <th scope="col">Nmcms</th>
                <th scope="col">Nmcmd</th>
                <th scope="col">Nmcrms</th>
                <th scope="col">Nmcrmd</th>
                <th scope="col">Nrmcrms</th>
                <th scope="col">Nrmcrmd</th>
                <th scope="col">Nrmcms</th>
                <th scope="col">Nrmcmd</th>
                <th scope="col">Nmrgvs</th>
                <th scope="col">Nmrgvd</th>
                <th scope="col">Nrmrgvs</th>
                <th scope="col">Nrmrgvd</th>
                <th scope="col">Ccp</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $file = "config.xml";
                $xml= simplexml_load_file($file);
                // write to a xml file to display in all factors table
                $totalFactorsFile = "total_factors.xml";
                $totalFactorsXml= simplexml_load_file($totalFactorsFile);
                $totalFactorsXml->ccp = 0;
                file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());

                $wr = $xml->wr; 
                $wmcms = $xml->wmcms;
                $wmcmd = $xml->wmcmd;
                $wmcrms = $xml->wmcrms;
                $wmcrmd = $xml->wmcrmd;
                $wrmcrms = $xml->wrmcrms;
                $wrmcrmd = $xml->wrmcrmd;
                $wrmcms = $xml->wrmcms;
                $wrmcmd = $xml->wrmcmd;
                $wmrgvs = $xml->wmrgvs;
                $wmrgvd = $xml->wmrgvd;
                $wrmrgvs = $xml->wrmrgvs;
                $wrmrgvd = $xml->wrmrgvd;
                $ccp = 0;

                require_once('CouplingRules.php');
                $rules = new CouplingRules();

                for ($i=0; $i<count($codeLine); $i++) {
                    $nr = 0;
                    $nmcmd = 0;
                    $nmcms= 0;
                    $nmcrms= 0;
                    $nmcrmd= 0;
                    $nrmcrms= 0;
                    $nrmcrmd= 0;
                    $nrmcms= 0;
                    $nrmcmd= 0;
                    $nmrgvs= 0;
                    $nmrgvd= 0;
                    $nrmrgvs= 0;
                    $nrmrgvd= 0;

                    if (strpos($codeLine[$i], "//") === false && strpos($codeLine[$i], "/*") === false 
                        && strpos($codeLine[$i], "#") === false) {
                    
                        // $rules->displayArr();
                        $nr = $rules->findRecursiveMethods($codeLine[$i]);
                        $nmcms= $rules->findARegularMethodCall($codeLine[$i]);
                        $nmcmd = $wmcmd*0;
                        $nmcrms= $wmcrms*0;
                        $nmcrmd= $wmcrmd*0;
                        $nrmcrms= $wrmcrms*0;
                        $nrmcrmd= $wrmcrmd*0;
                        $nrmcms= $wrmcms*0;
                        $nrmcmd= $wrmcmd*0;
                        $nmrgvs= $rules->globalVariableCount($codeLine[$i]);
                        $nmrgvd= $wmrgvd*0;
                        $nrmrgvs= $wrmrgvs*0;
                        $nrmrgvd= $wrmrgvd*0;
                        $ccp = ($wr*$nr) + ($wmcms*$nmcms) + $nmcmd + $nmcrms + $nmcrmd + $nrmcrms + $nrmcrmd 
                            + $nrmcms + $nrmcmd + ($wmrgvs * $nmrgvs) + $nmrgvd + $nrmrgvs + $nrmrgvd;
                        $totalFactorsXml->ccp += $ccp;

                        echo "<tr>
                            <td>". ($i+1) ."</td>
                            <td><pre>".$codeLine[$i]."</pre></td>
                            <td>". ($nr) ."</td>
                            <td>". ($nmcms) ."</td>
                            <td>". ($nmcmd) ."</td>
                            <td>". ($nmcrms) ."</td>
                            <td>". ($nmcrmd) ."</td>
                            <td>". ($nrmcrms) ."</td>
                            <td>". ($nrmcrmd) ."</td>
                            <td>". ($nrmcms) ."</td>
                            <td>". ($nrmcmd) ."</td>
                            <td>". ($nmrgvs) ."</td>
                            <td>". ($nmrgvd) ."</td>
                            <td>". ($nrmrgvs) ."</td>
                            <td>". ($nrmrgvd) ."</td>
                            <td>". ($ccp) ."</td>
                        </tr>";
                    }
                }
                file_put_contents($totalFactorsFile, $totalFactorsXml->asXML());
            ?>
        </tbody>
    </table>
</div>