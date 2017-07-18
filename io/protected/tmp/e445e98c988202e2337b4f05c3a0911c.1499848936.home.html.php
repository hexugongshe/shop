<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>和煦商城</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/main.css" />
		
		
		
	</head>

	<body>
		<div class="wrap c" id="wrap">
			
			<!--导航栏部分-->
			<div class="header">
				<div class="logo head-nav"><img src="http://localhost/MallProject/io/i/img/logo.png"/></div>
				<div class="home head-nav" id="home">
					<p class="nav-word">
						<img src="http://localhost/MallProject/io/i/img/home-yellow-icon.png" class="head-img"/>
						<span>&nbsp;&nbsp;首&nbsp;&nbsp;页</span>
					</p>
					<em class="head-line"></em>
				</div>
				<div class="mall head-nav" id="mall">
					<p class="nav-word">
						<img src="http://localhost/MallProject/io/i/img/cart-gray-icon.png" class="head-img"/>
						<span>&nbsp;&nbsp;商&nbsp;&nbsp;城</span>
					</p>
					<em></em>
				</div>
				<div class="contact head-nav" id="contact">
					<p class="nav-word">
						<img src="http://localhost/MallProject/io/i/img/contact-gray-icon.png" class="head-img head-img-last"/>
						<span>&nbsp;&nbsp;联系我们</span>
					</p>
					<em></em>
				</div>
			</div>
			
			<!--导航栏部分结束-->
			
			<!--中间内容部分-->
			<div class="main c">
				<div class="relax c">
					<img src="http://localhost/MallProject/io/i/img/carrousel1.png"/>
				</div>
				<div class="introduce c">
					<p class="gap-paddingtop main-p">广州金暨信息科技有限公司</p>
					<p class="main-p">简称金暨大数据，一家金融大数据公司</p>
					<p class="main-p">一个致力于打造金融大数据的平台</p>
					<div class="introduce-logo">
						<img src="http://localhost/MallProject/io/i/img/logo.png"/>
					</div>
				</div>
				
				<div class="further c">
					<p class="main-p gap-paddingtop">未来</p>
					<p class="main-p">金暨大数据将继续推出四百万人的收益产品</p>
					<div class="further-img">
						<img src="http://localhost/MallProject/io/i/img/further.png"/>
					</div>
				</div>
				
				<!--中间内容部分结束-->
			

			
			</div>
			<!--底部-->
				<div class="footer">
					已到当前页面的底部，看看其他页面吧
				</div>
		</div>
		
		<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/jquery-1.12.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/main.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript">
			$("#contact").click(function(){
				window.location.href = "<?php echo url(array('c'=>"main", 'a'=>"contact", ));?>";
			});
			$("#mall").click(function(){
				window.location.href = "<?php echo url(array('c'=>"main", 'a'=>"mall", ));?>";
			});
			
		
		</script>
	</body>

</html>
<!--http://wx.hexugongshe.com
http://localhost-->