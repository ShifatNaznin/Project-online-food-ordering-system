<?php

///-----------------------to read all the students informations-----------------------------------
	
///to get a specific students info URL: http://localhost:port/RESTApis/students.php?id=12
///to get all the students info URL: http://localhost:port/RESTApis/students.php?id=all

if($_SERVER['REQUEST_METHOD']=="GET"){
	///setting necessary CORS headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	if(isset($_GET['fid'])){
		///receiving the parameter value
		$fid=$_GET['fid'];

		///connecting to database
		try{
			$conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sqlquery="SELECT * FROM reg_form";
			if($fid != "all") $sqlquery.=" where fid=$fid";

			$pdostmt=$conn->query($sqlquery);
			if($pdostmt->rowCount()>0){
				$table=$pdostmt->fetchAll();

				http_response_code(200);
				echo json_encode($table);
			}
			else{
				///no data found for the given id value
				http_response_code(400);
				
				echo json_encode(array("message"=>"Invalid id"));
			}

		}
		catch(PDOException $ex){
			///database or query error
			http_response_code(503);
				
			echo json_encode(array("message"=>"Service Unavailable"));
		}
	}
	else{
		///no id value is set error
		http_response_code(404);
				
		echo json_encode(array("message"=>"id parameter not found"));
	}
}

///setting header informations for preflighted requests like: POST, PUT, DELETE etc.
if($_SERVER['REQUEST_METHOD']=="OPTIONS"){
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type");
	header("Access-Control-Allow-Max-Age: 86400");
}

//---------------------to insert a new students data ------------------------------------------------

///request URI: POST http://localhost:port/RESTApis/students.php

///data is sent as raw data by setting the request Content-Type as application/json and the data is received in the server side through file_get_contents('php://input') method calling

///sample data to send with the request: { "name" : "new user 1", "email": "newuser@gmail.com", "dob" : "1993-01-01", "address" : "dhaka, bangladesh"}


if($_SERVER['REQUEST_METHOD']=='POST'){
	///setting the headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	///receiving the entity body of HTTP requests
	$jsonstring=file_get_contents("php://input");
	
	$phparray=json_decode($jsonstring,true);
	
	///connecting to database
	try{
		$conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		///automatically setting the next available id to the next student
		///next available id = current maxid + 1
		$maxidquery="SELECT MAX(fid) FROM reg_form";
		$table=$conn->query($maxidquery)->fetchAll();
		
		$newid=$table[0][0]+1;
		$vname=$phparray['name'];
		$vphone=$phparray['phone'];
		$vusername=$phparray['username'];
		 $vemail=$phparray['email'];
		$vpass=$phparray['password'];
		$vrepass=$phparray['repass'];
		
		$insertquery="INSERT INTO reg_form VALUES($newid,'$vname','$vphone','$vusername','$vemail','$vpass','$vrepass')";
		$conn->exec($insertquery);
		
		http_response_code(201);
		echo json_encode(array("message"=>"added successfully", "fid"=>$newid));
		
	}
	catch(PDOException $ex){
		///database or query error
		http_response_code(503);

		echo json_encode(array("message"=>"Service Unavailable"));
	}
}


///------------------------------to update a student's information ------------------------


//request URI: PUT http://localhost:port/RESTApis/students.php?id=12

///data is sent as raw data by setting the request Content-Type as application/json and the data is received in the server side through file_get_contents('php://input') method calling

///sample data to send with the request: { "name" : "new user 1 updated", "email": "updatednewuser@gmail.com", "dob" : "1993-01-03", "address" : "notunbazar, bangladesh"}

if($_SERVER['REQUEST_METHOD']=="PUT"){
	///setting the necessary headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	///checking the id field
	if(isset($_GET['fid'])){
		///receiving the parameter value
		$fid=$_GET['fid'];
		
		///receiving the entity body of HTTP requests
		$jsonstring=file_get_contents("php://input");

		$phparray=json_decode($jsonstring,true);

		///connecting to database
		try{
			$conn=new PDO("mysql:host=localhost:3306;dbname=onlinefood",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$vname=$phparray['name'];
		$vphone=$phparray['phone'];
		$vusername=$phparray['username'];
		 $vemail=$phparray['email'];
		$vpass=$phparray['password'];
		$vrepass=$phparray['repass'];
		

			$updatequery="UPDATE reg_form SET name='$vname', phone='$vphone', username ='$vusername', email='$vemail', password='$vpass',repass='$vrepass' WHERE fid='$fid' ";
			
			$no_rows=$conn->exec($updatequery);
			
			http_response_code(200);

			echo json_encode(array("message"=>"$no_rows rows have been updated"));
			
		}
		catch(PDOException $ex){
			///database or query error
			http_response_code(503);
				
			echo json_encode(array("message"=>"Service Unavailable"));
		}
	}
	else{
		///no id value is set error
		http_response_code(404);
				
		echo json_encode(array("message"=>"id parameter not found"));
	}
}

///------------------------- to delete a student's information --------------------------------------


///request URL: DELETE https://localhost:port/RESTApis/students.php?id=12
if($_SERVER['REQUEST_METHOD']=="DELETE"){
	///setting the necessary headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	///checking the id field
	if(isset($_GET['fid'])){
		///receiving the parameter value
		$fid=$_GET['fid'];
		
		///connecting to database
		try{
			$conn=new PDO("mysql:host=localhost:3306;dbname=onlinefoood",'root','');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			$deletequery="DELETE FROM reg_form WHERE fid=$fid ";
			
			$no_rows=$conn->exec($deletequery);
			
			http_response_code(200);

			echo json_encode(array("message"=>"$no_rows rows have been deleted"));
			
		}
		catch(PDOException $ex){
			///database or query error
			http_response_code(503);
				
			echo json_encode(array("message"=>"Service Unavailable"));
		}
	}
	else{
		///no id value is set error
		http_response_code(404);
				
		echo json_encode(array("message"=>"id parameter not found"));
	}
}


?>