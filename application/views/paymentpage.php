<?php
$posted = array();
if(!empty($data)) {
  foreach($data as $key => $value) {    
    $posted[$key] = $value;
  }
}
//print_r($posted);
?>
<html>
  <head>
  <script>
    function submitPayuForm() {
        
//        console.log("on load");
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()" style="display:none">
    <h2>PayU Form</h2>
    <form action="http://magicmirror.in/paymentgateway/index.php" method="post" name="payuForm">
<!--    <form action="#" method="post" name="payuForm">-->
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Order ID: </td>
          <td><input name="orderid" value="<?php echo (empty($posted['orderid'])) ? '' : $posted['orderid'] ?>" /></td>
          <td>Amount: </td>
          <td><input name="amount" id="firstname" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount']; ?>" /></td>
        </tr>
        <tr>
          <td>First Name: </td>
          <td><input name="fistname" id="fistname" value="<?php echo (empty($posted['fistname'])) ? '' : $posted['fistname']; ?>" /></td>
          <td>Last Name: </td>
          <td><input name="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
        </tr>
        <tr>
          <td>Billing Address: </td>
          <td colspan="3"><textarea name="billingaddress"><?php echo (empty($posted['billingaddress'])) ? '' : $posted['billingaddress'] ?></textarea></td>
        </tr>
        <tr>
          <td>Billing state: </td>
          <td colspan="3"><input name="billingstate" value="<?php echo (empty($posted['billingstate'])) ? '' : $posted['billingstate'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Billing City: </td>
          <td colspan="3"><input name="billingcity" value="<?php echo (empty($posted['billingcity'])) ? '' : $posted['billingcity'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Billing Pincode: </td>
          <td colspan="3"><input name="billingpincode" value="<?php echo (empty($posted['billingpincode'])) ? '' : $posted['billingpincode'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Phone: </td>
          <td colspan="3"><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td colspan="3"><input name="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Shipping Name: </td>
          <td colspan="3"><input name="shippingname" value="<?php echo (empty($posted['shippingname'])) ? '' : $posted['shippingname'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Shipping Address: </td>
          <td colspan="3"><textarea name="shippingaddress"><?php echo (empty($posted['shippingaddress'])) ? '' : $posted['shippingaddress'] ?></textarea></td>
        </tr>
        <tr>
          <td>Shipping City: </td>
          <td colspan="3"><input name="shippingcity" value="<?php echo (empty($posted['shippingcity'])) ? '' : $posted['shippingcity'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Shipping State: </td>
          <td colspan="3"><input name="shippingstate" value="<?php echo (empty($posted['shippingstate'])) ? '' : $posted['shippingstate'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Shipping Pincode: </td>
          <td colspan="3"><input name="shippingpincode" value="<?php echo (empty($posted['shippingpincode'])) ? '' : $posted['shippingpincode'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Shipping Telephone: </td>
          <td colspan="3"><input name="shippingtel" value="<?php echo (empty($posted['shippingtel'])) ? '' : $posted['shippingtel'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
            <td colspan="4"><input type="submit" value="Submit" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>