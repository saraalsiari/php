<?php include("includes/header.php"); ?>
<div class="container">
    <form action="edit.php" method="post">
        <div class="row">
            <div class="col-11">
                <button onClick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
            </div>
            <div class="col-1">
                <input type="submit" value="Save" name="submit" class="btn btn-success" />
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Coupling Type</th>
                    <th scope="col">Weight</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        // $wr = 2;
                        // $wmcmd= 3;
                        // $wmcrms= 3;
                        // $wmcrmd= 4;
                        // $wrmcrms= 4;
                        // $wrmcrmd= 5;
                        // $wrmcms= 3;
                        // $wrmcmd= 4;
                        // $wmrgvs= 1;
                        // $wmrgvd= 2;
                        // $wrmrgvs= 1;
                        // $wrmrgvd= 2;

                        $file = "config.xml";
                        $xml= simplexml_load_file($file);
                        if(isset($_POST)) {
                            // unset($xml->config);
                            if(isset($_POST['wr'])) {
                                // setcookie("wr", $_POST['wr']);
                                $xml->wr = $_POST['wr'];
                            } 
                            if(isset($_POST['wmcms'])) {
                                // setcookie("wmcms", $_POST['wmcms']);
                                $xml->wmcms = $_POST['wmcms'];
                            } 
                            if(isset($_POST['wmcmd'])) {
                                // setcookie("wmcmd", $_POST['wmcmd']);
                                $xml->wmcmd = $_POST['wmcmd'];
                            } 
                            if(isset($_POST['wmcrms'])) {
                                // setcookie("wmcrms", $_POST['wmcrms']);
                                $xml->wmcrms = $_POST['wmcrms'];
                            } 
                            if(isset($_POST['wmcrmd'])) {
                                // setcookie("wmcrmd", $_POST['wmcrmd']);
                                $xml->wmcrmd = $_POST['wmcrmd'];
                            } 
                            if(isset($_POST['wrmcrms'])) {
                                // setcookie("wrmcrms", $_POST['wrmcrms']);
                                $xml->wrmcrms = $_POST['wrmcrms'];
                            } 
                            if(isset($_POST['wrmcrmd'])) {
                                // setcookie("wrmcrmd", $_POST['wrmcrmd']);
                                $xml->wrmcrmd = $_POST['wrmcrmd'];
                            } 
                            if(isset($_POST['wrmcms'])) {
                                // setcookie("wrmcms", $_POST['wrmcms']);
                                $xml->wrmcms = $_POST['wrmcms'];
                            } 
                            if(isset($_POST['wrmcmd'])) {
                                // setcookie("wrmcmd", $_POST['wrmcmd']);
                                $xml->wrmcmd = $_POST['wrmcmd'];
                            } 
                            if(isset($_POST['wmrgvs'])) {
                                // setcookie("wmrgvs", $_POST['wmrgvs']);
                                $xml->wmrgvs = $_POST['wmrgvs'];
                            } 
                            if(isset($_POST['wmrgvd'])) {
                                // setcookie("wmrgvd", $_POST['wmrgvd']);
                                $xml->wmrgvd = $_POST['wmrgvd'];
                            } 
                            if(isset($_POST['wrmrgvs'])) {
                                // setcookie("wrmrgvs", $_POST['wrmrgvs']);
                                $xml->wrmrgvs = $_POST['wrmrgvs'];
                            } 
                            if(isset($_POST['wrmrgvd'])) {
                                // setcookie("wrmrgvd", $_POST['wrmrgvd']);
                                $xml->wrmrgvd = $_POST['wrmrgvd'];
                            }
                            file_put_contents($file, $xml->asXML());
                        }

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

                        echo "<tr>
                            <td>A recursivecall (Refer to Ex1in fig. 1)</td>
                            <td><input type='text' value=". $wr ."  name='wr' /></td>
                        </tr>
                        <tr>
                            <td>A regular method calling another regular method in the same file</td>
                            <td><input type='text' value=". $wmcms ."  name='wmcms' /></td>
                        </tr>
                        <tr>
                            <td>A regular method calling another regular method in a different file</td>
                            <td><input type='text' value=". $wmcmd ."  name='wmcmd' /></td>
                        </tr>
                        <tr>
                            <td>A regular method calling another regular method in a different file</td>
                            <td><input type='text' value=". $wmcrms ." name='wmcrms' /></td>
                        </tr>
                        <tr>
                            <td>A regular method calling a recursive method in the same file (Refer to Ex4 in fig. 1)</td>
                            <td><input type='text' value=". $wmcrmd ." name='wmcrmd' /></td>
                        </tr>
                        <tr>
                            <td>A regular method calling a recursive method in a different file</td>
                            <td><input type='text' value=". $wrmcrms ." name='wrmcrms' /></td>
                        </tr>
                        <tr>
                            <td>A regular method calling a recursive method in the same file (Refer to Ex4 in fig. 1)</td>
                            <td><input type='text' value=". $wrmcrmd ." name='wrmcrmd' /></td>
                        </tr>
                        <tr>
                            <td>A recursive method calling another recursive method in the same file (Refer to Ex2 in fig. 1)</td>
                            <td><input type='text' value=". $wrmcms ." name='wrmcms' /></td>
                        </tr>
                        <tr>
                            <td>A recursive method calling another recursive method in a different file</td>
                            <td><input type='text' value=". $wrmcmd ." name='wrmcmd' /></td>
                        </tr>
                        <tr>
                            <td>A recursive method calling a  regular method in the same file</td>
                            <td><input type='text' value=". $wmrgvs ." name='wmrgvs' /></td>
                        </tr>
                        <tr>
                            <td>A recursive method calling a  regular method in a different file</td>
                            <td><input type='text' value=". $wmrgvd ." name='wmrgvd' /></td>
                        </tr>
                        <tr>
                            <td>A regular method referencing a global variable in the same file (Refer to Ex3 in fig. 1)</td>
                            <td><input type='text' value=". $wrmrgvs ." name='wrmrgvs' /></td>
                        </tr>
                        <tr>
                            <td>A regular method referencing a global variable in a different file</td>
                            <td><input type='text' value=". $wrmrgvd ." name='wrmrgvd' /></td>
                        </tr>";
                ?>
            </tbody>
        </table>

        <!--controlstructure-->
        <div class="row">
            <div class="col-11">
                <button onClick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
            </div>
            <div class="col-1">
                <input type="submit" value="Save" name="submit" class="btn btn-success" />
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Control Structure Type</th>
                    <th scope="col">Weight</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        // $ie = 2;
                        // $fw= 3;
                        // $sw= 2;
                        // $ca 1;
                        

                        $file = "configcontrol.xml";
                        $xml= simplexml_load_file($file);
                        if(isset($_POST)) {
                            // unset($xml->config);
                            if(isset($_POST['ie'])) {
                                // setcookie("ie", $_POST['ie']);
                                $xml->ie = $_POST['ie'];
                            } 
                            if(isset($_POST['fw'])) {
                                // setcookie("fw", $_POST['fw']);
                                $xml->fw = $_POST['fw'];
                            } 
                            if(isset($_POST['sw'])) {
                                // setcookie("sw", $_POST['sw']);
                                $xml->sw = $_POST['sw'];
                            } 
                            if(isset($_POST['ca'])) {
                                // setcookie("ca", $_POST['ca']);
                                $xml->ca = $_POST['ca'];
                            } 
                            
                            file_put_contents($file, $xml->asXML());
                        }

                        $ie = $xml->ie; 
                        $fw = $xml->fw;
                        $sw = $xml->sw;
                        $ca = $xml->ca;
                       

                        echo "<tr>
                            <td> A conditional control structure such as an ‘if’ or ‘else-if’ condition </td>
                            <td><input type='text' value=". $ie ." name='ie' /></td>
                        </tr>
                        <tr>
                            <td>An iterative control structure such as a ‘for’, ‘while’, or ‘do-while’ loop</td>
                            <td><input type='text' value=". $fw ."  name='fw' /></td>
                        </tr>
                        <tr>
                            <td>The ‘switch’ statement in a ‘switch-case’ control structure</td>
                            <td><input type='text' value=". $sw ."  name='sw' /></td>
                        </tr>
                        <tr>
                            <td>Each ‘case’ statement in a ‘switch-case’ control structure </td>
                            <td><input type='text' value=". $ca ." name='ca' /></td>
                        </tr>";
                 
                ?>
            </tbody>
        </table>

    </form>
</div>
<!--- size weight code--->


<div class="container">
    <form action="edit.php" method="post">
        <div class="row">
            <div class="col-11">
                <button onClick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
            </div>
            <div class="col-1">
                <input type="submit" value="Save" name="submit" class="btn btn-success" />
            </div>
        </div>
        <br>
        <h2>Weights related to the size factor</h2>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Program Component </th>
                <th scope="col">Weight</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // $wr = 2;
            // $wmcmd= 3;
            // $wmcrms= 3;
            // $wmcrmd= 4;
            // $wrmcrms= 4;
            // $wrmcrmd= 5;
            // $wrmcms= 3;
            // $wrmcmd= 4;
            // $wmrgvs= 1;
            // $wmrgvd= 2;
            // $wrmrgvs= 1;
            // $wrmrgvd= 2;

            $file = "config1.xml";
            $xml= simplexml_load_file($file);
            if(isset($_POST)) {
                // unset($xml->config);
                if(isset($_POST['wkw'])) {
                    // setcookie("wkw", $_POST['wkw']);
                    $xml->wkw = $_POST['wkw'];
                }
                if(isset($_POST['wid'])) {
                    // setcookie("wid", $_POST['wid']);
                    $xml->wid = $_POST['wid'];
                }
                if(isset($_POST['wop'])) {
                    // setcookie("wop", $_POST['wop']);
                    $xml->wop = $_POST['wop'];
                }
                if(isset($_POST['wnv'])) {
                    // setcookie("wnv", $_POST['wnv']);
                    $xml->wnv = $_POST['wnv'];
                }
                if(isset($_POST['wsl'])) {
                    // setcookie("wsl", $_POST['wsl']);
                    $xml->wsl = $_POST['wsl'];
                }

                file_put_contents($file, $xml->asXML());
            }

            $wkw = $xml->wkw;
            $wid = $xml->wid;
            $wop = $xml->wop;
            $wnv = $xml->wnv;
            $wsl = $xml->wsl;


            echo "<tr>
                            <td>Keyword</td>
                            <td><input type='text' value=". $wkw ."  name='wkw' /></td>
                        </tr>
                        <tr>
                            <td>Identifier</td>
                            <td><input type='text' value=". $wid ."  name='wid' /></td>
                        </tr>
                        <tr>
                            <td>Operator</td>
                            <td><input type='text' value=". $wop ."  name='wop' /></td>
                        </tr>
                        <tr>
                            <td>Numerical value</td>
                            <td><input type='text' value=". $wnv ." name='wnv' /></td>
                        </tr>
                        <tr>
                            <td>String literal </td>
                            <td><input type='text' value=". $wsl ." name='wsl' /></td>
                        </tr>
                       ";
            ?>
            </tbody>
        </table>
    </form>
</div>




<!--- variable weight code--->


<div class="container">
    <form action="edit.php" method="post">
        <div class="row">
            <div class="col-11">
                <button onClick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
            </div>
            <div class="col-1">
                <input type="submit" value="Save" name="submit" class="btn btn-success" />
            </div>
        </div>
        <br>
        <h2>Weights related to the variable factor</h2>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Program Component </th>
                <th scope="col">Weight</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // $wr = 2;
            // $wmcmd= 3;
            // $wmcrms= 3;
            // $wmcrmd= 4;
            // $wrmcrms= 4;
            // $wrmcrmd= 5;
            // $wrmcms= 3;
            // $wrmcmd= 4;
            // $wmrgvs= 1;
            // $wmrgvd= 2;
            // $wrmrgvs= 1;
            // $wrmrgvd= 2;

            $file = "config2.xml";
            $xml= simplexml_load_file($file);
            if(isset($_POST)) {
                // unset($xml->config);
                if(isset($_POST['wgv'])) {
                    // setcookie("wgv", $_POST['wgv']);
                    $xml->wgv = $_POST['wgv'];
                }
                if(isset($_POST['wlv'])) {
                    // setcookie("wlv", $_POST['wlv']);
                    $xml->wlv = $_POST['wlv'];
                }
                if(isset($_POST['wpdtv'])) {
                    // setcookie("wpdtv", $_POST['wpdtv']);
                    $xml->wpdtv = $_POST['wpdtv'];
                }
                if(isset($_POST['wcdtv'])) {
                    // setcookie("wcdtv", $_POST['wcdtv']);
                    $xml->wcdtv = $_POST['wcdtv'];
                }


                file_put_contents($file, $xml->asXML());
            }

            $wgv = $xml->wgv;
            $wlv = $xml->wlv;
            $wpdtv = $xml->wpdtv;
            $wcdtv = $xml->wcdtv;


            echo "<tr>
                            <td>Global variable</td>
                            <td><input type='text' value=". $wgv ."  name='wgv' /></td>
                        </tr>
                        <tr>
                            <td>Local variable</td>
                            <td><input type='text' value=". $wlv ."  name='wlv' /></td>
                        </tr>
                        <tr>
                            <td>Primitive data type variable</td>
                            <td><input type='text' value=". $wpdtv ."  name='wpdtv' /></td>
                        </tr>
                        <tr>
                            <td>Composite data type variable</td>
                            <td><input type='text' value=". $wcdtv ." name='wcdtv' /></td>
                        </tr>
                       
                       ";
            ?>
            </tbody>
        </table>
    </form>
</div>

<!--- method weight code--->


<div class="container">
    <form action="edit.php" method="post">
        <div class="row">
            <div class="col-11">
                <button onClick="window.history.go(-1); return false;" class="btn btn-primary">Go Back</button>
            </div>
            <div class="col-1">
                <input type="submit" value="Save" name="submit" class="btn btn-success" />
            </div>
        </div>
        <br>
        <h2>Weights related to the method factor</h2>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Program Component </th>
                <th scope="col">Weight</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // $wr = 2;
            // $wmcmd= 3;
            // $wmcrms= 3;
            // $wmcrmd= 4;
            // $wrmcrms= 4;
            // $wrmcrmd= 5;
            // $wrmcms= 3;
            // $wrmcmd= 4;
            // $wmrgvs= 1;
            // $wmrgvd= 2;
            // $wrmrgvs= 1;
            // $wrmrgvd= 2;

            $file = "config3.xml";
            $xml= simplexml_load_file($file);
            if(isset($_POST)) {
                // unset($xml->config);
                if(isset($_POST['wprt'])) {
                    // setcookie("wprt", $_POST['wprt']);
                    $xml->wprt = $_POST['wprt'];
                }
                if(isset($_POST['wcrt'])) {
                    // setcookie("wcrt", $_POST['wcrt']);
                    $xml->wcrt = $_POST['wcrt'];
                }
                if(isset($_POST['wmvrt'])) {
                    // setcookie("wmvrt", $_POST['wmvrt']);
                    $xml->wmvrt = $_POST['wmvrt'];
                }
                if(isset($_POST['wpdtp'])) {
                    // setcookie("wpdtp", $_POST['wpdtp']);
                    $xml->wpdtp = $_POST['wpdtp'];
                }
                if(isset($_POST['wcdtp'])) {
                    // setcookie("wcdtp", $_POST['wcdtp']);
                    $xml->wcdtp = $_POST['wcdtp'];
                }





                file_put_contents($file, $xml->asXML());
            }

            $wprt = $xml->wprt;
            $wcrt = $xml->wcrt;
            $wmvrt = $xml->wmvrt;
            $wpdtp = $xml->wpdtp;
            $wcdtp = $xml->wcdtp;


            echo "<tr>
                            <td>Method with a primitive return type </td>
                            <td><input type='text' value=". $wprt ."  name='wprt' /></td>
                        </tr>
                        <tr>
                            <td>Method with a composite return type</td>
                            <td><input type='text' value=". $wcrt ."  name='wcrt' /></td>
                        </tr>
                        <tr>
                            <td>Method with a void return type</td>
                            <td><input type='text' value=". $wmvrt ."  name='wmvrt' /></td>
                        </tr>
                        <tr>
                            <td>Primitive data type parameter</td>
                            <td><input type='text' value=". $wpdtp ." name='wpdtp' /></td>
                        </tr>
                        <tr>
                            <td>Composite data type parameter </td>
                            <td><input type='text' value=". $wcdtp ." name='wcdtp' /></td>
                        </tr>
                       ";
            ?>
            </tbody>
        </table>
    </form>
</div>
<?php include("includes/footer.php"); ?>

<!-- <tr>
    <td>A recursive method referencing a global variable in the same file</td>
    <td><input type='text' value='wr' name='wr' /></td>
</tr>
<tr>
    <td>A recursive method referencing a global variable in a different file</td>
    <td><input type='text' value='wr' name='wr' /></td>
</tr> -->