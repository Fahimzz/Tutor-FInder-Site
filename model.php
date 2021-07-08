<?php 

require_once 'db_connect.php';


function showAllparents()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM onlinetutorfinder ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showparentInfo($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM onlinetutorfinder where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } 
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addParent($data){
	$conn = db_conn();
    $selectQuery = "INSERT INTO `parentsinfo`(`pUsername`, `Email`, `Gender`, `Image`, `Name`)VALUES (:pusername,:email,:gender,:image,:name)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':pusername' => $data['pusername'],
            ':email' => $data['email'],
            ':gender' => $data['gender'],
            ':image' => $data['image'],
            ':name' => $data['name']
            
        ]);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn2 = db_conn();
    $selectQuery2 = "INSERT into login (Email,Username, Password,Type,Verify) VALUES (:email, :pusername, :password, :type, :Verify)";
    try {
        $stmt = $conn2->prepare($selectQuery2);
        $stmt->execute([
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':type' => $data['type'],
            ':Verify' => $data['Verify'],
            ':pusername' => $data['pusername']

        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $conn = null;
    $conn2=null;
    return true;
}


function updateparent($email, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `parentsinfo` SET `pUsername`=?,`Gender`=?,`Name`=? WHERE Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['pusername'], $data['gender'],  $data['name'],
           
            $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function showAlltopteachers(){
	$conn = db_conn();
    $selectQuery = "SELECT * FROM `topteachers` ";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function searchTutor($subject)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM subject WHERE Subject LIKE '%$subject%'";

    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}

function searchtutorSalary($salary)
{
    $conn = db_conn();
    $selectQuery = "SELECT Email FROM salary WHERE Salary LIKE '%$salary%'";

    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}

function searchtutorLocation($location)
{
    $conn = db_conn();
    $selectQuery = "SELECT Email FROM location WHERE Location LIKE '%$location%'";

    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}

function searchtutorClasslevel($classlevel)
{
    $conn = db_conn();
    $selectQuery = "SELECT Email FROM classlevel WHERE Level LIKE '%$classlevel%'";

    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}

function searchtutordetails ($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM tutorinfo WHERE Email = ?";

    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}