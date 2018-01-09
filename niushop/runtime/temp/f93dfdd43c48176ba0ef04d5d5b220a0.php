<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:46:"template/adminblue\Order\virtualOrderList.html";i:1511598854;s:28:"template/adminblue\base.html";i:1512444888;s:45:"template/adminblue\controlCommonVariable.html";i:1506689786;s:32:"template/adminblue\urlModel.html";i:1510819828;s:34:"template/adminblue\pageCommon.html";i:1512444924;s:34:"template/adminblue\openDialog.html";i:1509523952;s:48:"template/adminblue\Order\virtualOrderAction.html";i:1512114660;s:53:"template/adminblue\Order\virtualOrderPrintAction.html";i:1511520328;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
	<?php if($frist_menu['module_name']=='首页'): ?>
	<title><?php echo $title_name; ?> - 商家管理</title>
	<?php else: ?>
		<title><?php echo $title_name; ?> - <?php echo $frist_menu['module_name']; ?>管理</title>
	<?php endif; ?>
	<link rel="shortcut  icon" type="image/x-icon" href="ADMIN_IMG/admin_icon.ico" media="screen"/>
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/css/ns_blue_common.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/simple-switch/css/simple.switch.three.css" />
	<style>
	.Switch_FlatRadius.On span.switch-open{background-color: #0072D2;border-color: #0072D2;}
	#copyright_meta a{color:#333;}
	</style>
	<script src="__STATIC__/js/jquery-1.8.1.min.js"></script>
	<script src="__STATIC__/blue/bootstrap/js/bootstrap.js"></script>
	<script src="__STATIC__/bootstrap/js/bootstrapSwitch.js"></script>
	<script src="__STATIC__/simple-switch/js/simple.switch.js"></script>
	<script src="__STATIC__/js/jquery.unobtrusive-ajax.min.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<script src="__STATIC__/js/seller.js"></script>
	<script src="__STATIC__/js/load_task.js"></script>
	<script src="__STATIC__/js/load_bottom.js" type="text/javascript"></script>
	<script src="ADMIN_JS/jquery-ui.min.js"></script>
	<script src="ADMIN_JS/ns_tool.js"></script>
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/css/ns_table_style.css">
	<script>
	/**
	 * Niushop商城系统 - 团队十年电商经验汇集巨献!
	 * ========================================================= Copy right
	 * 2015-2025 山西牛酷信息科技有限公司, 保留所有权利。
	 * ---------------------------------------------- 官方网址:
	 * http://www.niushop.com.cn 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
	 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
	 * =========================================================
	 * 
	 * @author : 小学生王永杰
	 * @date : 2016年12月16日 16:17:13
	 * @version : v1.0.0.0 商品发布中的第二步，编辑商品信息
	 */
	var PLATFORM_NAME = "<?php echo $title_name; ?>";
	var ADMINIMG = "ADMIN_IMG";//后台图片请求路径
	var ADMINMAIN = "ADMIN_MAIN";//后台请求路径
	var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
	var APPMAIN = "APP_MAIN";//手机端请求路径
	var UPLOAD = "__UPLOAD__";//上传文件根目录
	var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
	var ROOT = "__ROOT__";//根目录
	var ADDONS = "__ADDONS__";
	var STATIC = "__STATIC__";
	
	//上传文件路径
	var UPLOADGOODS = 'UPLOAD_GOODS';//存放商品图片
	var UPLOADGOODSSKU = 'UPLOAD_GOODS_SKU';//存放商品SKU
	var UPLOADGOODSBRAND = 'UPLOAD_GOODS_BRAND';//存放商品品牌图
	var UPLOADGOODSGROUP = 'UPLOAD_GOODS_GROUP';////存放商品分组图片
	var UPLOADGOODSCATEGORY = 'UPLOAD_GOODS_CATEGORY';////存放商品分类图片
	var UPLOADCOMMON = 'UPLOAD_COMMON';//存放公共图片、网站logo、独立图片、没有任何关联的图片
	var UPLOADAVATOR = 'UPLOAD_AVATOR';//存放用户头像
	var UPLOADPAY = 'UPLOAD_PAY';//存放支付生成的二维码图片
	var UPLOADADV = 'UPLOAD_ADV';//存放广告位图片
	var UPLOADEXPRESS = 'UPLOAD_EXPRESS';//存放物流图片
	var UPLOADCMS = 'UPLOAD_CMS';//存放文章图片
	var UPLOADVIDEO = 'UPLOAD_VIDEO';//存放视频文件
</script>
	
<script type="text/javascript" src="__STATIC__/My97DatePicker/WdatePicker.js"></script>
<link href="__STATIC__/blue/css/order/ns_orderlist.css" rel="stylesheet" type="text/css" />
<style>
.mytable.select td{padding-bottom:0;}
.mytable.select div{display:inline-block;margin:0 10px 10px 0;}
.mytable.select #more_search{display: block;}
.table-class tbody td a {margin-left: 0;}
.order-tool{display: inline;position: absolute;margin-top: 10px;margin-left: 16px;}
.to-fixed{position: fixed;width: 85.5%;top: 50px;box-shadow: 0 2px 6px 0 rgba(0,0,0,.3);z-index: 5;}
</style>

	</head>
<body>
<input type="hidden" id="niushop_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="niushop_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="niushop_admin_model" value="<?php echo admin_model(); ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#niushop_admin_model"));
	if(url == ''|| url == null){
		return 'SHOP_MAIN';
	}else{
		var str=url.substring(0, 1);
		if(str=='/' || str=="\\"){
			url=url.substring(1, url.length);
		}
		if($("#niushop_rewrite_model").val()==1 || $("#niushop_rewrite_model").val()==true){
			return 'SHOP_MAIN/'+url;
		}
		var action_array = url.split('?');
		//检测是否是pathinfo模式
		url_model = $("#niushop_url_model").val();
		if(url_model==1 || url_model==true){
			var base_url = 'SHOP_MAIN/'+action_array[0];
			var tag = '?';
		}else{
			var base_url = 'SHOP_MAIN?s=/'+ action_array[0];
			var tag = '&';
		}
		if(action_array[1] != '' && action_array[1] != null){
			return base_url + tag + action_array[1];
		}else{
			return base_url;
		}
	}
}

//处理图片路径
function __IMG(img_path){
	var path = "";
	if(img_path != undefined && img_path != ""){
		if(img_path.indexOf("http://") == -1 && img_path.indexOf("https://") == -1){
			path = UPLOAD+"\/"+img_path;
		}else{
			path = img_path;
		}
	}
	return path;
}
</script>
<article class="ns-base-article">

	<aside class="ns-base-aside">
		<div class="ns-logo" onclick="location.href='<?php echo __URL('ADMIN_MAIN'); ?>';"></div>
		<div class="ns-main-block">
			<header>
				<article class="ns-base-user">
					<div class="ns-head-portrait">
						<?php if($user_headimg != ''): ?>
						<img src="<?php echo __IMG($user_headimg); ?>"/>
						<?php else: ?>
						<img src="__STATIC__/blue/img/head_portrait_default.png"/>
						<?php endif; ?>
					</div>
					<div class="ns-base-info">
						<span>欢迎您：<?php echo $user_name; ?></span>
						<span>角色：<?php echo $group_name; ?></span>
					</div>
				</article>
				<a href="#edit-password" data-toggle="modal" title="修改密码">修改密码</a>
				<a href="<?php echo __URL('ADMIN_MAIN/login/logout'); ?>" title="安全退出">安全退出</a>
			</header>
			<nav>
				<ul>
					<?php if(is_array($leftlist) || $leftlist instanceof \think\Collection || $leftlist instanceof \think\Paginator): if( count($leftlist)==0 ) : echo "" ;else: foreach($leftlist as $key=>$leftitem): if(strtoupper($leftitem['module_id']) == $second_menu_id): ?>
					<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>';" title="<?php echo $leftitem['module_name']; ?>"><?php echo $leftitem['module_name']; ?></li>
					<?php else: ?>
					<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>';" title="<?php echo $leftitem['module_name']; ?>"><?php echo $leftitem['module_name']; ?></li>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</nav>
			<div style="height:50px;"></div>
			<div id="bottom_copyright">
				<footer>
					<img id="copyright_logo"/>
					<p>
						<span id="copyright_desc"></span>
						<br/>
						<a id="copyright_companyname" style="color: #333" target="_blank"></a>
						<br/>
						<span id="copyright_meta"></span>
					</p>
				</footer>
			</div>
		</div>
	</aside>
	
	<section class="ns-base-section">
		<header class="ns-base-header">
			<div class="ns-search">
				<img src="__STATIC__/blue/img/nav_menu.png" title="导航管理" class="nav-menu js-nav" />
				<div class="ns-navigation-management">
					<div class="ns-navigation-title">
						<h4>导航管理</h4>
						<span>x</span>
					</div>
					<div style="height:40px;"></div>
					<?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): if( count($nav_list)==0 ) : echo "" ;else: foreach($nav_list as $key=>$nav): ?>
					<dl>
						<dt><?php echo $nav['data']['module_name']; ?></dt>
						<?php if(is_array($nav['sub_menu']) || $nav['sub_menu'] instanceof \think\Collection || $nav['sub_menu'] instanceof \think\Paginator): if( count($nav['sub_menu'])==0 ) : echo "" ;else: foreach($nav['sub_menu'] as $key=>$nav_sub): ?>
						<dd onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$nav_sub['url']); ?>';"><?php echo $nav_sub['module_name']; ?></dd>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</dl>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<i class="ns-vertical-bar"></i>
				<div class="ns-search-block">
					<i class="fa fa-search" title="搜索"></i>
					<span>搜索</span>
					<div class="mask-layer-search">
						<input type="text" id="search_goods" placeholder="搜索" />
						<a href="javascript:search();"><img src="__STATIC__/blue/img/enter.png"/></a>
					</div>
				</div>
			</div>
			<nav>
				<ul>
					<?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if(strtoupper($per['module_id']) == $headid): ?>
					<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>';">
						<span><?php echo $per['module_name']; ?></span>
						<?php if($per['module_id'] == 10000): ?>
							<span class="is-upgrade"></span>
						<?php endif; ?>
					</li>
					
					<?php else: ?>
					<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>';">
						<span><?php echo $per['module_name']; ?></span>
						<?php if($per['module_id'] == 10000): ?>
							<span class="is-upgrade"></span>
						<?php endif; ?>
					</li>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</nav>
			<div class="ns-base-tool">
				<div class="ns-help">
					<img src="__STATIC__/blue/img/user_admin_blue.png" width="30" >
					<!-- <i class="fa fa-question-circle-o"></i> -->
					<ul>
						<li title="前台首页" onclick="window.open('<?php echo __URL('SHOP_MAIN'); ?>')">
							<img src="__STATIC__/blue/img/home_pc.png"/>
							<a href="javascript:;">前台首页</a>
						</li>
						<li title="加入收藏" onclick="addFavorite()">
							<img src="__STATIC__/blue/img/add_favorites.png" />
							<a href="javascript:;">加入收藏</a>
						</li>
						<li title="清理缓存" onclick="delcache()">
							<img src="__STATIC__/blue/img/clear_the_cache.png"/>
							<a href="javascript:;">清理缓存</a>
						</li>
						<li title="退出登录" onclick="window.location.href='<?php echo __URL('ADMIN_MAIN/login/logout'); ?>'">
							<img src="__STATIC__/blue/img/loout.png"/>
							<a href="javascript:;">退出登录</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		
		
		
		<div style="position:relative;margin:10px 0;">
			<!-- 三级导航菜单 -->
			
			
			<div class="right-side-operation">
				<ul>
					
					
				</ul>
			</div>
		</div>
		<!-- 操作提示 -->
		
		<div class="ns-main">
			
<input type="hidden" id="order_id" />
<input type="hidden" id="print_select_ids" />
<input type="hidden" id="order_status" value="<?php echo $status; ?>" />
<div style="position:relative;margin:10px 0;">
	<nav class="ns-third-menu" style="margin:0;">
		<ul>
			<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>';">虚拟订单列表</li>
		</ul>
	</nav>
</div>
<div style="border:1px solid #e5e5e5;">
	<table class="mytable select">
		<tr>
			<td>
				<div>
					<span>下单时间：</span>
					<input type="text" id="startDate" class="input-common w100" placeholder="请选择开始日期" onclick="WdatePicker()" />
					&nbsp;-&nbsp;
					<input type="text" id="endDate" placeholder="请选择结束日期" class="input-common w100" onclick="WdatePicker()" />
				</div>
				<div>
					<span>订单编号：</span>
					<input id="orderNo" class="input-common w100" type="text" />
					<input type="button" value="更多搜索" class="btn-common more_search"/>
					<input class="btn-common" type="button" onclick="searchData()" value="搜索"/>
					<input class="btn-common" type="button" onclick="dataExcel()" value="导出数据"/>
				</div>
				<span style="display: none;" id="more_search">
					<div>
						<span>买家联系方式：</span>
						<input id="receiverMobile" class="input-common w100" type="text" />
					</div>
					<div style="margin-right: 4px;">
						<span>支付方式：</span>
						<select id="payment_type" class="select-common w100">
							<option value="">全部</option>
							<option value="1">微信</option>
							<option value="2">支付宝</option>
							<option value="10">线下支付</option>
						</select>
					</div>
				</span>
			</td>
		</tr>
	</table>
	
	<div class="divider"></div>
	<div style="min-height: 53px;">
		<nav class="order-nav">
			<ul>
				<?php if(is_array($child_menu_list) || $child_menu_list instanceof \think\Collection || $child_menu_list instanceof \think\Paginator): if( count($child_menu_list)==0 ) : echo "" ;else: foreach($child_menu_list as $k=>$child_menu): if($child_menu['active'] == '1'): ?>
					<li class="selected"><a href="<?php echo __URL('ADMIN_MAIN/'.$child_menu['url']); ?>"><?php echo $child_menu['menu_name']; ?></a></li>
				<?php else: ?>
					<li><a href="<?php echo __URL('ADMIN_MAIN/'.$child_menu['url']); ?>"><?php echo $child_menu['menu_name']; ?></a></li>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				
				<table class="mytable" style="float:right;width: inherit;">
					<tr>
						<td>
							<a class="btn btn-small fa-a" id="PrintOrder" href="javascript:;">
								<i class="fa fa-print"></i>
								<span>打印订单</span>
							</a>
							<?php if($status != '' && $status != 0): if($status == 5): ?>
								<a class="btn btn-small fa-a" href="javascript:batchDelete();">
									<i class="fa fa-trash"></i>
									<span>批量删除</span>
								</a>
								<?php endif; endif; ?>
						</td>
					</tr>
				</table>
			</ul>
		</nav>
	</div>
	<table class="table-class">
		<colgroup>
			<col width="25%">
			<col width="15%">
			<col width="10%">
			<col width="10%">
			<col width="15%">
			<col width="10%">
			<col width="15%">
		</colgroup>
		<thead>
			<tr align="center">
				<div class="order-tool">
					<input type="checkbox" onclick="CheckAll(this)" id="check">
					<label for="check">全选</label>
				</div>
				<th>商品信息</th>
				<th>商品清单</th>
				<th>买家</th>
				<th>联系方式</th>
				<th>订单金额</th>
				<th>交易状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>


			<script type="text/javascript" src="__STATIC__/js/jquery.cookie.js"></script>
<script src="__STATIC__/js/page.js"></script>
<div class="page" id="turn-ul" style="display: none;">
	<div class="pagination">
		<ul>
			<li class="total-data">共0有条数据</li>
			<li class="according-number">每页显示<input type="text" class="input-medium" id="showNumber" value="<?php echo $pagesize; ?>" data-default="<?php echo $pagesize; ?>" autocomplete="off"/>条</li>
			<li><a id="beginPage" class="page-disable" style="border: 1px solid #dddddd;">首页</a></li>
			<li><a id="prevPage" class="page-disable">上一页</a></li>
			<li id="pageNumber"></li>
			<li><a id="nextPage">下一页</a></li>
			<li><a id="lastPage">末页</a></li>
			<li class="page-count">共0页</li>
		</ul>
	</div>
</div>
<input type="hidden" id="page_count" />
<input type="hidden" id="page_size" />
<script>
/**
 * 保存当前的页面
 * 创建时间：2017年8月30日 19:29:20
 */
function savePage(index){
	var json = { page_index : index, show_number : $("#showNumber").val(), url :  window.location.href };
	$.cookie('page_cookie',JSON.stringify(json),{ path: '/' });
 	//console.log(json);
}

$(function() {
	try{
		
		$("#turn-ul").show();//显示分页
		var history_url = "";
		var json = { page_index : 1, show_number : <?php echo $pagesize; ?>, url :  window.location.href };
		var history_json = "";//用于临时保存分页数据
		if($.cookie('page_cookie') != undefined && $.cookie('page_cookie') != "" && $.cookie('page_cookie') != '""'){
			
			var cookie = eval("(" + $.cookie('page_cookie') + ")");
			if(cookie !=undefined && cookie != ""){
				json.page_index = cookie.page_index;
				if(cookie.show_number != undefined && cookie.show_number != "") json.show_number = cookie.show_number;
				else json.show_number = <?php echo $pagesize; ?>;
				history_url = cookie.url;
				history_json = cookie;
			}
			
		}else{
			
			savePage(json.page_index);
			
		}
		if(history_url != undefined && history_url != "" && history_url != json.url && json.page_index != 1){
			
			//如果页面发生了跳转，还原操作
			json.page_index = 1;
			json.show_number = <?php echo $pagesize; ?>;
			json.url = history_url;
 			//console.log("如果页面发生了跳转，还原操作");
			$.cookie('page_cookie',JSON.stringify(json),{ path: '/' });
		}

 		//console.log($.cookie('page_cookie'));
		$("#showNumber").val(json.show_number);
		if(json.page_index != 1) jumpNumber = json.page_index;
		LoadingInfo(json.page_index);//通过此方法调用分页类
		
	}catch(e){
		
		$("#turn-ul").hide();
		//当前页面没有分页，进行还原操作
		$.cookie('page_cookie',JSON.stringify(history_json),{ path: '/' });
//		console.error(e);
 		//console.log("当前页面没有分页，进行还原操作");
 		//console.log($.cookie('page_cookie'));
	}
	
	//首页
	$("#beginPage").click(function() {
		if(jumpNumber!=1){
			jumpNumber = 1;
			LoadingInfo(1);
			savePage(1);
			changeClass("begin");
		}
		return false;
	});

	//上一页
	$("#prevPage").click(function() {
		var obj = $(".currentPage");
		var index = parseInt(obj.text()) - 1;
		if (index > 0) {
			obj.removeClass("currentPage");
			obj.prev().addClass("currentPage");
			jumpNumber = index;
			LoadingInfo(index);
			savePage(index);
			//判断是否是第一页
			if (index == 1) {
				changeClass("prev");
			} else {
				changeClass();
			}
		}
		return false;
	});

	//下一页
	$("#nextPage").click(function() {
		var obj = $(".currentPage");
		//当前页加一（下一页）
		var index = parseInt(obj.text()) + 1;
		if (index <= $("#page_count").val()) {
			jumpNumber = index;
			LoadingInfo(index);
			savePage(index);
			obj.removeClass("currentPage");
			obj.next().addClass("currentPage");
			//判断是否是最后一页
			if (index == $("#page_count").val()) {
				changeClass("next");
			} else {
				changeClass();
			}
		}
		return false;
	});

	//末页
	$("#lastPage").click(function() {
		jumpNumber = $("#page_count").val();
		if(jumpNumber>1){
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			$("#pageNumber a:eq("+ (parseInt($("#page_count").val()) - 1) + ")").text($("#page_count").val());
			changeClass("next");
		}
		return false;
	});

	//每页显示页数
	$("#showNumber").blur(function(){
		if(isNaN($(this).val())){
			$("#showNumber").val(20);
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if($(this).val().indexOf(".") != -1){
			var index = $(this).val().indexOf(".");
			$("#showNumber").val($(this).val().substr(0,index));
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if(parseInt($(this).val())<=0){
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		//页数没有变化的话，就不要再执行查询
		if(parseInt($(this).val()) != $(this).attr("data-default")){
// 			jumpNumber = 1;//设置每页显示的页数，并且设置到第一页
			$(this).attr("data-default",$(this).val());
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
		}
		return false;
	}).keyup(function(event){
		if(event.keyCode == 13){
			if(isNaN($(this).val())){
				$("#showNumber").val(20);
				jumpNumber = 1;
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
			//页数没有变化的话，就不要再执行查询
			if(parseInt($(this).val()) != $(this).attr("data-default")){
// 				jumpNumber = 1;//设置每页显示的页数，并且设置到第一页
				$(this).attr("data-default",$(this).val());
				//总数据数量
				var total_count = parseInt($(".total-data").attr("data-total-count"));
				//计算用户输入的页数是否超过当前页数
				var curr_count = Math.ceil(total_count/parseInt($(this).val()));
				if( curr_count !=0 && curr_count < jumpNumber){
					jumpNumber = curr_count;//输入的页数超过了，没有那么多
				}
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
		}
		return false;
	});
});

//跳转页面
function JumpForPage(obj) {
	jumpNumber = $(obj).text();
	LoadingInfo($(obj).text());
	savePage($(obj).text());
	$(".currentPage").removeClass("currentPage");
	$(obj).addClass("currentPage");
	if (jumpNumber == 1) {
		changeClass("prev");
	} else if (jumpNumber < parseInt($("#page_count").val())) {
		changeClass();
	} else if (jumpNumber == parseInt($("#page_count").val())) {
		changeClass("next");
	}
}
</script>
		</div>
		
	</section>
</article>
	
<!-- 公共的操作提示弹出框 common-success：成功，common-warning：警告，common-error：错误，-->
<div class="common-tip-message js-common-tip">
	<div class="inner"></div>
</div>

<!--修改密码弹出框 -->
<div id="edit-password" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="width:562px;top:50%;margin-top:-180.5px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>修改密码</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="pwd0" style="width: 160px;"><span class="color-red">*</span>原密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd0" placeholder="请输入原密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="pwd1" style="width: 160px;"><span class="color-red">*</span>新密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd1" placeholder="请输入新密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="pwd2" style="width: 160px;"><span class="color-red">*</span>再次输入密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd2" placeholder="请输入确认密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div style="text-align: center; height: 20px;" id="show"></div>
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" onclick="submitPassword()" style="display:inline-block;">保存</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="ADMIN_CSS/jquery-ui-private.css">
<script>
var platform_shopname= '<?php echo $web_popup_title; ?>';
</script>
<script type="text/javascript" src="ADMIN_JS/jquery-ui-private.js" charset="utf-8"></script>
<script type="text/javascript" src="ADMIN_JS/jquery.timers.js"></script>
<div id="dialog"></div>
<script type="text/javascript">
function showMessage(type, message,url,time){
	if(url == undefined){
		url = '';
	}
	if(time == undefined){
		time = 2;
	}
	//成功之后的跳转
	if(type == 'success'){
		$( "#dialog").dialog({
			buttons: {
				"确定,#51A351": function() {
					$(this).dialog('close');
				}
			},
			contentText:message,
			time:time,
			timeHref: url,
		});
	}
	//失败之后的跳转
	if(type == 'error'){
		$( "#dialog").dialog({
			buttons: {
				"确定,#e57373": function() {
					$(this).dialog('close');
				}
			},
			time:time,
			contentText:message,
			timeHref: url,
		});
	}
}

function showConfirm(content){
	$( "#dialog").dialog({
		buttons: {
			"确定": function() {
				$(this).dialog('close');
				return 1;
			},
			"取消,#e57373": function() {
				$(this).dialog('close');
				return 0;
			}
		},
		contentText:content,
	});
}
</script>
<script src="ADMIN_JS/ns_common_base.js"></script>
<script src="__STATIC__/blue/js/ns_common_blue.js"></script>
<script>
$(function(){
	//顶部导航管理显示隐藏
	$(".ns-navigation-title>span").click(function(){
		$(".ns-navigation-management").slideUp(400);
	});
	
	$(".js-nav").toggle(function(){
		$(".ns-navigation-management").slideDown(400);
	},function(){
		$(".ns-navigation-management").slideUp(400);
	});
	
	//搜索展开
	$(".ns-search-block").hover(function(){
		if($(this).children(".mask-layer-search").is(":hidden")) $(this).children(".mask-layer-search").fadeIn(300);
	},function(){
		if($(this).children(".mask-layer-search").is(":visible")) $(this).children(".mask-layer-search").fadeOut(300);
	});
	
	$(".ns-base-tool .ns-help").hover(function(){
		if($(this).children("ul").is(":hidden")) $(this).children("ul").fadeIn(250);
	},function(){
		if($(this).children("ul").is(":visible")) $(this).children("ul").fadeOut(250);
	});
	
});

function addFavorite() {
	var url = window.location;
	var title = document.title;
	var ua = navigator.userAgent.toLowerCase();
	if (ua.indexOf("360se") > -1) {
		alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
	}else if (ua.indexOf("msie 8") > -1) {
		window.external.AddToFavoritesBar(url, title); //IE8
	}
	else if (document.all) {
		try{
			window.external.addFavorite(url, title);
		}catch(e){
			alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
		}
	}else if (window.sidebar) {
		window.sidebar.addPanel(title, url, "");
	}else {
		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	}
}

</script>

<style>
.modal-body{max-height:none;}
.editprice-input{width:100px;}
textarea{width: 350px;}
</style>
<!-- 模态框（Modal） -->
<div id="edit-price" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 650px;overflow: overlay;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right: 10px;">×</button>
		<h3>修改价格</h3>
	</div>
	<div class="modal-body">
		<table class="table table-striped table-main table-order-header">
			<colgroup>
				<col style="width: 40%;">
				<col style="width: 20%;">
				<col style="width: 25%;">
			</colgroup>
			<tbody>
				<tr>
					<td>商品信息</td>
					<td>商品清单</td>
					<td>
						<div class="editprice-tiptxt">涨价或减价<i class="icon-tip"></i>
							<p class="text-tip">-表示减价<i class="icon-down-pic"></i></p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered table-order-list">
			<colgroup>
				<col style="width: 40%;">
				<col style="width: 20%;">
				<col style="width: 25%;">
			</colgroup>
			<tbody id="OrderCommodity"></tbody>
		</table>
		<ul class="edit-price-amountpay">
			<li>
				<span class="amountpay-label">商品总价：</span>
				<span class="amountpay-price" id="goodsmoney"></span>元&nbsp;&nbsp;&nbsp;
				<span class="amountpay-label">商品优惠：</span>
				<span class="amountpay-price" id="discountmoney"></span>元
			</li>
			<li>
				<div>
					实收款： <span class="amountpay-price reality-price" id="changeTotal"></span>元
					<input type="hidden" id="hiedchangeTotal" />
				</div>
			</li>
		</ul>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" onclick="updPrice()" id="butSubmit">保存</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
	</div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade hide" id="Memobox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;left:45%;top:30%;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>备注信息</h3>
			</div>
			<div class="set-style">
				<dl>
					<dt><span class="required">*</span>备注:</dt>
					<dd>
						<p>
							<textarea rows="3" cols="20" id="memo"></textarea>
						</p>
						<p class="error">请输入备注</p>
					</dd>
				</dl>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="addMemoAjax()">保存</button>
			</div>
		</div>
	</div>
</div>
<script>
function operation(operation_type, order_id){
	if(operation_type == 'pay'){
		orderOffLinePay(order_id);//线下支付
	}else if(operation_type == 'complete'){
		orderComplete(order_id);//交易完成
	}else if(operation_type == 'close'){
		orderClose(order_id);//交易关闭
	}else if(operation_type == 'adjust_price'){
		modifyPrice(order_id);//修改价格
	}else if(operation_type == 'seller_memo'){
		orderSellerMemo(order_id);//备注
	}else if(operation_type == 'delete_order'){
		delete_order(order_id);//删除订单
	}
}

//全选
function CheckAll(event){
	var checked = event.checked;
	$(".table-class tbody input[type = 'checkbox']").prop("checked",checked);
}

function orderOffLinePay(order_id){
	$( "#dialog" ).dialog({
		buttons: {
			"确定": function() {
				$.ajax({
					type : "post",
					url : "<?php echo __URL('ADMIN_MAIN/order/orderofflinepay'); ?>",
					data : {'order_id':order_id},
					success : function(data) {
						if (data["code"] > 0) {
							showMessage('success', data["message"],window.location.reload());
						}else{
							showMessage('error', data["message"]);
						}
					}
				});
				$(this).dialog('close');
			},
			"取消,#e57373": function() {
				$(this).dialog('close');
			},
		},
		contentText:"确定线下支付吗？",
	});
}

function orderComplete(order_id){
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/order/ordercomplete'); ?>",
		data : {'order_id':order_id},
		success : function(data) {
			if (data["code"] > 0) {
				showMessage('success', data["message"],window.location.reload());
			}else{
				showMessage('error', data["message"]);
			}
		}
	});
}

function orderClose(order_id){
	$( "#dialog" ).dialog({
		buttons: {
			"确定": function() {
			$.ajax({
				type : "post",
				url : "<?php echo __URL('ADMIN_MAIN/order/orderclose'); ?>",
				data : {"order_id" : order_id},
				success : function(data) {
					if(data["code"] > 0 ){
						LoadingInfo(1);
						showMessage('success', data["message"],window.location.reload());
					}
				}
			})
			$(this).dialog('close');
			},
			"取消,#e57373": function() {
				$(this).dialog('close');
			},
		},
		contentText:"确定关闭订单吗？",
	});
}

//修改价格
function modifyPrice(order_id){
	$("#butSubmit").val(order_id);
	var str = "";
	var Total = 0.00;
	var Count = 0;
	$.ajax({
		type: "post",
		url: "<?php echo __URL('ADMIN_MAIN/order/getordergoods'); ?>",
		data: { "order_id": order_id },
		dataType: "json",
		async: false,
		success: function (jsonData) {
			var Subtotal = 0.0;
			var order_info = jsonData[1];
			jsonData = jsonData[0];
			for (var i = 0 ; i < jsonData.length; i++) {
				Price = (jsonData[i].price * 1);
				Count = (jsonData[i].num * 1);
				Subtotal = parseFloat(Price) * parseInt(Count);//单商品总价
				Total += parseFloat(Subtotal * 1);
				str += "<tr>";
				str += "<td>";
				str += "<div class='product-img'><img src='"+__IMG(jsonData[i]['picture_info']['pic_cover_micro']) + "'></div>";
				str += "<div class='product-infor'>";
				//原总金额
				var item_now_money = parseFloat(jsonData[i].price*jsonData[i].num)+parseFloat(jsonData[i].adjust_money);
				str += "<input type='hidden' id='total"+jsonData[i].order_goods_id+"' value='"+item_now_money*(item_now_money/parseFloat(jsonData[i].goods_money))+"'>";
				str += "<a class='name' href="+__URL('APP_MAIN?id='+jsonData[i].goods_id)+" target='_blank'>" + jsonData[i].goods_name + "</a>";
				str += "<p class='specification'><span>规格:" + jsonData[i].sku_name + "</span></p>";
				str += "<div class='div-flag-style'>";
				str += "</div>";
				str += "</div>";
				str += "</td>";
				str += "<td>";
				str += "<div class='cell'><span name='Commoditymark' count='" + jsonData[i].num + "' id='" + jsonData[i].goods_id + "' dir='" + jsonData[i].price + "' value='" + jsonData[i].price + "'>￥" + jsonData[i].price + "</span></div>";
				str += "<div class='cell' id='Count" + jsonData[i].goods_id + "' value='" + jsonData[i].num + "'>" + jsonData[i].num + "件</div>";
				str += "</td>";
				str += "<td>";
				str += "<div class='editprice-discount'><input  type='hidden' id='productPrice" + jsonData[i].order_goods_id + "' value='" + jsonData[i].price + "'><input type='hidden' id='count" + jsonData[i].goods_id + "' value='" + jsonData[i].num + "'>";
				str += "<div class='editprice-minus'><input name='caculatePrice'  onchange=\"caculatePrice()\" id='" + jsonData[i].order_goods_id + "' value='"+jsonData[i].adjust_money+"'  class='editprice-input price' type='number'  placeholder='0'  /></div>";
				str += "</td>"; 
				if (i == 0) {
					str += "<input type='hidden' id='hidorderNumber' value='" + jsonData[i].order_id + "'>";
					str += "<input type='hidden' id='goodsmoneyhidden' value=''>";
				}
				str += "</tr>";
				$("#OrderCommodity").html(str);
				$("#goodsmoney").html(order_info.goods_money);
				$("#goodsmoneyhidden").val(Total);
				var discount_money =order_info.point_money*1.00+order_info.coupon_money*1.00+order_info.user_money*1.00+order_info.promotion_money*1.00;
				$("#discountmoney").html(discount_money);
				$("#changeTotal").html(order_info.pay_money);
				$("#hiedchangeTotal").html(Total);
			}
			$('#edit-price').modal('show');
		}
	});
}

//重新计算
function caculatePrice(){
	//调整金额
	var price = 0.00;
	$("input[name = 'caculatePrice']").each(function(i){
		if(0 == i){
			price = parseFloat($(this).val());
		}else{
			price = parseFloat($(this).val()) + parseFloat(price);
		}
	});
	var goods_money  = $("#goodsmoneyhidden").val();
	new_goods_money = (parseFloat(price)+parseFloat(goods_money)).toFixed(2);
	if(new_goods_money <0){
		$(".price").val(-goods_money);
		caculatePrice();
	}
	$("#goodsmoney").html(new_goods_money); 
	// 获取优惠金额
	var discountmoney = $("#discountmoney").html();
	//计算实收款
	new_hiedchangeTotal = (parseFloat(new_goods_money)-parseFloat(discountmoney)).toFixed(2);
	$("#changeTotal").html(new_hiedchangeTotal);
}

//保存修改的价格
function updPrice(){
	var order_id = $("#hidorderNumber").val();
	var order_goods_id_adjust_array = '';
	var shipping_fee = 0;//运费0
	$("input[name = 'caculatePrice']").each(function(i){
		if(0 == i){
			order_goods_id_adjust_array = $(this).attr('id')+','+$(this).val();
		}else{
			order_goods_id_adjust_array += ';'+$(this).attr('id')+','+$(this).val();
		}
	});
	if(parseFloat($("#changeTotal").text()).toFixed(2) == 0.00){
		showTip("实收款最小0.01元","warning");
		return;
	}
	$.ajax({
		type: "post",
		url: "<?php echo __URL('ADMIN_MAIN/order/orderadjustmoney'); ?>",
		data: { "order_id": order_id, "order_goods_id_adjust_array":order_goods_id_adjust_array, "shipping_fee":shipping_fee},
		dataType: "json",
		async: false,
		success: function (data) {
		if (data["code"] > 0) {
				showMessage('success', data["message"],window.location.reload());
				$("#edit-price").modal("hide");
			}else{
				showMessage('error', data["message"]);
			}
		}
	});
}

//查看订单备注
function orderSellerMemo(order_id){
	$.ajax({
		type : 'post',
		url : "<?php echo __URL('ADMIN_MAIN/order/getordersellermemo'); ?>",
		data : { "order_id" : order_id },
		success : function(res){
			$("#order_id").val(order_id);
			$("#memo").val(res);
			$("#Memobox").modal("show");
		}
	});
}

//修改备注
function addMemoAjax(){
	var order_id = $("#order_id").val();
	var memo = $("#memo").val();
	if(memo == ''){
		$(".error").css("display","block");
		return false;
	}
	$.ajax({
		url: "<?php echo __URL('ADMIN_MAIN/order/addmemo'); ?>",
		data: { "order_id": order_id,"memo":memo },
		type : "post",
		success: function(data) {
			if (data.code > 0) {
				showMessage('success','保存成功');
				location.reload();
			}else{
				showMessage('error','保存失败');
			}
		}
	});
}

//删除订单
function delete_order(order_id){
	$( "#dialog" ).dialog({
		buttons: {
			"确定": function() {
			$.ajax({
				type : "post",
				url : "<?php echo __URL('ADMIN_MAIN/order/deleteOrder'); ?>",
				data : {"order_id" : order_id.toString()},
				success : function(data) {
					if(data["code"] > 0 ){
						LoadingInfo(1);
						showMessage('success', data["message"],window.location.reload());
					}
				}
			})
			$(this).dialog('close');
			},
			"取消,#e57373": function() {
				$(this).dialog('close');
			},
		},
		contentText:"确定要删除订单吗？",
	});
}
</script>
<!-- 订单打印 -->
<script>
//打印订单
$("#PrintOrder").click(function(){
	var BatchSend = new Array();
	$("input[name='sub']:checked").each(function () {
		BatchSend.push($(this).val());
	});
	if (BatchSend.length == 0) {
		showTip("请先勾选文本框再进行批量操作！",'warning');
	}else{
		window.open(__URL("ADMIN_MAIN/order/printVirtualOrder?print_order_ids=" + BatchSend.toString()));
	}
})
</script>
<script type="text/javascript">
$(window).scroll(function(){
	var scrollTop = $(window).scrollTop();
	if(scrollTop > 140){
		$("nav.order-nav").addClass("to-fixed");
	}else{
		$("nav.order-nav").removeClass("to-fixed");
	}
})
$(function () { 
	$("[data-toggle='popover']").popover();
});
function searchData(){
	LoadingInfo(1);
}

function LoadingInfo(page_index) {
	var start_date = $("#startDate").val();
	var end_date = $("#endDate").val();
	var order_no = $("#orderNo").val();
	var receiver_mobile = $("#receiverMobile").val();
	var order_status = $("#order_status").val();
	var payment_type = $("#payment_type").val();
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/order/virtualorderlist'); ?>",
		data : {
			"page_index" : page_index,
			"page_size" : $("#showNumber").val(),
			"start_date" : start_date,
			"end_date" : end_date,
			"order_no" : order_no,
			"order_status" : order_status,
			"receiver_mobile" : receiver_mobile,
			"order_status" : order_status,
			"payment_type" : payment_type
		},
		success : function(data) {
			var html = '';
			if (data["data"].length > 0) {
				for (var i = 0; i < data["data"].length; i++) {
					var out_trade_no = data["data"][i]["out_trade_no"];//交易号
					var order_id = data["data"][i]["order_id"];//订单id
					var order_no = data["data"][i]["order_no"];//订单编号
					var create_time = timeStampTurnTime(data["data"][i]["create_time"]);//下单时间
					var pic_cover_micro = data["data"][i]["order_item_list"][0]["picture"]['pic_cover_micro'];//商品图
					var goods_id = data["data"][i]["order_item_list"][0]["goods_id"];//商品id
					var goods_name = data["data"][i]["order_item_list"][0]["goods_name"];
					var sku_name = data["data"][i]["order_item_list"][0]["sku_name"];//商品sku
					var price = data["data"][i]["order_item_list"][0]["price"];//商品价格
					var num = data["data"][i]["order_item_list"][0]["num"];//购买数量
					var order_money = data["data"][i]["order_money"];//订单金额
					var shipping_money = data["data"][i]["shipping_money"];//运费
					var seller_memo = data["data"][i]["seller_memo"];//订单备注
					var goods_code = data["data"][i]["order_item_list"][0]["code"];
					html += '<tr class="title-tr">';
					html += '<td colspan="7"><input id="'+out_trade_no+'" type="checkbox" value="'+order_id+'" name="sub">';
					html +='<span>订单编号：'+order_no+' 交易号：'+out_trade_no+'</span><span>下单时间：'+create_time+'</span>';
					if(seller_memo.length == 0){
						html += '</td></tr>';
					}else{
						html += '<span title="查看备注"><i class="fa fa-flag" aria-hidden="true" style="color:red;" title="查看备注" onclick="operation(\'seller_memo\','+data["data"][i]["order_id"]+')"></i></span></td></tr>';
					}
					html += '<tr><td>';
					html += '<div class="product-img"><img src="'+__IMG(pic_cover_micro)+'"></div>';
					html += '<div class="product-infor">';
					html += '<a href="'+__URL('SHOP_MAIN/goods/goodsinfo?goodsid='+goods_id)+'" target="_blank">'+goods_name+'</a>';
					if(sku_name != null && sku_name != ""){
						html += '<p class="specification" style="margin-bottom: 0px;"><span style="color:#8e8c8c;font-size:12px;">'+sku_name+'</span></p>';
					}
					if(goods_code != null && goods_code != ""){
						html += '<p class="specification"><span style="color:#8e8c8c;font-size:12px;">编码&nbsp;&nbsp;'+goods_code+'</span></p></div>';
					}
					
					html += '</div></td>';

					//订单数量大于1个，调整样式
					if(data["data"][i]["order_item_list"].length>1){
						html += '<td>';
						html += '<div class="cell" style="display: inline-block;"><span>'+price+'元</span></div>';
						html += '<div class="cell" style="display: inline-block;float:right;">'+num+'件</div>';
					}else{
						html += '<td style="text-align:center;">';
						html += '<div class="cell" style="display: inline-block;"><span>'+price+'元</span></div>';
						html += '<div class="cell">'+num+'件</div>';
					}
					//调价
					if(data["data"][i]["order_item_list"][0]['adjust_money'] != 0){
						var adjust_money = data["data"][i]["order_item_list"][0]["adjust_money"];//调教
						html += '<div class="cell" style="display: inline-block;"><span>(调价：'+adjust_money+'元)</span></div>';
					}
					if(	data["data"][i]["order_item_list"][0]['refund_status'] != 0){
						//退款
						var order_goods_id = data["data"][i]["order_item_list"][0]["order_goods_id"];//订单项id
						var status_name = data["data"][i]["order_item_list"][0]["status_name"];//状态

						//订单数量大于1个，调整样式
						if(data["data"][i]["order_item_list"].length>1){
							html +='<a href="'+__URL('ADMIN_MAIN/order/orderrefunddetail?itemid='+order_goods_id)+'" style="margin:5px 0 10px 0;display:block;text-align:center;">'+status_name+'</a>';
						}else{
							html +='<a href="'+__URL('ADMIN_MAIN/order/orderrefunddetail?itemid='+order_goods_id)+'" style="margin:5px 0 10px 0;display:block;">'+status_name+'</a>';
						}
						for(var m = 0; m < data["data"][i]["order_item_list"][0]["refund_operation"].length; m++){
							var operation_type = data["data"][i]["order_item_list"][0]["refund_operation"][m]['no'];//选项类型
							var color = data["data"][i]["order_item_list"][0]["refund_operation"][m]['color'];
							var order_goods_id = data["data"][i]["order_item_list"][0]['order_goods_id'];//订单项id
							var refund_require_money = data["data"][i]['order_item_list'][0]["refund_require_money"];//退款金额
							var name = data["data"][i]["order_item_list"][0]["refund_operation"][m]['name'];//退款状态
							html += '<a style="display:block;margin-bottom:5px;color:'+color+';text-align:center;" href="javascript:refundOperation(\''+operation_type+'\','+order_id+','+order_goods_id+','+refund_require_money+')">'+name+'</a>';
						}
					}
					html += '</td>';
					
					var row=1;//订单数量，用于设置跨行
					if(data["data"][i]["order_item_list"].length!=null)
					{
						row=data["data"][i]["order_item_list"].length;
					}
					html += '<td rowspan="'+row+'" style="text-align:center"><div class="cell">'+data["data"][i]["user_name"]+'<br/>';
					
					html += '<i class="'+data["data"][i]["order_from_tag"]+'" style="color:#666;"><i></div></td>';
					html += '<td rowspan="'+row+'" style="text-align:center">';
					
					//联系方式
					html += '<div><span class="expressfee">'+data["data"][i]["receiver_mobile"]+'</span>';
					html += '</div></td>';
					
					html += '<td rowspan="'+row+'" style="text-align:center">';
					html += '<div class="cell"><b class="netprice" style="color:#666;">￥'+order_money+'</b><br/>';
					html += '<span class="expressfee">'+data["data"][i]["pay_type_name"]+'</span></div></td>';
					
					html += '<td rowspan="'+row+'"><div class="business-status" style="text-align:center">'+data["data"][i]["status_name"]+'<br></div></td>';
					html += '<td rowspan="'+row+'" style="text-align:center;">';
					html += '<a style="display:block;margin-bottom:5px;" href="'+__URL('ADMIN_MAIN/order/virtualorderdetail?order_id='+order_id)+'">订单详情</a>';

					if(data["data"][i]["operation"] != ''){
						for(var m = 0; m < data["data"][i]["operation"].length; m++){
							if(data["data"][i]["operation"][m]['no'] == "seller_memo"){
								if(seller_memo == ''){
									html += '<a style="display:block;margin-bottom:5px;color:'+data["data"][i]["operation"][m]["color"]+'" href="javascript:operation(\''+data["data"][i]["operation"][m]['no']+'\','+data["data"][i]["order_id"]+')" >'+data["data"][i]["operation"][m]['name']+'</a>';
								}
							}else{
								html += '<a style="display:block;margin-bottom:5px;color:'+data["data"][i]["operation"][m]["color"]+'" href="javascript:operation(\''+data["data"][i]["operation"][m]['no']+'\','+data["data"][i]["order_id"]+')" >'+data["data"][i]["operation"][m]['name']+'</a>';
							}
						}
					}
					html +='</td></tr>';
					//循环订单项
					//前边已经加载过一次了，所以从第二次开始循环
					for(var j = 1; j < data["data"][i]["order_item_list"].length; j++){
						var pic_cover_micro = data["data"][i]["order_item_list"][j]["picture"]['pic_cover_micro'];//商品图
						var goods_id = data["data"][i]["order_item_list"][j]["goods_id"];//商品id
						var goods_name = data["data"][i]["order_item_list"][j]["goods_name"];//商品名称
						var sku_name = data["data"][i]["order_item_list"][j]["sku_name"];//sku名称
						var price = data["data"][i]["order_item_list"][j]["price"];//价格
						var num = data["data"][i]["order_item_list"][j]["num"];//购买数量
						
						var goods_code = data["data"][i]["order_item_list"][j]["code"];
						html += '<tr calss="no-rightborder"><td colspan="1">';
						html += '<div class="product-img"><img src="'+__IMG(pic_cover_micro)+'"></div>';
						html += '<div class="product-infor">';
						html += '<a class="name" href="'+__URL('SHOP_MAIN/goods/goodsinfo?goodsid='+goods_id)+'" target="_blank">'+goods_name+'</a>';
						if(sku_name != null && sku_name != ''){
							html += '<p class="specification" style="margin-bottom: 0px;"><span style="color:#8e8c8c;font-size:12px;">'+sku_name+'</span></p>';
						}
						if(goods_code != null && goods_code != ''){
							html += '<p class="specification"><span style="color:#8e8c8c;font-size:12px;">'+goods_code+'</span></p></div>';
						}
						html += '</div></td>';

						//只给中间的商品加
						if((j+1) != data["data"][i]["order_item_list"].length){
							html += '<td style="border-left:0px solid #fff;border-bottom:1px solid #e5e5e5;">';//商品信息与商品清单的分割线
						}else{
							html += '<td style="border-left:0px solid #fff;">';//商品信息与商品清单的分割线
						}
						
						html += '<div class="cell" style="display: inline-block;"><span>'+price+'元</span></div>';
						html += '<div class="cell" style="display: inline-block;float:right">'+num+'件</div>';
						//调价
						if(data["data"][i]["order_item_list"][j]['adjust_money'] != 0){
							var adjust_money = data["data"][i]["order_item_list"][j]["adjust_money"];
							html += '<div class="cell" style="display: inline-block;"><span>(调价：'+adjust_money+'元)</span></div>';
						}
						if(data["data"][i]["order_item_list"][j]['refund_status'] != 0){
							//退款
							var order_goods_id = data["data"][i]["order_item_list"][j]["order_goods_id"];//订单项id
							var status_name = data["data"][i]["order_item_list"][j]["status_name"];//订单状态
							html +='<br><a href="'+__URL('ADMIN_MAIN/order/orderrefunddetail?itemid='+order_goods_id)+'" style="margin:5px 0 10px 0;display:block;text-align:center;">'+status_name+'</a>';
							for(var m = 0; m < data["data"][i]["order_item_list"][j]["refund_operation"].length; m++){
								var operation_type = data["data"][i]["order_item_list"][j]["refund_operation"][m]['no'];//选项类型
								var color = data["data"][i]["order_item_list"][j]["refund_operation"][m]['color'];
								var order_goods_id = data["data"][i]["order_item_list"][j]['order_goods_id'];//订单项id
								var refund_require_money = data["data"][i]['order_item_list'][j]["refund_require_money"];//退款金额
								var name = data["data"][i]["order_item_list"][j]["refund_operation"][m]['name'];//退款状态
								html += '<a style="display:block;margin-bottom:5px;color:'+color+';text-align:center;" href="javascript:refundOperation(\''+operation_type+'\','+order_id+','+order_goods_id+','+refund_require_money+')" >'+name+'</a>';
							}
						}
						html += '</td>';
						html += '</tr>';
					}
				}
			} else {
				html += '<tr align="center"><td colspan="9">暂无符合条件的订单</td></tr>';
			}
			$(".table-class tbody").html(html);
			initPageData(data["page_count"],data['data'].length,data['total_count']);
			$("#pageNumber").html(pagenumShow(jumpNumber,$("#page_count").val(),<?php echo $pageshow; ?>));
		}
	});
}

function addmemo(order_id,memo){
	$("#order_id").val(order_id);
	$("#memo").val(memo);
	$("#Memobox").modal("show");
}
/**
 * 订单数据导出
 */
function dataExcel(){
	var start_date = $("#startDate").val();
	var end_date = $("#endDate").val();
	var order_no = $("#orderNo").val();
	var receiver_mobile = $("#receiverMobile").val();
	var order_status = $("#order_status").val();
	var payment_type = $("#payment_type").val();
	var order_ids= new Array();
	$(".table-class tbody input[type = 'checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			order_ids.push($(this).val());
		}
	});
	window.location.href=__URL("ADMIN_MAIN/order/virtualOrderDataExcel?start_date="+start_date+"&end_date="+end_date+"&order_no="+order_no+"&order_status="+order_status+"&receiver_mobile="+receiver_mobile+"&payment_type="+payment_type+"&order_ids="+order_ids.toString()); 	
}

/**
* 批量删除已关闭订单
*/
function batchDelete(){
	var order_ids= new Array();
	$(".table-class tbody input[type = 'checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			order_ids.push($(this).val());
		}
	});
	if(order_ids.length ==0){
		$( "#dialog" ).dialog({
			buttons: {
				"确定,#e57373": function() {
					$(this).dialog('close');
				}
			},
			contentText:"请选择需要操作的记录",
			title:"消息提醒",
		});
		return false;
	}
	delete_order(order_ids);
}
// 点击显示更多搜索
$(".more_search").click(function(){
	$("#more_search").slideToggle();
})
</script>

</body>
</html>