<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>和煦商城</title>
		<!--<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/main.css" />
		
		<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/jquery-1.12.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/main.js" type="text/javascript" charset="utf-8"></script>-->

		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/swiper.min.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/main.css" />
		<script src="http://localhost/MallProject/io/i/js/jquery-1.12.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://localhost/MallProject/io/i/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div class="wrap c" id="wrap">

			<!--导航栏部分-->
			<div class="header">
				<div class="logo head-nav"><img src="http://localhost/MallProject/io/i/img/logo.png" /></div>
				<div class="home head-nav" id="home">
					<p class="nav-word">
						<img src="http://localhost/MallProject/io/i/img/home-gray.png" class="head-img" />
						<span>&nbsp;&nbsp;首&nbsp;&nbsp;页</span>
					</p>
					<em></em>
				</div>
				<div class="mall head-nav" id="mall">
					<p class="nav-word">
						<img src="http://localhost/MallProject/io/i/img/cart-yellow.png" class="head-img" />
						<span>&nbsp;&nbsp;商&nbsp;&nbsp;城</span>
					</p>
					<em class="head-line"></em>
				</div>
				<div class="contact head-nav" id="contact">
					<p class="nav-word">
						<img src="http://localhost/MallProject/io/i/img/contact-gray-icon.png" class="head-img head-img-last" />
						<span>&nbsp;&nbsp;联系我们</span>
					</p>
					<em></em>
				</div>
			</div>

			<!--导航栏部分结束-->

			<!--中间内容部分-->
			<div class="main c">
				<!--轮播部分-->
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="http://localhost/MallProject/io/i/img/carrouse3.png" /></div>
						<div class="swiper-slide"><img src="http://localhost/MallProject/io/i/img/coloful1.png" /></div>
						<div class="swiper-slide"><img src="http://localhost/MallProject/io/i/img/music.png" /></div>
					</div>
					<!-- 如果需要分页器 -->
					<div class="swiper-pagination"></div>

					<!-- 如果需要导航按钮 -->
					<!--<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>-->

					<!-- 如果需要滚动条 -->
					<div class="swiper-scrollbar"></div>
				</div>
				<!--轮播部分结束-->

				<div class="product-introduce gap-margin-top">
					<p class="product-name">运动圈智能手表SOS求救心率检测、警报、骑行步数、音乐外放、金刚镀膜男女老少腕表</p>
					<div class="product-msg">
						<p class="product-price">￥<span>799.00</span></p>
						<p class="produtct-address c">快递: <span>0.00</span><span class="produtct-origin">广东广州</span></p>
						<p class="product-protect"><span class="fl">七天无理由退货</span><span>正品</span><span class="fr">三包</span></p>
					</div>
				</div>

				<div class="product-detail product-nav gap-margin-top c">
					<div class="product-title">
						<i></i>
						<span>商品详情</span>
					</div>
					<div class="c">
						<img src="http://localhost/MallProject/io/i/img/forest.png" />
					</div>
					<div class="gap-paddingtop c">
						<img src="http://localhost/MallProject/io/i/img/sports.png" />
					</div>
					<div class="c">
						<img src="http://localhost/MallProject/io/i/img/carrouse2.png" />
					</div>
					<div class="c">
						<img src="http://localhost/MallProject/io/i/img/coloful1.png" />
					</div>

				</div>

				<div class="product-param c gap-margin-top">
					<div class="product-title">
						<i></i>
						<span>产品参数</span>
					</div>
					<div class="c">
						<img src="http://localhost/MallProject/io/i/img/parameter.png" />
					</div>
				</div>

				<div class="product-method c gap-margin-top">
					<div class="product-title">
						<i></i>
						<span>使用方法</span>
					</div>
					<div class="c">
						<img src="http://localhost/MallProject/io/i/img/usage.png" />
					</div>
				</div>

			</div>

			<!--中间内容部分结束-->

			<!--底部-->
			<div class="fixed-footer">
				<div class="shadow disnone" id="shadow"></div>

				<div class="purcharse disnone" id="purcharse">
					<span class="glyphicon glyphicon-remove-circle close-icon" id="cicon"></span>
					<div class="product-style-img fl">
						<div class="product-style-img-inside">
							<img src="http://localhost/MallProject/io/i/img/product-style-img.png" />
						</div>
					</div>
					<div class="product-style-wrap c">
						<div class="product-style c">
							<div class="product-style-head c">
								<div class="product-style-head-word fl">
									<p class="product-style-head-price">￥：<span>799</span></p>
									<p>库存 <span>1000</span>件</p>
									<p>已选：<span>蓝色悦动运动手表+标准配置</span></p>
								</div>

							</div>

							<div class="product-style-section c">
								<p class="product-color">颜色</p>
								<p class="select-style"><span>&nbsp;555卡其色&nbsp;</span>
									<span class="select-style-active">&nbsp;666纯蓝色&nbsp;</span>
								</p>
							</div>

							<div class="product-style-footer c product-style-section">
								<p class="product-color">购买数量</p>
								<div class="p_number">

									<!--<div style="height:36px;font-size:16px;">商品单价：<strong id="price_item_1">￥799.00</strong></div>-->

									<div class="fr add_chose">
										<a class="reduce" onClick="setAmount.reduce('#qty_item_1')" href="javascript:void(0)">
											</a>
										<input type="text" name="qty_item_1" value="1" id="qty_item_1" onKeyUp="setAmount.modify('#qty_item_1')" class="text" />
										<a class="add" onClick="setAmount.add('#qty_item_1')" href="javascript:void(0)">
											</a>
									</div>

									<div class="f_l buy">
			<!--总价：<span class="total-font" id="total_item_1">￥89.00</span>-->
									<input type="hidden" name="total_price" id="total_price" value="" />
									<!--<span class="jifen">购买商品可获得：<b id="total_points">18</b>积分</span>-->
		</div>

								</div>
							</div>
						</div>
					</div>

					<div class="confirm c" id="confirm">确&nbsp;&nbsp;认</div>

				</div>
				<div class="footer-wrap c">
					
					<div class="customer-service" id="contact2">
						联系客服
					</div>
					<div class="buy-immediately" id="buyBtn">
						立刻购买
					</div>
				</div>
			</div>
			<!--底部内容结束-->

		</div>
		<script src="http://localhost/MallProject/io/i/js/main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			var mySwiper = new Swiper ('.swiper-container', {
			    direction: 'horizontal',
			    loop: true,
//			    autoplay:true,
//			    speed:3000,
			    // 如果需要分页器
			    pagination: '.swiper-pagination',
			    
			    // 如果需要前进后退按钮
			//  nextButton: '.swiper-button-next',
			//  prevButton: '.swiper-button-prev',
			    
			    // 如果需要滚动条
			    scrollbar: '.swiper-scrollbar',
			 });
			 
			 $("#contact").click(function(){
				window.location.href = "<?php echo url(array('c'=>"main", 'a'=>"contact", ));?>";
			});
			$("#home").click(function(){
				window.location.href = "<?php echo url(array('c'=>"main", 'a'=>"index", ));?>";
			});
			
			$("#confirm").on("click",function(){
				window.location.href = "<?php echo url(array('c'=>"mallorder", 'a'=>"confirmorder", ));?>";
			})
		</script>
	</body>

</html>
<!--http://wx.hexugongshe.com
http://localhost-->