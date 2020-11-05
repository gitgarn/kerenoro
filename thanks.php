<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>השארו איתנו בקשר</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">
    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
    <script type="text/javascript">     
        function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
</script>
</head>

<body>


</body>
</html>

<?php 

function form() {
echo <<<EOL

<div id="theModal" class="form-group">
  <form action="thanks.php" method="post">
  <label for="num">מספר הטלפון שלך:</label>
  <input type="text" class="form-control" name="number" maxlength="10" onkeypress="return isNumber(event)">
  <input type="submit" class="form-control btn btn-primary" value="שלח">
  </form>
  מייד תועבר לביט
</div>
EOL;

}

function contact() {

echo <<<EOL

    <section class="">
        <div class="container mobileHidden" id="services">
                                        <h2 class="section-header">תשלום בביט</h2>

            <div class="row">

                <div class="col-xs-6">
                    
                    <a href="images/oro.vcf">(ניתן ללחוץ על הברקוד על מנת להוריד את איש הקשר)<img style="margin-right: unset;" class="img-rounded img-responsive center-block" src="images/contact.png" alt="add contact"></a>
                </div>
                <div class="col-xs-1"></div>
                <div class="col-xs-5">
                <p class="lead text-muted">
                    הוסף איש קשר<br />
                   <a href="tel:0525780335">052-57-80-335  </a><a href="tel:0525780335" class="btn btn-success"><span class="glyphicon glyphicon-phone"></span></a><br />
                </p>
                <a href="https://www.bitpay.co.il/app" class="btn btn-info btn-lg">מעבר לביט</a>
                </div>


    </div>
    </div>
    </section>

EOL;


}

//filter numbers only
$number = (int) filter_var($_POST["number"], FILTER_SANITIZE_NUMBER_INT);
$myfile = fopen("numbers.txt", "a+") or die("Unable to open file!");

if(strlen($_POST["number"]) > 5){

        fwrite($myfile, $number.",".date("Y/m/d")."\r\n");
        echo '<div class="alert alert-success">  <strong>תודה! </strong> המספר '.$number.' נוסף למערכת :).</div>';
        contact();

}else{
    form();
}

fclose($myfile);



?>