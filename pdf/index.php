<?php require_once("../class/config.inc.php"); ?>
<?php include('../includes/common_functions.php'); ?>
<?php require_once("../class/class.api.php"); 
$api_obj=new api();
$api_data=$api_obj->get_course_by_courseid($_REQUEST['id']);
?>
<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
    require_once('html2pdf.class.php');

    // get the HTML
     ob_start();
	 ?>
	   <style type="text/css">
table
{
    width:  100%;
}

th
{
    text-align: center;
   }

td
{
    text-align: left;
   
}

td.col1
{
   
    text-align: right;
}


</style>

	 <img src="http://www.itstraining.in/images/logo_new.jpg" width="100px" />
	 <h3 style="color:#20548E"><?php echo $api_data['name']; ?></h3>
	 <hr/>
	 <hr/>
	 <h3>Brief</h3>
							<?php echo $api_data['brief']; ?>
							<hr/>
							<h3>Content</h3>
							<?php echo $api_data['content']; ?>
							<hr/>
							<h3>Certification</h3>
							<?php echo $api_data['cert']; ?>
							
	 <?php
	 
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');

        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');

        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        // add the automatic index
        //$html2pdf->createIndex('Sommaire', 30, 12, false, true, 2);

        // send the PDF
        $html2pdf->Output($api_data['name'].'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
