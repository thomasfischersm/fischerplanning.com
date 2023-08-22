<?php
if ($_POST['car'] == 'cnn') {
   
   header("Location:"."http://www.cnn.com");
}
?>

<script>
function test() {
  alert('test');
}

function validate() {
  if (document.forms[0].car.value == '') {
      alert("car is a required field");
      return false;
  } else {
      return true;
  }
}
</script>

<form onSubmit="validate()" method="POST">
<input type="text" name="car" value="<?php echo $_POST['car'].'.'; ?>"/>
<input type="submit"/>
</form>




<?php 
echo 'Hello World'; 
echo $_POST['car'];
if ($_POST['car']) {
 echo 'got it';
 mail('thomas.fischer@movielink.com', 'test subject' . $_POST['car'], 'test message');
} 
//mail('thomas.fischer@movielink.com', 'test subject', 'test message');
?>