<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>确认订单</title>
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
					<span class="text-center">确认订单</span>
				</p>
			</div>
			<!--导航栏部分结束-->
			<!--地址start-->
			<div class="null"></div>
			<!--卡位-->
			<div id="con_address" class="con_address">
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
				<p class="tip">(收货不便时，可选择免费代收货服务)</p>

				
			</div>
			<div class="envelope_line"></div>

			<!--地址end-->

			<!--商品信息start-->
			<div class="grey_line"></div>
			<div class="shop_name_info">
				<p class="shop_info_title">
					<img src="http://localhost/MallProject/io/i/img/hexu_logo.png" />
					<span class="">和煦公社</span>
				</p>
				<div class="product_info">
					<div class="product_left_pic fl">
						<img src="http://localhost/MallProject/io/i/img/product-style-img.png" />
					</div>
					<div class="product_right_info fl">
						<p class="">运动圈智能手表SOS求救心率检测、警报、骑行步数、音乐外放、金刚镀膜男女老少腕表</p>
						<p class="product_detail">
							颜色：<span class="product_color">蓝色</span>; 尺码：
							<span class="product_size">XXL</span>
						</p>
						<span class="sevenDay">七天退换</span>
						<p class="product_pride">
							<span class="price_icon">￥&nbsp;</span><span class="unit_price price_num">799</span>
							<span class="product_num fr text-center">&nbsp;1</span><span class="fr">&nbsp;X</span>
						</p>

					</div>
				</div>
				<!--购买数量-->
				<div class="product-style-footer c product-style-section buy_num">
					<p class="product-color fl buy_num_text">购买数量</p>
					<div class="p_number">
						<div class="fr add_chose buy_choose">
							<a class="reduce" onClick="setAmount.reduce('#qty_item_1')" href="javascript:void(0)">
							</a>
							<input type="text" name="qty_item_1" value="1" id="qty_item_1" onKeyUp="setAmount.modify('#qty_item_1')" class="text" />
							<a class="add" onClick="setAmount.add('#qty_item_1')" href="javascript:void(0)">
							</a>
						</div>
						<div class="f_l buy">
							<input type="hidden" name="total_price" id="total_price" value="" />
						</div>
					</div>
				</div>
				<!--配送方式-->
				<div class="product-style-footer c product-style-section buy_num">
					<p class="product-color fl buy_num_text">
						<span>配送方式</span>
						<span class="fr db">快递 免邮&nbsp;></span>
					</p>

				</div>
				<!--运险费-->
				<div class="product-style-footer c product-style-section buy_num">
					<p class="product-color fl buy_num_text">
						<span>运险费</span>
						<span class="fr db">卖家送，确认收货前退货可赔&nbsp;></span>
					</p>

				</div>
				<!--买家留言-->
				<div class="product-style-footer c product-style-section buy_num">
					<p class="product-color fl buy_num_text">
						<span class="fl">买家留言:</span>
						<input type="textarea" class="fl db" placeholder="选填：对本次交易的说明"></input>
					</p>
				</div>
				<!--商品总结-->
				<div class="product_summary c ">
					<p class="summary_info fr db">
						<span>共</span><span class="">1</span><span>件商品</span>&nbsp;
						<span>小计：</span><span class="price_icon">￥</span><span class="summary_cost price_num">799.00</span>
					</p>
				</div>

			</div>
			<div class="grey_line mb"></div>

			<!--商品信息end-->

			<!--底部-->
			<div class="con_footer navbar-fixed-bottom">
				<div class="submit_order fr" id="submit_order_btn">
					提交订单
				</div>
				<div class="all_cost fr">
					<div></div>合计：<span class="price_icon">￥</span>
					<span id="sub_all" class="price_num summary_cost">799.00</span>
				</div>
			</div>
			<!--底部内容结束-->
		</div>
		<script src="http://localhost/MallProject/io/i/js/main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
				//返回键
			$("#back").on("click",function(){
				window.history.back(-1);
			});
			
			$("#con_address").on("click",function(){
				window.location.href = "<?php echo url(array('c'=>"address", 'a'=>"showaddress", ));?>";
				
			});
		</script>
	</body>
	</body>

</html>