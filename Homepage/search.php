<html>
<head>
</head>
<body>
<style>
.tooltip
{
 display: inline;
 position: relative;
}
.tooltip:hover:after
{
 background: #333;
 background: rgba(0,0,0,.8);
 border-radius: 5px;
 bottom: 26px;
 color: #fff;
 content: attr(title);
 left: 20%;
 padding: 5px 15px;
 position: absolute;
 z-index: 98;
 width: 220px;
}
.tooltip:hover:before
{
 border: solid;
 border-color: #333 transparent;
 border-width: 6px 6px 0 6px;
 bottom: 20px;
 content: "";
 left: 50%;
 position: absolute;
 z-index: 99;
}
</style>
  <p>l</p>
  <p>l</p>
  <p>l</p>
<div id="wrapper" >
<a title="Create Simple Tooltip Using CSS3" class="tooltip">Some Sample CSS3 Tooltip</a>
</div>
</body>
</html>
