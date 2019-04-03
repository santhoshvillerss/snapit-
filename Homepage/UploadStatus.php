<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color: #e0e0d1;">
    <div style='margin-left:100px;' class="container">
      <div class="jumbotron" style='width:75%; padding-top: 10px; padding-bottom: 10px;'>
          <form enctype="multipart/form-data" id="uploadForm" method="POST" action="" >
              <input name="userImage" type="file" class="btn btn-secondary" style="background-color: #c2c2a3"/>
              <input type="submit" name="submit" style="margin-left: 2px;" value="Submit" class="btn btn-outline-secondary" />
          </form>
      </div>
        <div id="AjaxUploadStatus">

        </div>
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>

    <script type="text/javascript">
        function share(id,val)
        {
            var referenceshare = document.getElementById(id).id;
            if(val == 'share')
             {
                  document.getElementById(id).style.backgroundColor = "#ffb3ff";
                  document.getElementById(id).value = "shared";
                  $.ajax({
                    url:"AjaxShareStatus.php",
                    method:"POST",
                    data:{referenceshare:referenceshare},
                    dataType:"html",
                    success:function(data)
                    {
                              $("#AjaxUploadStatus").prepend(data);
                    }
                  });
             }
         }

        </script>
    <script type="text/javascript">

    $(document).ready(function (e) {
      $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
          url: "AjaxuploadStatus.php",
          type: "POST",
          cache:false,
          data:  new FormData(this),
          contentType: false,
          processData:false,
          dataType: 'html',
           // data   : $(this).serializeArray(),
          success: function(data)
          {
          //      console.log(data);
                $("#AjaxUploadStatus").prepend(data);
          },
          error: function()
          {

          }
       });
    }));
    });
    </script>

   </body>
  </html>
