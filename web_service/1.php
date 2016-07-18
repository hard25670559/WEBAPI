<?php
function insertPowerControlStatus(controlstatus){
    var url = "http://???/???.php";
    var data = {
        deviceip:  "10.10.100.254:81",
        powercontrolstatus:  controlstatus
    };

    $.jqueryAjax(url,data,function(jqXHR) {
        if($(jqXHR).find('Result').text() == "1"){
            console.log("insertPowerControlStatus OK!");
        }
    },function(textStatus){
        console.log("error %o",$(jqXHR));
    });
}



<?php
include("db.php");

if( isset($_POST['controlmode']) ) { $controlmode = $_POST['controlmode']; }
if( isset($_POST['curtainsswitchstatus']) ) { $curtainsswitchstatus = $_POST['curtainsswitchstatus']; }

//http://192.168.1.101:8080/iot/insertThresholddata.php?thr_temp=26.88&thr_humi=51&thr_illum=1100
	$insertSQL=

        "INSERT INTO  VALUES (NULL, '".$controlmode."', '".$curtainsswitchstatus."');";
		
	$xml=new SimpleXMLElement('<xml/>');
	$AjaxResult=$xml->addChild('AjaxResult');
	if(mysql_query($insertSQL)){
        $Result=$AjaxResult->addChild('Result',"1");
        $ReportXML=$AjaxResult->addChild('ReportXML');
    }else{
        $Result=$AjaxResult->addChild('Result',"0");
        $ReportXML=$AjaxResult->addChild('ReportXML',"Insert error");
    }

	header("Content-type: text/xml; charset=UTF-8");
	echo $xml->saveXML();
	
?>
/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/15
 * Time: 下午 04:41
 */