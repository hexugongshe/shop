<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>和煦商城</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="http://localhost/MallProject/io/i/css/main.css" />
		<style type="text/css">
			/*persioner  个人中心页面*/
			a {
				color: #292828;
			}
			html,body{
				height: 100%;
				background-color: #F0F0F0;
			}
			li{
				list-style: none;
				letter-spacing: 1px;
				line-height: 30px;
			}
			/*头部*/
			.personal-center {
				padding: 18px;
				background: #f29701;
				color: #131313;
				position: relative;
				font-size:16px ;
			}
			.personal-center a{
				float: left;
				position: absolute;
				top:17px;
				left: 15px;
			}
			.head-name {
				margin-top: 20px;
			}
			.nick-name{
				margin: 5px 0 20px;
			}
			.clb {
				clear: both;
			}
			
			.user-head {
				width: 80px;
				margin: 5px auto;
				
				text-align: center;
				float: none;
				border: 2px solid #fff;
			}
			
			
			/*<!--用户信息-->*/
			
			.user-msg {
				margin-top: 10px;
				background: #fff;
				padding: 15px 20px;
			}
			
			.my-msg {
				border-bottom: 1px solid #f29701;
				padding: 5px 0;
			}
			
			.tel,
			.mail {
				border-bottom: 1px solid #d4d1d1;
				color: #a09c9c;
				padding: 8px 0;
			}
			
			
			/*订单*/
			
			#order-menu{
				overflow: hidden;
				margin-top: 20px;
				background: #fff;
				padding: 15px 20px;
			}
			
			#nav {
				display: block;
				width: 100%;
				padding:5px 0 ;
				margin: 0;
				list-style: none;
				overflow: hidden;
				border-bottom: 1px solid #f29701;
				font-weight: 600;
			}
			
			#nav li {
				float: left;
				text-align: center;
				width: 33.33%;
			}
			
			 #nav li a {
				display: block;
				text-decoration: none;
				text-align: center;
				
			}
			 #nav li a:focus{
			 	color: #f29701;
			 }
			#nav li a:hover{
			 	color: #f29701;
			 }
			.nav-color{
				color: #333;
			}
			#menu_con {
				
				border-top: none
			}
			
			.tag {
				padding: 5px 0;
				overflow: hidden;
			}
			.tag li{
				list-style: none;
			}
			.selected {
				color: #f29701;
			}
			.list{
				border-bottom: 1px solid #d4d1d1;
				padding:5px 0 ;
				overflow: hidden;
			}
			
			.addr{
				line-height: 20px;
			}
			.phone{
				margin-left:10px ;
			}
		</style>
	</head>

	<body>
		<div class="wrap c" id="wrap">
			<div class="personal-center">
				<a href="home.html" class="pull-left">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="">
						首页
					</span>
				</a>
				<div class="text-center">个人中心</div>
			</div>
			<div class="head-name clb text-center">
				<img src="http://localhost/MallProject/io/i/img/user-head.jpg" class="user-head img-respon img-circle text-center" />
				<div class="clb nick-name">微信名称：mengmeng</div>
			</div>

			<!--用户信息-->
			<div class="user-msg">
				<p class="my-msg"><strong>我的信息</strong></p>
				<p class="tel">
					<span>手机</span>
					<span class="pull-right">1882610994</span>
				</p>
				<p class="mail">
					<span>邮箱</span>
					<span class="pull-right">498771421@qq.com</span>
				</p>
			</div>

			<!--代码部分begin-->
			<div id="order-menu">
				<!--tag标题-->
				<ul id="nav">
					<li><a href="#" class="selected">所有订单</a></li>
					<li><a href="#" class="">已完成订单</a>
					</li>
					<li><a href="#" class="">未完成订单</a>
					</li>
				</ul>

				<!--二级菜单-->
				<div id="menu_con">
					<div class="tag" style="display:block">
						<ul class="list">
							<li class="pull-left addr">
								<span>广州天河北路663号广东机械研究所9栋3层广州天河北路663号广东机械研究所9栋3层</span>
							</li><br />
							<li class="user-name pull-left">mengmeng</li>
							<li class="phone pull-left">1882616994</li>
							<li class="pull-right"><span>状态：所有订单</span></li>
						</ul>
						<ul class="list">
							<li class="pull-left addr">
								<span>广州天河北路663号广东机械研究所9栋3层广州天河北路663号广东机械研究所9栋3层</span>
							</li><br />
							<li class="user-name pull-left">mengmeng</li>
							<li class="phone pull-left">1882616994</li>
							<li class="pull-right"><span>状态：所有订单</span></li>
						</ul><ul class="list">
							<li class="pull-left addr">
								<span>广州天河北路663号广东机械研究所9栋3层广州天河北路663号广东机械研究所9栋3层</span>
							</li><br />
							<li class="user-name pull-left">mengmeng</li>
							<li class="phone pull-left">1882616994</li>
							<li class="pull-right"><span>状态：所有订单</span></li>
						</ul>
					</div>
					<div class="tag" style="display:none">
						<ul class="list">
							<li class="pull-left addr">
								<span>广州天河北路663号广东机械研究所9栋3层广州天河北路663号广东机械研究所9栋3层</span>
							</li>
							<li class="user-name pull-left">mengmeng</li>
							<li class="phone pull-left">1882616994</li>
							<li class="pull-right"><span>状态：历史订单</span></li>
						</ul>

					</div>
					<div class="tag" style="display:none">
						<ul class="list">
							<li class="pull-left addr">
								<span>广州天河北路663号广东机械研究所9栋3层广州天河北路663号广东机械研究所9栋3层</span>
							</li>
							<li class="user-name pull-left">mengmeng</li>
							<li class="phone pull-left">1882616994</li>
							<li class="pull-right"><span>状态：未完成订单</span></li>
						</ul>
					</div>
				</div>
			</div>
			<script>
				var tabs = function() {
					function tag(name, elem) {
						return(elem || document).getElementsByTagName(name);
					}
					//获得相应ID的元素
					function id(name) {
						return document.getElementById(name);
					}

					function first(elem) {
						elem = elem.firstChild;
						return elem && elem.nodeType == 1 ? elem : next(elem);
					}

					function next(elem) {
						do {
							elem = elem.nextSibling;
						} while (
							elem && elem.nodeType != 1
						)
						return elem;
					}
					return {
						set: function(elemId, tabId) {
							var elem = tag("li", id(elemId));
							var tabs = tag("div", id(tabId));
							var listNum = elem.length;
							var tabNum = tabs.length;
							for(var i = 0; i < listNum; i++) {
								elem[i].onclick = (function(i) {
									return function() {
										for(var j = 0; j < tabNum; j++) {
											if(i == j) {
												tabs[j].style.display = "block";
												//												alert(elem[j].firstChild);
												elem[j].firstChild.className = "selected";
											} else {
												tabs[j].style.display = "none";
												elem[j].firstChild.className = "";
											}
										}
									}
								})(i)
							}
						}
					}
				}();
				tabs.set("nav", "menu_con"); //执行
			</script>
	</body>

</html>