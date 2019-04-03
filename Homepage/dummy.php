<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="dp">

      <!-- logged in user information -->
      <?php  if (isset($_SESSION['username'])) { ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <?php } ?>
      <!-- logged in user information -->

      <div class="upload-btn-wrapper">
        <button class="btn">Upload a file</button>
        <input type="file" name="myfile" />
      </div>

    </div>

  </body>
</html>
<style media="screen">

.upload-btn-wrapper {
position: relative;
overflow: hidden;
display: inline-block;
}

.btn {
border: 2px solid gray;
color: gray;
background-color: white;
padding: 8px 20px;
border-radius: 8px;
font-size: 20px;
font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
font-size: 100px;
position: absolute;
left: 0;
top: 0;
opacity: 0;
}

.dp {
  margin: 0px auto 0px;
  width: 80%;
  height: 300px;
  padding: 20px;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 5px 5px 5px 5px;
}

</style>
