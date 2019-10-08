<!DOCTYPE html>
<html>
<head>
	<title>添加学生信息</title>
	<meta charset="utf-8">
	<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
		}

		.wrap{
			width: 80%;
			margin: 0px auto;
		}

		table{
			width: 100%;
			margin-top: 20px;
		}

		table tr td{
			border: 1px solid #ddd;
			height: 50px;
			line-height: 50px;
			padding-left: 10px;
		}

		input{
			height: 30px;
			line-height: 30px;
			width: 300px;
			font-size: 16px;
			padding: 5px;
		}

		select{
			height: 30px;
		}

		button{
			width: 200px;
			height: 40px;
			line-height: 40px;
			background-color: #ef6763;
			border: none;
			outline: none;
			text-align: center;
			color: #fff;
			border-radius: 4px;
		}
	</style>
	<script type="text/javascript">
		
		function post($obj){

			// 阻止默认行为
			event.preventDefault();

			var name = $obj.name.value;
			var sex = $obj.sex.value;
			var age = $obj.age.value;

			if(name=="" || sex=="" || age==""){
				alert("信息填写不完整!");
				return false;
			}

			// 使用ajax提交
			$obj.submit();
		}
	</script>
</head>
<body>
<div class="wrap">
  
 <h1>添加学生信息</h1>
 <form action="add" method="post" onsubmit="javascript:post(this);">
 	@csrf
 	<table cellpadding="0" cellspacing="0">

 		<tr>
 			<td>姓名</td>
 			<td><input type="text" name="name"></td>
 		</tr>
 		<tr>
 			<td>性别</td>
 			<td>
 			<select name="sex">
 				<option value="男">男</option>
 				<option value="女">女</option>
 				<option value="保密">保密</option>	
 			</select>
 			</td>
 		</tr>
 		<tr>
 			<td>年龄</td>
 			<td><input type="number" name="age"></td>
 		</tr>

 		<tr> 
 		<td colspan="2">
 			
 		<button type="submit">添加</button>
 		</td>
 		</tr>
 	</table>

 </form>

</div>
</body>
</html>