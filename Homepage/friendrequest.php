<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <body>
    <style media="screen">
    *{
        margin: 0;
        padding: 0;
      }

      body{
        user-select: none;
        background: #eee;
      }

      .nav-bar{
        width: 100%;
        height: 50px;
        background: #515052;
      }

      ul{
        list-style: none;
        width: 860px;
        margin: 0 auto;
      }

      ul li{
        color: #fff;
        float: left;
        width: 133px;
        line-height: 50px;
        text-align: center;
        cursor: pointer;
        font-weight: 900;
        text-transform: uppercase;
        font-family: Arial;
        transition: 0.5s;
        position: relative;
      }

      ul li:nth-child(3){
        background: #D80B15;
      }

      ul li:hover:not(.active){
        background: #D80B15;
      }

      .search-box{
        background: #E8E8E4;
        position: absolute;
        top: 54px;
        right: 28.7%;
        width: 350px;
      /*  height: 60px; */
        line-height: 60px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        border-top:4px solid #D80B15;
        display: none;
      }

      .search-box:before{
        content: "";
        position: absolute;
        top: -32px;
        right: 13px;
        border-left: 12px solid transparent;
        border-right: 12px solid transparent;
        border-top: 14px solid transparent;
        border-bottom: 14px solid #D80B15;
      }

      .search-box input[type="text"]{
        width: 200px;
        padding: 5px 10px;
        margin-left: 23px;
        border: 1px solid #D80B15;
        outline: none;
      }

      .search-box input[type="button"]{
        width: 80px;
        padding: 5px 0;
        background: #D80B15;
        color: #fff;
        margin-left: -6px;
        border: 1px solid #D80B15;
        outline: none;
        cursor: pointer;
      }

    /* Media Queries*/
      @media screen and (max-width: 700px) {
        ul{
          width: 200px;
        }

        ul li{
          width: 100px;
        }

        ul li.active{
         text-align: right;
        }

        ul li.mob{
          display: none;
        }
        .search-box{
          width: 270px;
          right: -16%;
        }
        .search-box input[type="text"]{
          width: 140px;
          margin-left: 15px;
        }
        .search-box input[type="button"] {
          margin-right: 12px;
        }
      }
</style>

<script type="text/javascript">
      $(document).ready(function() {

      $(".fa-search").click(function() {
         $(".search-box").toggle();
         $("input[type='text']").focus();
       });
  });
  // $(".active").click(function() { $(".search-box").toggle(); $("input[type='text']").focus(); });
</script>

<div class="nav-bar">
  <ul>
    <li>home</li>
    <li class="mob">profile</li>
    <li class="mob">contact</li>
    <li class="mob">about</li>
    <li class="mob">maps</li>
    <li class="active">
    	<i class="fa fa-search" aria-hidden="true"></i>
		 <div class="search-box">
    		<input type="text" placeholder=""/>
    		<input type="button" value="Search"/>
        <input type="text" placeholder=""/>
        <input type="button" value="Search"/>
  		</div>
    </li>
  </ul>
</div>
</body>
</html>
