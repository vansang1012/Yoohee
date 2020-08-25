<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Bảo mật dữ liệu</title>
  <style type="text/css">
    body {
        margin: auto;
        max-width: 20em;
        text-align: center;
    }
    form {
        width: 20em;
        position: fixed;
        top: 30%;
    }
    a {
        text-decoration: none;
        color: #EE0000;
    }
    a:visited {
        color: #FF2F00;
    }
    a:hover {
        color: #DD836F;
    }
    p {
        margin-top: 7.5em;
        font: italic 12px verdana,arial;
    }
  </style>
</head>
<body>
  <form action="<?php echo CMS_URL; ?>admin" method="post">
    <fieldset>
      <legend style="text-align: left;">Mật Khẩu Cấp 1</legend>
      <input type="password" name="pass" title="Password">
      <input type="hidden" value="" id="tz_offset" name="tz_offset">
      <input type="submit" name="submit" value="&#10003;" title="&#272;&#259;ng Nh&#7853;p">
    </fieldset>
    <p>Hệ thống bảo mật dữ liệu 1.0<br/><font color = "blue">C&#7845;p ph&#233;p b&#7903;i GNU General Public License</font></p>
  </form>
  <script type="text/javascript">
	document.getElementById("tz_offset").value = (new Date()).getTimezoneOffset() * -60;
  </script>
</body>
</html>