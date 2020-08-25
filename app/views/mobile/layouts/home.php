<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<base href="<?php echo CMS_URL;?>" />
<link href="<?=$this->system['icon']?>" rel="shortcut icon" type="image/x-icon" />
<link rel="icon" type="image/png" href="<?=$this->system['icon']?>" />
<meta name="robots" content="noodp,index,follow" />
<meta name="revisit-after" content="1 days" />
<meta http-equiv="content-language" content="vi" />
<meta content="IE=edge" http-equiv="x-ua-compatible">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<title><?php echo isset($data['meta_title'])?$data['meta_title']:'';?></title>
<meta name="title" content="<?php echo isset($data['meta_title'])?$data['meta_title']:'';?>" />
<meta name="keywords" content="<?php echo isset($data['meta_keywords'])?$data['meta_keywords']:'';?>" />
<meta name="description" content="<?php echo isset($data['meta_description'])?$data['meta_description']:'';?>" />
<link rel="canonical" href="<?php echo isset($data['canonical'])?$data['canonical']:'';?>"/>
<?php echo (isset($data['rel_prev']) && !empty($data['rel_prev']))?'<link rel="prev" href="'.$data['rel_prev'].'" />':'';?>
<?php echo (isset($data['rel_next']) && !empty($data['rel_next']))?'<link rel="next" href="'.$data['rel_next'].'" />':'';?>
<meta itemprop="description" content="<?php echo isset($data['meta_description'])?$data['meta_description']:'';?>" />
<meta itemprop="url" href="<?php echo isset($data['canonical'])?$data['canonical']:'';?>" />
<meta itemprop="image" content="<?php echo isset($data['image'])?$data['image']:'';?>" />
<meta property="og:image" content="<?php echo isset($data['image'])?$data['image']:'';?>" />
<?php echo (isset($data['google_authorship']) && !empty($data['google_authorship']))?'<link rel="author" href="'.$data['google_authorship'].'"/>':'';?>

<!--===MODULE MAIN==-->
<link rel="stylesheet" type="text/css" href="template/icc-technology/css/style.css?<?=time()?>">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="template/icc-technology/css/responsive.css?<?=time()?>">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T6N6884');</script>

<!-- Global site tag (gtag.js) - AdWords: 808911277 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-808911277"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-808911277');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97014841-24"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97014841-24');
</script>
<!-- End Google Tag Manager -->
</head>
<body onLoad="init()">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6N6884"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="loading" style="width:100%;text-align:center;background: rgba(0,0,0,0.9);height: 800px;z-index: 999;overflow: hidden;">
Đang nạp trang. Vui lòng đợi giây lát!<br />
<img style="margin-top: 250px;" src="upload/load.gif" border=0></div>
 
<script>
var ld=(document.all);
var ns4=document.layers;
var ns6=document.getElementById&&!document.all;
var ie4=document.all;
if (ns4)
ld=document.loading;
else if (ns6)
ld=document.getElementById("loading").style;
else if (ie4)
ld=document.all.loading.style;
function init()
{
if(ns4){ld.visibility="hidden";}
else if (ns6||ie4) ld.display="none";
}
</script>
<div id="main">
<!--HEADER-->
<?php $this->load->view('mobile/header');?>

<?php $data = isset($data)?$data:NULL; $this->load->view($template, $data);?>

<?php $this->load->view('mobile/footer');?>
</div><!-- #main -->

<script type="text/javascript" src="template/icc-technology/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="template/icc-technology/js/materialize.min.js"></script>
<script type="text/javascript" src="template/icc-technology/js/slick.min.js"></script>
<script type="text/javascript" src="template/icc-technology/js/jquery.slicknav.js"></script>
<script type="text/javascript" src="template/icc-technology/js/jquery.swipebox.js"></script>
<script type="text/javascript" src="template/icc-technology/js/custom.js"></script>
</body>

</html>