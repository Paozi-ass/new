<!DOCTYPE html>
<html>
<head>
	<title>学生列表</title>
	<meta charset="utf-8">
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
		}

		.wrap{
			width: 80%;
			margin: 10px auto;
		}
		table{
			width: 100%;
			margin: 20px auto;
		}

		table tr th,table tr td{
			border: 1px solid #ddd;
			height: 30px;
			font-size: 16px;
		}

		#addBtn{
			display: block;
			width: 200px;
			height: 40px;
			background: #539a30;
			border: none;
			outline: none;
			text-align: center;
			text-decoration: none;
			line-height: 40px;
			color: #fff;
			margin-top: 10px;
			border-radius: 4px;
		}

		#addBtn2{
			display: block;
			width: 200px;
			height: 40px;
			background: #539a30;
			border: none;
			outline: none;
			text-align: center;
			text-decoration: none;
			line-height: 40px;
			color: #fff;
			margin-top: -40px;
			margin-left: 210px;
			border-radius: 4px;
		}

		.pagination li{
			float: left;
			padding: 10px;
			list-style: none;
			border: 1px solid #ddd;
			margin-left: 10px;
		}

	</style>
</head>
<body>
<div class="wrap">

<h1>学生信息</h1>
<a href="add" id="addBtn">添加学生信息</a>
<a href="#" id="addBtn2" class="del">批量删除</a>
<form action="index" method="post">
@csrf
	<input type="text" name="name" placeholder="根据名字搜索" >
	<input type="text" name="age" placeholder="根据年龄搜索" >
	<select name="order" id="">
		<option value="">==请选择==</option>
		<option value="1">正序</option>
		<option value="2">倒序</option>
	</select>
	<select name="ziduan" id="">
		<option value="">==请选择==</option>
		<option value="name">名字</option>
		<option value="age">年龄</option>
		<option value="create_at">添加时间</option>
	</select>
	<input type="submit" value="查询">
</form>
<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><input type="checkbox" class="ches"></th>
			<th>序号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>添加时间</th>
			
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach($data as $student) : ?>

		<tr id="<?=$student->id?>">
			<th><input type="checkbox" class="che"></th>
			<td><?=$student->id?></td>
			<td><?=$student->name?></td>
			<td><?=$student->sex?></td>
			<td><?=$student->age?></td>
			<td><?=$student->create_at?></td>
			
			<td><a href="">查看</a> <a href="edit?id=<?=$student->id?>">修改</a> <a href="delete?id=<?=$student->id?>">删除</a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
{{ $data->appends($query)->links() }}
</div>
</body>
</html>
<script src='/jq.js'></script>
<script>
$(document).on('click','.ches',function(){
	// alert(111);
	var sta = $(this).prop('checked');
	$('.che').prop('checked',sta);

})
 $(document).on('click','.del',function(){
		var box = $('.che:checked');
		var id ='';
		box.each(function(index){
			id+=$(this).parents("tr").attr('id')+',';
		});
		id=id.substr(0,id.length-1);
		console.log(id);
		if(id==''){
			alert('请至少选择一个来删除');
		}else{
			if(window.confirm('你确认删除？')){
				location.href = "delete?id="+id;
			}
			
		}
		
	})
	
</script>