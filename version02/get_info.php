<?php
// need to turn on sessions, because the ISP has auto_start disabled.
session_start();

// send e-mail and set flag in session
if (isFormReady()) {
  $_SESSION['authorized'] = 'true';
  sendEmail();
}

// re-direct authorized users (both user that submit a form during the current request,
// and who have previously in the session submitted the form.
if (($_SESSION['authorized'] == 'true')) {
  redirect2PDF();
}

// submit the form info as an e-mail
function sendEmail() {
  // contact information
  $msgBody = 'Name: ' . $_POST['name'] . "\n"
  	. 'Title: ' . $_POST['title'] . "\n"
  	. 'Company: ' . $_POST['company'] . "\n"
  	. 'Address1: ' . $_POST['address1'] . "\n"
  	. 'Address2: ' . $_POST['address2'] . "\n"
  	. 'City: ' . $_POST['city'] . "\n"
  	. 'Country: ' . $_POST['country'] . "\n"
  	. 'Postal Code: ' . $_POST['postalcode'] . "\n"
  	. 'Phone Number: ' . $_POST['telephone'] . "\n"
  	. 'Fax: ' . $_POST['fax'] . "\n"
  	. 'E-mail: ' . $_POST['email'] . "\n"
  	. "\n";
  	
  // interested in services 
  $msgBody = $msgBody . 'Interested in the following services: ';
  if ($_POST['sterivent']) {
  	$msgBody = $msgBody . 'SteriVent, ';
  }
  if ($_POST['ultraclean']) {
  	$msgBody = $msgBody . 'Ultra Clean, ';
  }
  if ($_POST['consulting']) {
  	$msgBody = $msgBody . 'Consulting, ';
  }
  if ($_POST['planning']) {
  	$msgBody = $msgBody . 'Planning, ';
  }
  if ($_POST['design']) {
  	$msgBody = $msgBody . 'Design, ';
  }
  if ($_POST['equipmentspecifications']) {
  	$msgBody = $msgBody . 'Equipment specifications, ';
  }
  if ($_POST['equipmentpurchasing']) {
  	$msgBody = $msgBody . 'Equipment purchasing services, ';
  }
  if ($_POST['construction']) {
  	$msgBody = $msgBody . 'Construction of new facility, ';
  }
  if ($_POST['cip']) {
  	$msgBody = $msgBody . 'CIP, ';
  }
  if ($_POST['turnkey']) {
  	$msgBody = $msgBody . 'Turnkey systems, ';
  }
  if ($_POST['retrofitting']) {
  	$msgBody = $msgBody . 'Retrofitting existing facility ';
  }
  $msgBody = $msgBody . "\n\n";
  
  // interested in product
  $msgBody = $msgBody . 'Interested in the following products: ';
  if ($_POST['dairy']) {
  	$msgBody = $msgBody . 'Dairy, ';
  }
  if ($_POST['freshmilk']) {
  	$msgBody = $msgBody . 'Fresh milk, ';
  }
  if ($_POST['cream']) {
  	$msgBody = $msgBody . 'Cream, ';
  }
  if ($_POST['yogurt']) {
  	$msgBody = $msgBody . 'Yogurt, ';
  }
  if ($_POST['cheese']) {
  	$msgBody = $msgBody . 'Cheese ';
  }
  if ($_POST['sourcream']) {
  	$msgBody = $msgBody . 'Sour cream, ';
  }
  if ($_POST['cottagecheese']) {
  	$msgBody = $msgBody . 'Cottage cheese, ';
  }
  if ($_POST['dairyother']) {
  	$msgBody = $msgBody . 'other dairy: ' . $_POST['dairyother'] . ', ';
  }
  if ($_POST['eggs']) {
  	$msgBody = $msgBody . 'Eggs, ';
  }
  if ($_POST['wholeeggs']) {
  	$msgBody = $msgBody . 'Whole Eggs, ';
  }
  if ($_POST['eggwhites']) {
  	$msgBody = $msgBody . 'Egg Whites, ';
  }
  if ($_POST['eggyolks']) {
  	$msgBody = $msgBody . 'Egg Yolks, ';
  }
  if ($_POST['eggsother']) {
  	$msgBody = $msgBody . 'other eggs: ' . $_POST['eggsother'] . ', ';
  }
  if ($_POST['beverages']) {
  	$msgBody = $msgBody . 'Beverages, ';
  }
  if ($_POST['mineralwater']) {
  	$msgBody = $msgBody . 'Mineral Water, ';
  }
  if ($_POST['freshjuice']) {
  	$msgBody = $msgBody . 'Fresh Juice, ';
  }
  if ($_POST['Pasteurizedjuice']) {
  	$msgBody = $msgBody . 'Pasteurized Juice, ';
  }
  if ($_POST['beveragesother']) {
  	$msgBody = $msgBody . 'other beverages: ' . $_POST['beveragesother'] . ', ';
  }
  if ($_POST['brewery']) {
  	$msgBody = $msgBody . 'Brewery (beer),  ';
  }
  if ($_POST['soy']) {
  	$msgBody = $msgBody . 'Soy, ';
  }
  if ($_POST['soymilk']) {
  	$msgBody = $msgBody . 'Soy Milk, ';
  }
  if ($_POST['tofu']) {
  	$msgBody = $msgBody . 'Tofu, ';
  }
  if ($_POST['soypudding']) {
  	$msgBody = $msgBody . 'Soy Pudding, ';
  }
  if ($_POST['soyyogurt']) {
  	$msgBody = $msgBody . 'Soy Yogurt, ';
  }
  if ($_POST['soyother']) {
  	$msgBody = $msgBody . 'soy other: ' . $_POST['soyother'] . ', ';
  }
  if ($_POST['condiments']) {
  	$msgBody = $msgBody . 'Condiments, ';
  }
  if ($_POST['mayonnaise']) {
  	$msgBody = $msgBody . 'Mayonnaise, ';
  }
  if ($_POST['ketchup']) {
  	$msgBody = $msgBody . 'Ketchup, ';
  }
  if ($_POST['condimentsother']) {
  	$msgBody = $msgBody . 'other condiments: ' . $_POST['condimentsother'] . ', ';
  }
  if ($_POST['condiments']) {
  	$msgBody = $msgBody . 'Jams and Jellies, ';
  }
  if ($_POST['marmalade']) {
  	$msgBody = $msgBody . 'Marmalade, ';
  }
  if ($_POST['fruitjellies']) {
  	$msgBody = $msgBody . 'Fruit Jellies, ';
  }
  if ($_POST['cosmetics']) {
  	$msgBody = $msgBody . 'Cosmetics, ';
  }
  if ($_POST['pharmaceuticals']) {
  	$msgBody = $msgBody . 'Pharmaceuticals, ';
  }
  if ($_POST['other']) {
  	$msgBody = $msgBody . 'other: ' . $_POST['other'];
  }
  if ($_POST['retrofitting']) {
  	$msgBody = $msgBody . 'Retrofitting existing facility ';
  }
  $msgBody = $msgBody . "\n\n";
  
  // free form information
  if ($_POST['select']) {
    $msgBody = $msgBody . 'I need to make this descion: ' . $_POST['select'] . "\n\n";
  }
  if ($_POST['details']) {
    $msgBody = $msgBody . "Additional Details:\n " . $_POST['details'];
  }
  	
  // send e-mail
  mail('friedrich@fischerplanning.com;tfischer@fischerbodywork.com'
    , 'A prospect submitted information on fischerplanning.com'
    , $msgBody);
}

// Check, if the user filled in the required fields.
function isFormReady() {
  return $_POST['name']
      && $_POST['address1']
      && $_POST['city']
      && $_POST['telephone']
      && $_POST['email'];
}

// Re-directs the user to the PDF that the user requested. The PDF's
// location is not disclosed, so that the user can't find a way around submitting
// the form information.
function redirect2PDF() {
  if ($_REQUEST['id'] == 1) {
    header("Location:" . "pdf/block_diagram.pdf");
  } else if ($_REQUEST['id'] == 2) {
    header("Location:" . "pdf/flow_diagram.pdf");
  } else if ($_REQUEST['id'] == 3) {
    header("Location:" . "pdf/layout_diagram.pdf");
  } else if ($_REQUEST['id'] == 4) {
    header("Location:" . "sample_diagrams.html");
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Fischer Planning - Expert Consulting for Food, Beverage and Pharmaceutical Processing. Liquid–based production systems & design." />
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
<title>Fischer Planning | Get Info</title>
<link href="fffischer.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

// Author: Thomas Fischer
// checks that the user has supplied the required fields, and provides a pop-up,
// if not.
function validateForm() {
  if (document.forms[0].name.value == '') {
  	alert("Please, enter your name in order to gain access to the sample diagrams.");
  	return false;
  } else if (document.forms[0].address1.value == '') {
  	alert("Please, enter your address in order to gain access to the sample diagrams.");
  	return false;
  } else if (document.forms[0].city.value == '') {
  	alert("Please, enter your city in order to gain access to the sample diagrams.");
  	return false;
  } else if (document.forms[0].telephone.value == '') {
  	alert("Please, enter your phone number in order to gain access to the sample diagrams.");
  	return false;
  } else if (document.forms[0].email.value == '') {
  	alert("Please, enter your e-mail address in order to gain access to the sample diagrams.");
  	return false;
  } else if (!isValidEmail(document.forms[0].email.value)) {
  	alert("Your e-mail address doesn't look like a valid e-mail address. Please, enter a valid e-mail address in order to gain access to the sample diagrams.");
  	return false;
  } else {
    return true;
  }
}

// Author Thomas Fischer
// Checks, if the e-mail address looks valid, using a regular expression.
function isValidEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/nav-products-on.gif','images/nav-services-on.gif','images/nav-about_us-on.gif','images/nav-products-bottom.gif','images/nav-about_us-bottom.gif','images/nav-services-bottom.gif')">
<div align="center">
  <table width="554" border="0" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
    <tr>
      <td width="550" height="60" align="center" valign="top"><a href="index.html"><img src="images/fischer_logo.gif" alt="Fischer Planning" width="194" height="60" border="0" /></a><img src="images/tagline.jpg" alt="Expert Consulting for Food, Beverage and Pharmaceutical Processing" width="356" height="60" /></td>
    </tr>
    <tr>
      <td width="550" height="150" align="center" valign="top" bgcolor="#0099C5"><img src="images/illo-get_info.jpg" alt="Get Info" width="550" height="150" /></td>
    </tr>
    <tr>
      <td width="550" height="20" align="center" valign="top"><a href="products.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('products','','images/nav-products-on.gif','navbottom','','images/nav-products-bottom.gif',1)"><img src="images/nav-products-off.gif" alt="Products" name="products" width="182" height="17" border="0" id="products" /></a><img src="images/nav-spacer.gif" /><a href="services.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('services','','images/nav-services-on.gif','navbottom','','images/nav-services-bottom.gif',1)"><img src="images/nav-services-off.gif" alt="Services" name="services" width="182" height="17" border="0" id="services" /></a><img src="images/nav-spacer.gif" /><a href="about_us.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('aboutus','','images/nav-about_us-on.gif','navbottom','','images/nav-about_us-bottom.gif',1)"><img src="images/nav-about_us-off.gif" alt="About Us" name="aboutus" width="182" height="17" border="0" id="aboutus" /></a><br />
      <img src="images/nav-bottom.gif" name="navbottom" width="550" height="3" id="navbottom" /></td>
    </tr>
    <tr>
      <td width="550" height="55" align="center" valign="top"><table width="510" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="510" height="20" align="left" valign="middle" class="nav"><img src="images/blank.gif" width="510" height="20" /></td>
        </tr>
        <tr>
          <td width="510" align="left" valign="top"><span class="headline">Get Info</span>
              <p>To discuss your current and future needs, please contact Fischer Planning using the form below, or you can email us at <a href="mailto:friedrich@fischerplanning.com">friedrich@fischerplanning.com</a> or call or fax us directly.<br />
              </p>
              <form action="" method="post" name="form1" class="getinfo" id="form1" onsubmit="return validateForm();">
              <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                <table width="510" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="170" height="40" align="left" valign="top">Name:<br />
                      <label>
                      <input name="name" type="text" class="getinfo" id="name" size="20" />
                    </label></td>
                    <td width="170" height="40" align="left" valign="top">Title:<br />
                      <label>
                      <input name="title" type="text" class="getinfo" id="title" size="20" />
                    </label></td>
                    <td width="170" height="40" align="left" valign="top">Company Name: <br />
                      <label>
                      <input name="company" type="text" class="getinfo" id="company" size="20" />
                    </label></td>
                  </tr>
                  <tr>
                    <td height="40" colspan="3" align="left" valign="top">Address:<br />
                        <label>
                        <input name="address1" type="text" class="getinfo" id="address1" size="75" />
                      </label></td>
                  </tr>
                  <tr>
                    <td width="0" height="40" colspan="3" align="left" valign="top">Address:<br />
                      <label>
                      <input name="address2" type="text" class="getinfo" id="address2" size="75" />
                    </label></td>
                  </tr>
                  <tr>
                    <td width="170" height="40" align="left" valign="top">City:<br />
                      <label>
                      <input name="city" type="text" class="getinfo" id="city" size="20" />
                    </label></td>
                    <td width="170" height="40" align="left" valign="top">Country:<br />
                      <label>
                      <input name="country" type="text" class="getinfo" id="country" size="20" />
                    </label></td>
                    <td width="170" height="40" align="left" valign="top">Postal Code: <br />
                      <label>
                      <input name="postalcode" type="text" class="getinfo" id="postalcode" size="20" />
                    </label></td>
                  </tr>
                  <tr>
                    <td width="170" height="40" align="left" valign="top">Telephone:<br />
                      <label>
                      <input name="telephone" type="text" class="getinfo" id="telephone" size="20" />
                    </label></td>
                    <td width="170" height="40" align="left" valign="top">Fax:<br />
                      <label>
                      <input name="fax" type="text" class="getinfo" id="fax" size="20" />
                    </label></td>
                    <td width="170" height="40" align="left" valign="top">Email:<br />
                      <label>
                      <input name="email" type="text" class="getinfo" id="email" size="20" />
                    </label></td>
                  </tr>
                </table>
                <span class="subhead"><br />
                <br />
                </span>
                <table width="510" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="170" align="left" valign="top"><span class="subhead">I am interested in:</span><br />
                      <span class="nav"> (check all that apply)</span></td>
                    <td width="170" align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle"><input name="sterivent" type="checkbox" class="getinfo" id="sterivent" value="SteriVent" /></td>
                        <td align="left" valign="middle">SteriVent</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle"><input name="ultraclean" type="checkbox" class="getinfo" id="ultraclean" value="Ultra Clean" /></td>
                        <td align="left" valign="middle">Ultra Clean </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="consulting" type="checkbox" class="getinfo" id="consulting" value="Consulting" /></td>
                        <td width="150" align="left" valign="middle">Consulting</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="planning" type="checkbox" class="getinfo" id="planning" value="Planning" /></td>
                        <td width="150" align="left" valign="middle">Planning</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="design" type="checkbox" class="getinfo" id="design" value="design" /></td>
                        <td width="150" align="left" valign="middle">Design</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="equipmentspecifications" type="checkbox" class="getinfo" id="equipmentspecifications" value="Equipment Specifications" /></td>
                        <td width="150" align="left" valign="middle">Equipment specifications</td>
                      </tr>
                    </table></td>
                    <td width="170" align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top"><input name="equipmentpurchasing" type="checkbox" class="getinfo" id="equipmentpurchasing" value="Equipment Purchasing" /></td>
                        <td align="left" valign="middle">Equipment purchasing services </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="construction" type="checkbox" class="getinfo" id="construction" value="Construction" /></td>
                        <td width="150" align="left" valign="top">Construction of new facility</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="retrofitting" type="checkbox" class="getinfo" id="retrofitting" value="Retrofitting" /></td>
                        <td width="150" align="left" valign="top">Retrofitting existing facility</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="cip" type="checkbox" class="getinfo" id="cip" value="CIP" /></td>
                        <td width="150" align="left" valign="middle">CIP</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="turnkey" type="checkbox" class="getinfo" id="turnkey" value="Turnkey" /></td>
                        <td width="150" align="left" valign="middle">Turnkey systems </td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table>
                <br />
                <br />
                <label></label>
                <table width="510" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="170" align="left" valign="top"><span class="subhead">For these products:</span><br />
                        <span class="nav"> (check all that apply)</span></td>
                    <td width="170" align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" align="left" valign="middle"><input name="dairy" type="checkbox" class="getinfo" id="dairy" value="Dairy" /></td>
                          <td width="150" align="left" valign="middle">Dairy</td>
                        </tr>

                    </table></td>
                    <td width="170" align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" align="left" valign="top"><input name="freshmilk" type="checkbox" class="getinfo" id="freshmilk" value="Fresh Milk" /></td>
                          <td width="150" align="left" valign="middle">Fresh milk</td>
                        </tr>
                        <tr>
                          <td width="20" align="left" valign="top"><input name="cream" type="checkbox" class="getinfo" id="cream" value="Cream" /></td>
                          <td width="150" align="left" valign="middle">Cream</td>
                        </tr>
                        <tr>
                          <td width="20" align="left" valign="top"><input name="yogurt" type="checkbox" class="getinfo" id="yogurt" value="Yogurt" /></td>
                          <td width="150" align="left" valign="middle">Yogurt</td>
                        </tr>
                        <tr>
                          <td width="20" align="left" valign="top"><input name="icecream" type="checkbox" class="getinfo" id="icecream" value="Ice Cream" /></td>
                          <td width="150" align="left" valign="middle">Ice cream</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><input name="cheese" type="checkbox" class="getinfo" id="cheese" value="Cheese" /></td>
                          <td align="left" valign="middle">Cheese</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><input name="sourcream" type="checkbox" class="getinfo" id="sourcream" value="Sour Cream" /></td>
                          <td align="left" valign="middle">Sour cream</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><input name="cottagecheese" type="checkbox" class="getinfo" id="cottagecheese" value="Cottage Cheese" /></td>
                          <td align="left" valign="middle">Cottage cheese</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="middle">Other<br />
                          <input name="dairyother" type="text" class="getinfo" id="dairyother" size="20" /></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="middle">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="eggs" type="checkbox" class="getinfo" id="eggs" value="Eggs" /></td>
                        <td width="150" align="left" valign="middle">Eggs</td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="top"><input name="wholeeggs" type="checkbox" class="getinfo" id="wholeeggs" value="Whole Eggs" /></td>
                        <td width="150" align="left" valign="middle">Whole Eggs </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="eggwhites" type="checkbox" class="getinfo" id="eggwhites" value="Egg Whites" /></td>
                        <td width="150" align="left" valign="middle">Egg Whites </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="eggyolks" type="checkbox" class="getinfo" id="eggyolks" value="Egg Yolks" /></td>
                        <td width="150" align="left" valign="middle">Egg Yolks </td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">Other<br />
                            <input name="eggsother" type="text" class="getinfo" id="eggsother" size="20" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="beverages" type="checkbox" class="getinfo" id="beverages" value="Beverages" /></td>
                        <td width="150" align="left" valign="middle">Beverages</td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="top"><input name="mineralwater" type="checkbox" class="getinfo" id="mineralwater" value="Mineral Water" /></td>
                        <td width="150" align="left" valign="middle">Mineral Water </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="freshjuice" type="checkbox" class="getinfo" id="freshjuice" value="Fresh Juice" /></td>
                        <td width="150" align="left" valign="middle">Fresh Juice </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="Pasteurizedjuice" type="checkbox" class="getinfo" id="Pasteurizedjuice" value="Pasteurized Juice" /></td>
                        <td width="150" align="left" valign="middle">Pasteurized Juice</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">Other<br />
                            <input name="beveragesother" type="text" class="getinfo" id="beveragesother" size="20" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="brewery" type="checkbox" class="getinfo" id="brewery" value="Brewery" /></td>
                        <td width="150" align="left" valign="middle">Brewery (beer) </td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="top">&nbsp;</td>
                        <td width="150" align="left" valign="middle">&nbsp;</td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="soy" type="checkbox" class="getinfo" id="soy" value="Soy" /></td>
                        <td width="150" align="left" valign="middle">Soy </td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="top"><input name="soymilk" type="checkbox" class="getinfo" id="soymilk" value="Soy Milk" /></td>
                        <td width="150" align="left" valign="middle">Soy Milk </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="tofu" type="checkbox" class="getinfo" id="tofu" value="Tofu" /></td>
                        <td width="150" align="left" valign="middle">Tofu</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="soypudding" type="checkbox" class="getinfo" id="soypudding" value="Soy Pudding" /></td>
                        <td width="150" align="left" valign="middle">Soy Pudding </td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="soyyogurt" type="checkbox" class="getinfo" id="soyyogurt" value="Soy Yogurt" /></td>
                        <td width="150" align="left" valign="middle">Soy Yogurt </td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">Other<br />
                            <input name="soyother" type="text" class="getinfo" id="soyother" size="20" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="condiments" type="checkbox" class="getinfo" id="condiments" value="Condiments" /></td>
                        <td width="150" align="left" valign="middle">Condiments </td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="top"><input name="mayonnaise" type="checkbox" class="getinfo" id="mayonnaise" value="Mayonnaise" /></td>
                        <td width="150" align="left" valign="middle">Mayonnaise</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="ketchup" type="checkbox" class="getinfo" id="ketchup" value="Ketchup" /></td>
                        <td width="150" align="left" valign="middle">Ketchup</td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">Other<br />
                            <input name="condimentsother" type="text" class="getinfo" id="condimentsother" size="20" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="middle"><input name="condiments2" type="checkbox" class="getinfo" id="condiments2" value="Condiments" /></td>
                        <td width="150" align="left" valign="middle">Jams and Jellies  </td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" align="left" valign="top"><input name="marmalade" type="checkbox" class="getinfo" id="marmalade" value="marmalade" /></td>
                        <td width="150" align="left" valign="middle">Marmalade</td>
                      </tr>
                      <tr>
                        <td width="20" align="left" valign="top"><input name="fruitjellies" type="checkbox" class="getinfo" id="fruitjellies" value="Fruit Jellies" /></td>
                        <td width="150" align="left" valign="middle">Fruit Jellies </td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" align="left" valign="middle"><input name="cosmetics" type="checkbox" class="getinfo" id="cosmetics" value="Cosmetics" /></td>
                          <td width="150" align="left" valign="middle">Cosmetics</td>
                        </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" align="left" valign="top">&nbsp;</td>
                          <td width="150" align="left" valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="middle">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" align="left" valign="middle"><input name="pharmaceuticals" type="checkbox" class="getinfo" id="pharmaceuticals" value="Pharmaceuticals" /></td>
                          <td width="150" align="left" valign="middle">Pharmaceuticals</td>
                        </tr>
                    </table></td>
                    <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" align="left" valign="top">&nbsp;</td>
                          <td width="150" align="left" valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="middle">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td colspan="2" align="left" valign="top"><table width="339" border="0" cellspacing="0" cellpadding="0">

                      <tr>
                        <td width="20" align="left" valign="top">&nbsp;</td>
                        <td width="319" align="left" valign="middle">Other<br />
                            <input name="other" type="text" class="getinfo" id="other" size="50" /></td>
                      </tr>

                    </table></td>
                  </tr>
                </table>
                <br />
                <br />
                <p><span class="subhead">I need to make this decision:</span><br />
                  <select name="select" class="getinfo">
                    <option selected="selected"> </option>
                    <option>Immediately</option>
                    <option>Within 1 month</option>
                    <option>Within 6 months</option>
                    <option>In 1 year or longer</option>
                  </select>
                </p>
                <p><span class="subhead">Please provide any details so that we may assist you better.</span><br />
                  <textarea name="details" cols="50" rows="3" id="details"></textarea>
                </p>
                <p>
                  <input type="image" src="images/submit.gif" border="0" alt="Submit" name="Submit" value="Submit" />
                </p>
              </form>
            </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="550" height="55" align="center" valign="top"><img src="images/copyright.gif" alt="copyright 2005 Fischer Planning" width="502" height="55" /><a href="http://www.elbow.com"><img src="images/elbow.gif" alt="design :: elbow" width="48" height="55" border="0" longdesc="http://www.elbow.com" /></a></td>
    </tr>
  </table>
</div>
</body>
</html>
