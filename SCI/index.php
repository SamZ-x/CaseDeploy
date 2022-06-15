<?php
    //check the $_GET parameter
    if(!empty($_GET['filename']))
    {
        $filename = basename($_GET['filename']);
        $filepath = 'Files/'.$filename;
        //check the filename and the file existence
        $if(!empty($filename) && file_exists($filepath))
        {
            //define headers before send file
            header("Cache-Control: public;  max-age=3600");                     //set cacha, hold for 1hour
            header("Content-Description: File Transfer");               
            header("Content-Disposition: attachment; filename = $filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary"); 

            readfile($filepath);
            exit;
        }
        //if filename error or no exist file, return error message
        {
            alert("Download Error! Please try later.");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serial Communication Terminal</title>
    <link rel="stylesheet" href="style_pj1.css">
</head>
<body class="homesite">
    <header class="head">
        <img src="images/UI/icon.ico" alt="icon" width="50px" height="50px">
        <h2 style="margin-left:15px">Serial Communication Terminal 2.0</h2>
    </header>
    <div class="flex-content">
        <div class="content">
            <aside class="leftbar">
                <div class = "sidesection">
                    <br>
                    <img src="images/UI/guide.png" alt="guide">
                    <strong style="margin-left: 5px">Guide</strong>
                    <nav>
                        <ul class="navlist">
                            <li><a class="buttonlink" href="">Introduction</a></li>
                            <li><a class="buttonlink" href="index.php?filename=win-sci.zip">Download</a></li>
                            <li><a class="buttonlink" href="https://github.com/SamZ-x/SCI_9S12.git">Github</a></li>
                            <li><a class="buttonlink" href="http://www.casedeploy.com">Home</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="mainsection">
                <!-- section 1 -->
                <h1 id = "introduction">Intoduction</h1>
                <p style="font-size:x-large">This application is a toolkit for data receive and storage via serial communication protocol.</p>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                <!-- section 2 -->
                <h1 id = "functions">Functions</h1>
                <ul>
                    <li>Receive raw data from serial port.</li>
                    <li>Save data locally in TXT format</li>
                    <li>Save data remotely in MySQL database</li>
                </ul>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                <!-- section 3 -->
                <h1 id = "ui">UI</h1>
                <!-- section 3.1 -->
                <h3 style="color:blue" id="mainUI">1. Main UI</h3>
                <div class=" descirption-horizontal">
                    <div>
                        <p style="font-size:large">Main UI contains several sections:<br> (from top to buttom)</p>
                        <ul>
                            <li><b>Menu Section: </b>functions/operations. </li>
                            <li><b>ComPort Control: </b>configure com port. </li>
                            <li><b>Functions Section: </b>function indicator. </li>
                            <li><b>Data Status: </b>indicate the data operation. </li>
                            <li><b>Data Control: </b>Mathcing Raw Data format to Database fields.</li>
                        </ul>
                    </div>
                    <div class="flex-item">
                        <img src="images/UI/UI_main.jpg" alt="UI_main">
                    </div>
                </div>
                <!-- section 3.2 -->
                <h3 style="color:blue" id="mysqlconfigUI">2. MySQL configure UI</h3>
                <div class="descirption-vertical">
                    <div class="flex-item">
                        <img src="images/UI/UI_mysqlconfig.jpg" alt="UI_MySQLconfig" >
                    </div>
                    <div>
                        <p><b style="color:red">Note:</b> To successfully establish MySQL database remote connection and correctly upload the raw data to cloud, it is important to correctly configure all the section above.<br></p> 
                        <ul>
                            <li><b>Login Section: </b>MySQL database info (Import/Export/Manual input). </li>
                            <li><b>Table and Fiels: </b>Select the target table and fiels for raw data upload.</li>
                            <li><b>Query Section: </b>Confirmation section of selected database table and fields. </li>
                        </ul>
                    </div>
                </div>
                <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                <!-- section 4 -->
                <h1 id="usage">Usage</h1>
                <table  class = "usagetable">
                    <thead>
                        <tr style="font-size:large; font-weight: bold;">
                            <td>Section</td>
                            <td>Describetion</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Comport Contorl</td>
                            <td>
                                <div class="descirption-horizontal">
                                    <div class="flex-content">
                                        <p>>> Select appropriate <b>Com port</b> and <b>Baud rate</b>.<br></p>
                                        <p>Default with:<br> { Parity:"none", Databits:"8", Stopbits:"one"}. </p>
                                    </div>
                                    <div class="flex-item">
                                        <img src="images/Usages/comcontrol_basic.jpg" alt="menu_file">
                                    </div>
                                </div>
                                <hr>
                                <div class="descirption-horizontal">
                                    <div class="flex-item">
                                        <img src="images/Usages/comcontrol_options.jpg" alt="menu_file">
                                    </div>
                                    <div>
                                        <p>>> Advanced setting:<br></p>
                                        <p>Click <b>More Option</b> to customize serial port setup.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Storage Contorl</td>
                            <td>
                                <div class="descirption-vertical">
                                    <div class="flex-item">
                                        <img src="images/Usages/filecontrol.jpg" alt="file_control" >
                                    </div>
                                    <div>
                                        <p>>> Data storage method: <strong>Save to TXT file</strong> or <strong>Save to MySQL.</strong></p>
                                        <p>>><span style="color:green; font-weight: bold"> Green light</span> on function section and check mark &#10003 indicate successfully setup.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Monitor Contorl</td>
                            <td>
                                <div class="descirption-horizontal">
                                    <div class="flex-item">
                                        <img src="images/UI/UI_monitor_data.jpg" alt="monitor_data" >
                                    </div>
                                    <div class="flex-item">
                                        <img src="images/UI/UI_monitor_config.jpg" alt="monitor_config">
                                    </div>
                                </div>
                                <div class="descirption-vertical">
                                    <div>
                                        <p>>><b> Data Monitor: </b> Display the lastest received data and the last 20 records. <br></p>
                                        <p>>><b> Configure Monitor: </b> Display the current Configuration of Com port and Output setting.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>MySQL Contorl</td>
                            <td>
                                <div class="descirption-horizontal">
                                    <div>
                                        <p>>> Choose to <b>Import/Export</b> databse configuration.<br></p>
                                        <p>Specific Format required, see below.</p>
                                    </div>
                                    <div  class="flex-item">
                                        <img src="images/Usages/5.Usage_db_file.jpg" alt="menu_file" >
                                    </div>
    
                                </div>
                                <hr>
                                <div class="descirption-horizontal">
                                    <div class="flex-item">
                                        <img src="images/Usages/6.Usage_dbinfo.jpg" alt="menu_file">
                                    </div>                                
                                    <div>
                                        <p>>> All information Required. <b>Submit</b> to test the connection.<br></p>
                                        <p>>> <b>Import file Format:</b><br></p>
                                        <p>
                                            Server:111.111.111.111<br>
                                            Username:username<br>
                                            Password:password<br>
                                            Port:3306<br>
                                            Database:database<br>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="descirption-horizontal">                                
                                    <div>
                                        <p>>> To show the <b>data fields</b>, select the <b>Target table</b>.<br></p>
                                        <p>>> Generate the database operation query base on the selected table and fields for last confirmation.<br></p>
                                        <p>>> <b style="color:red;">Note:</b> Selected fields <b style="color:red;">must be matched</b> raw data format,<br>
                                             in order to correctly upload to corresponding fields.<br></p>
                                        <p>>> See data format contorl below.</p>
                                    </div>
                                    <div class="flex-item">
                                        <img src="images/Usages/7.Usage_db_fields.jpg" alt="mysql_db_fields">
                                    </div>
                                </div>
                                <hr>
                                <div class="descirption-horizontal">  
                                    <div class="flex-item">
                                        <img src="images/Usages/8.Usage_db_finish.jpg" alt="mysql_db_query">    
                                    </div>    
                                    <div>
                                        <p>>> Last <b>Confirm</b> of the database table and fiels. </p>
                                        <p>>> <b>"Finish"</b> to save MySQL database setting</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Format Contorl</td>
                            <td>
                                <div class="descirption-horizontal">
                                    <div class="flex-item">
                                        <img src="images/Usages/9.Usage_datacontrol.jpg" alt="data_control" >  
                                    </div>  
                                    <div>
                                        <p>>> Select the correct <b>Data Separator</b> to split the raw data to match the selected fields.</p>
                                        <p>>> <b style="color:red;">Note:</b> input raw data should contain <span style="text-decoration:underline">selected separator</span> 
                                            and end with <span style="text-decoration:underline">line feed.</span></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>RUN/PAUSE Contorl</td>
                            <td>
                                <div class="descirption-vertical">
                                    <div class="flex-item">
                                        <img src="images/Usages/runpause.jpg" alt="runpause_control" >
                                    </div>  
                                    <div>
                                        <p>>> Use the [start/pause] button to start or stop <b>data operation</b> (save/upload).</p>
                                        <P>>> <span style="color:green; font-weight: bold">Green lights</span> on Data Status section indicate corresponding operation runing.</P>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- section 5 -->
                <h1 id="resource">Resource</h1>
                <div class = "resource">
                    <a href="https://github.com/SamZ-x/SCI_9S12.git">Github Repository</a>
                </div>
            </div>
            <aside class="rightbar">
                <div class = "sidesection">
                    <br>
                    <strong>On this page</strong>
                    <hr>
                    <nav>
                        <ul class="navlist">
                            <li><a href="#introduction">introduction</a></li>
                            <li><a href="#functions">Functions</a></li>
                            <li><a href="#ui">UI</a></li>
                            <ul class="navlist">
                                <li><a href="#mainUI">Main UI</a></li>
                                <li><a href="#mysqlconfigUI">MySQL configure UI</a></li>
                            </ul>
                            <li><a href="#usage">Usage</a></li>
                            <li><a href="#resource">Resource</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>
        </div>
    </div>

    <div class="footer">
        <footer>
            &#174; Xiaobin Zhu <br>
            <script>document.write('Last Modified: '+document.lastModified);</script>
        </footer>
    </div>
    
</body>
</html>