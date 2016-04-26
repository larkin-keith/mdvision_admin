@extends('layouts.home')

@section('content')
<!--contact-starts-->
	<style type="text/css">
		#allmap {width: 100%;height: 300px;}
	</style>
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<div class="col-md-4 contact-left heading">
					<h1>联系我们</h1>
					<p>地址 ：{!! $contact ? $contact->address : '' !!}</p>
					<p>电话 ：{!! $contact ? $contact->phone : '' !!}</p>
					<p>邮箱 ：{!! $contact ? $contact->email : '' !!}</p>
				</div>
				<div class="col-md-8 contact-right">
					<div id="allmap"></div>
					<script type="text/javascript">
							//百度地图API功能
							function loadJScript() {
								var script = document.createElement("script");
								script.type = "text/javascript";
								script.src = "http://api.map.baidu.com/api?v=2.0&ak=28ebdd5aad9c3fe2846c67770191719d&callback=init";
								document.body.appendChild(script);
							}
							function init() {
								var map = new BMap.Map("allmap");            // 创建Map实例
								var point = new BMap.Point(114.036935,22.616857); // 创建点坐标
								map.centerAndZoom(point,15);                 
								map.enableScrollWheelZoom();                 //启用滚轮放大缩小
								var marker = new BMap.Marker(point);// 创建标注
								map.addOverlay(marker);             // 将标注添加到地图中
								marker.disableDragging();           // 不可拖拽	
							}  
							window.onload = loadJScript;  //异步加载地图

					</script>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- <div class="contact-bottom">
				<div class="col-md-4 contact-left heading">
					<h2>CONTACT FORM</h2>
					<p>Lorem ipsum dolsit met consetuer adipiscing dolor.</p>
				</div>
				<div class="col-md-8 contact-right">
					<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" />
					<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
					<textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message..</textarea>
						<div class="submit-btn">
							<form>
								<input type="submit" value="SUBMIT">
							</form>
						</div>
				</div>
				<div class="clearfix"></div>
			</div> -->
		</div>
	</div>
	<!----contact-end---->
@endsection