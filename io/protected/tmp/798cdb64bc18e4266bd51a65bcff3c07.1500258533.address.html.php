<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>选择收货地址</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/main.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/confirm_order.css" />
		<script src="http://localhost/MallProject/io/i/js/jquery-1.12.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="wrap c" id="wrap">
			<!--导航栏部分-->
			<div class="con_header">
				<p class="header_title">
					<span id="back" class="glyphicon glyphicon-menu-left text-center"></span>
					<span id="address_control" class="text-center address_control ">➕</span>
					<span class="text-center">选择收货地址</span>

				</p>
			</div>
			<!--导航栏部分结束-->
			<!--地址start-->
			<div class="null"></div>
			<!--卡位-->
			<div id="" class="con_address ">
				<span class="glyphicon glyphicon-map-marker coord_img"></span>
				<p class="receiver_info">收货人：
					<span id="receiver_name">
						习近平
					</span>
					<span id="receiver_tel" class="fr">
						13725382087
					</span>
				</p>
				<p class="address_info">
					收货地址：
					<span id="" class="receiver_address">
						广东省广州市天河区天河北路663号（机械研究所）9栋3层金暨·力恒
					</span>
				</p>
				<!--<p class="tip">(收货不便时，可选择免费代收货服务)</p>-->

			</div>

			<div class="envelope_line"></div>
			<!--地址end-->
			<!--地址start-->
			<div id="" class="con_address ">
				<span class="glyphicon glyphicon-map-marker coord_img"></span>
				<p class="receiver_info">收货人：
					<span id="receiver_name">
						温滴滴
					</span>
					<span id="receiver_tel" class="fr">
						13725382087
					</span>
				</p>
				<p class="address_info">
					收货地址：
					<span id="" class="receiver_address">
						广东省广州市天河区天河北路663号（机械研究所）9栋3层金暨·力恒
					</span>
				</p>
				<!--<p class="tip">(收货不便时，可选择免费代收货服务)</p>-->
			</div>
			<div class="envelope_line"></div>

			<div class="grey_line mb"></div>

			<!--商品信息end-->

			<!--底部-->
			<div class="con_footer navbar-fixed-bottom">
				<div class="submit_order fr" id="submit_address_btn">
					确认地址
				</div>
			</div>
			<!--底部内容结束-->
		</div>
		<script src="http://localhost/MallProject/io/i/js/main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			//返回键
			$("#back").on("click", function() {
				window.history.back(-1);
			});
			//增加地址跳转
			$("#address_control").on("click", function() {
				window.location.href = "<{url c="
				address " a="
				showaddaddress "}>";
			});

			//选择地址效果
			$(".con_address").click(function() {
				$(".con_address").removeClass("choose");
				$(this).toggleClass("choose");
			});

			$("#submit_address_btn").on("click", function() {
				window.location.href = "<{url c="
				mallorder " a="
				confirmorder "}>";
			});
		</script>
	</body>
	</body>

</html>