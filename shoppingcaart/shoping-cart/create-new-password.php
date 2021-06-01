<?php include('inc/header.php');  ?>

<?php include('inc/nav.php');  ?>
 
<div class="container text-white">
    <div class="row">
      <div class="col-md-12 my-5">
      <?php
      // First we grab the tokens from the URL.
      $selector = $_GET['selector'];
      $validator = $_GET['validator'];

      // Then we check if the tokens are here.
      if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
      } else {
        // Here we check if all characters in our tokens are hexadecimal 'digits'. This is a boolean. Again another error check to make sure the URL wasn't changed by the user.
        // If this check returns "true", we show the form that the user uses to reset their password.
        if (ctype_xdigit( $selector ) !== false && ctype_xdigit( $validator ) !== false) {
          ?>

          <form class="logregform" action="reset-password.php" method="post">
            <input type="hidden" name="selector" value="<?php echo $selector  ?>">
            <input type="hidden" name="validator" value="<?php echo $validator ?>">

            <input type="password" name="pwd" placeholder="Enter new password...">
            <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
            <button type="submit" name="reset-password-submit">Reset password</button>
          </form>

          <?php
        }
      }
      ?>