<html>
	<head>
		<title>更改密碼</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>
	<body>
	
		<form method="post" action="login.php">
			請輸入帳號:<input type="text" name="Account"><br>
			請輸入密碼:<input type="password" name="Password"><br>
			<input type="submit" value="送出"><br>
		</form>
		<?php
		$link=mysqli_connect("127.0.0.1","root","s7766006","test");
		if($link){echo "成功連接資料庫<br>";}
		mysqli_query($link,"SET NAMES 'utf8'");
		if(isset($_POST['Account'])&&isset($_POST['Password']))
		{
			$re=0;
			$aaa=$_POST['Account'];
			$ppp=$_POST['Password'];
			$sql="SELECT Account FROM `member`";
			$result=mysqli_query($link,$sql);
			while($row=mysqli_fetch_array($result,MYSQLI_NUM))
				{
					if($row[0]==$_POST['Account']){$re++;}
				}
			mysqli_free_result($result);
			if($re>0)
				{
					$sql="SELECT Password FROM `member`WHERE Account='$aaa'";
					$result=mysqli_query($link,$sql);
					if(!$result)
					{
						echo ("Error: ".mysqli_error($link));
						exit();
					}
					while($row=mysqli_fetch_array($result,MYSQLI_NUM))
					{
						if($row[0]==$ppp){echo $_POST['Account']."OK!";}
						else{echo "密碼錯誤";}
					}
					
				}
			else{echo $_POST['Account']."查無此帳號,請重新輸入";}
			
			
		}
		mysqli_close($link);
		
		?>
	</body>


</html>