<?php
require_once 'db_connect.php';



function addTutor($data)       //Done
{
    $conn = db_conn();
    $selectQuery = "INSERT into tutorinfo (Name, Email,  Gender, ProfilePic,Phone,CV,tUsername ,Verify)
VALUES (:Name, :Email, :Gender,:ProfilePic,:Phone,:CV,:tUsername, :Verify)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Name' => $data['Name'],
            ':Email' => $data['Email'],
            ':Gender' => $data['Gender'],
            ':ProfilePic' => $data['ProfilePic'],
            ':CV' => $data['CV'],
            ':Phone' => $data['Phone'],
            ':tUsername' => $data['tUsername'],
            ':Verify' => $data['Verify']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn2 = db_conn();
    $selectQuery2 = "INSERT into login (Email,Username, Password,Type,Verify) VALUES (:Email, :tUsername, :Password, :Type, :Verify)";
    try {
        $stmt = $conn2->prepare($selectQuery2);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Password' => $data['Password'],
            ':Type' => $data['Type'],
            ':Verify' => $data['Verify'],
            ':tUsername' => $data['tUsername']

        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn3 = db_conn();
    $selectQuery3 = "INSERT into subject (Email,tUsername,Subject) VALUES (:Email,:tUsername,:Subject)";
    try {
        $stmt = $conn3->prepare($selectQuery3);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Subject' => $data['Subject'],
            ':tUsername' => $data['tUsername']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn3 = null;
    $conn3 = db_conn();
    $selectQuery3 = "INSERT into salary (Email,Username,Salary) VALUES (:Email, :tUsername, :Salary)";
    try {
        $stmt = $conn3->prepare($selectQuery3);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Salary' => $data['Salary'],
            ':tUsername' => $data['tUsername']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }




    $conn3 = null;
    $conn3 = db_conn();
    $selectQuery3 = "INSERT into location (Email,tUsername,Location) VALUES (:Email,:tUsername, :Location)";
    try {
        $stmt = $conn3->prepare($selectQuery3);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Location' => $data['Location'],
            ':tUsername' => $data['tUsername']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage() . " location";
    }

    $conn3 = null;
    $conn3 = db_conn();
    $selectQuery3 = "INSERT into classlevel (Email,tUsername,Level) VALUES (:Email,:tUsername,:Level)";
    try {
        $stmt = $conn3->prepare($selectQuery3);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Level' => $data['Level'],
            ':tUsername' => $data['tUsername']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage() . " Class ";
    }

    $conn = null;
    $conn2 = null;
    $conn3 = null;
    return true;
}



function addAdmin($data)       //Done
{
    $conn = db_conn();
    $selectQuery = "INSERT into admininfo (Name, Email, Gender,Phone,Type)  VALUES (:Name, :Email, :Gender,:Phone,:Type)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Name' => $data['Name'],
            ':Email' => $data['Email'],
            ':Type' => $data['Type'],
            ':Gender' => $data['Gender'],
            ':Phone' => $data['Phone']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage() . "tutorinfo";
    }

    $conn2 = db_conn();
    $selectQuery2 = "INSERT into login (Email,Username, Password,Type,Verify) VALUES (:Email, :tUsername, :Password, :Type, :Verify)";
    try {
        $stmt = $conn2->prepare($selectQuery2);
        $stmt->execute([
            ':Email' => $data['Email'],
            ':Password' => $data['Password'],
            ':Type' => $data['Type'],
            ':Verify' => $data['Verify'],
            ':tUsername' => $data['tUsername']

        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    $conn2 = null;
    $conn3 = null;
    return true;
}

function checkLogin($data)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM login where Email = ? and Password = ? and  Type = ? and  Verify = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Email'], $data['Password'], $data['Type'], $data['Verify']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function checkPass($data)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM login where  Password = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Password']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function checkEmail($data)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM login where  Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function checkUsername($data)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM login where  Username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['tUsername']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function updatePass($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE login set Password = ? where Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['Password'], $data['Email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}



function showAll() //admin
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM admininfo';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function deleteAdmin($Email)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM admininfo WHERE Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$Email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    $conn = db_conn();
    $selectQuery = "DELETE FROM login WHERE Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$Email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;


    return true;
}

function updateType($Email, $Type)
{

    $conn = db_conn();
    $selectQuery = "UPDATE login set Type = ? where Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Type, $Email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;

    $conn = db_conn();
    $selectQuery = "UPDATE admininfo set Type = ? where Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Type, $Email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}


function insertHistory($data)       //Done
{
    $conn = db_conn();
    $selectQuery = "INSERT into rangchnagehistory (Updater, Time,  Name, Status)
VALUES (:Updater, :Time, :Name,:Status)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Updater' => $data['Updater'],
            ':Time' => $data['Time'],
            ':Name' => $data['Name'],
            ':Status' => $data['Status']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function showAllHistory() //admin
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM rangchnagehistory';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}



//--------------------------------------------tazin-----------------------------------------//


///Tazin's model functions
function showTutorInfo($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM tutorinfo where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
///new///
function showTutorLocation($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM location where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function showTutorClass($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM classlevel where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["Level"]; //test
}

function showTutorSubject($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM subject where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["Subject"]; //test
}

function showTutorSalary($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM salary where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["Salary"]; //test
}

function updateTutorInfo($email, $data) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE tutorinfo SET Name = ?, Gender = ?, Phone = ?, ProfilePic = ?, CV = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['gender'], $data['phone'], $data['ProfilePic'], $data['CV'],
            $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function updateTutorClass($email, $data) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE classlevel set Level = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['interestedClass'],
            $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function updateTutorSubject($email, $data) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE subject set Subject = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['interestedSub'],
            $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function updateTutorLocation($email, $data) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE location set Location = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['location'],
            $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function updateTutorSalary($email, $data) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE salary set Salary = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['salary'],
            $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function updateTutor($email, $data)
{
    updateTutorInfo($email, $data);
    updateTutorClass($email, $data);
    updateTutorSubject($email, $data);
    updateTutorLocation($email, $data);
    updateTutorSalary($email, $data);

    return true;
}

///for profilePic
function showTutorPicture($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM tutorinfo where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["ProfilePic"];
}

///for CV
function showTutorCV($email)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM tutorinfo where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row["CV"];
}

///for booking receiving
function showAllBookings($email) //done
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM bookingrequest where tEmail = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ); //obj

    return $rows;
}

function showBooking($pUsername) //working on it ????
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM bookingrequest where pUsername = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$pUsername]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    return $row;
}



function acceptBooking($Status, $pEmail, $tEmail) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE bookingrequest set Status = ? where pEmail = ? AND tEmail = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Status, $pEmail, $tEmail
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;

    /* $conn = null;
    $conn = db_conn();
    $selectQuery = "INSERT into bookingaccepted (tUsername, pUsername, tEmail, pEmail) VALUES (:tUsername, :pUsername, :tEmail, :pEmail)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':tUsername' => $data['tUsername'],
            ':pUsername' => $data['pUsername'],
            ':tEmail' => $data['tEmail'],
            ':pEmail' => $data['pEmail']  
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;

    return true; */
}

function rejectBooking($Status, $pEmail, $tEmail) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE bookingrequest set Status = ? where pEmail = ? AND tEmail = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Status, $pEmail, $tEmail
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function bookingRejected($pEmail, $tEmail) //done
{
    $conn = null;
    $conn = db_conn();
    $selectQuery = "INSERT into bookingrejected (tEmail, pEmail) VALUES (:tEmail, :pEmail)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':tEmail' => $pEmail,
            ':pEmail' => $tEmail
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;

    return true;
}

function deleteBooking($pEmail, $tEmail) //done
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM bookingrequest WHERE pEmail = ? AND tEmail = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$pEmail, $tEmail]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

////tutor verification
/* function showNewTutors($Verify) //not needed now
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM login where  Verify = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Verify
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
} */

function showNewTutorInfo($Verify) //done
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM tutorinfo where  Verify = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Verify
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $rows;
}

function acceptTutor($Verify, $tEmail) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE tutorinfo set Verify = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Verify, $tEmail
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function verifyLogin($Verify, $tEmail) //done
{
    $conn = db_conn();
    $selectQuery = "UPDATE login set Verify = ? where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $Verify, $tEmail
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function rejectTutor($tEmail)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM tutorinfo WHERE Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$tEmail]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function rejectTutorLogin($tEmail)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM login WHERE Email = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$tEmail]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}


function addBlogPost($title, $author, $body, $email) //working
{
    $conn = null;
    $conn = db_conn();
    $selectQuery = "INSERT into posts (title, author, body, Email) VALUES (:title, :author, :body, :Email)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':body' => $body,
            ':Email' => $email
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function showAllBlogPosts() //working
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM posts";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

function showBlogPost($id) //working
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM posts where id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $id
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function updateBlogPost($title, $body, $author, $update_id)
{
    $conn = db_conn();
    $selectQuery = "UPDATE posts set title = ?, body = ?, author = ? where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $title, $body, $author, $update_id
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function deleteBlogPost($delete_id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM posts WHERE id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$delete_id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
///new ends///

/* Fahim*/
function Bookingstatus($pEmail, $tEmail, $Status)
{
    $conn2 = db_conn();
    $selectQuery2 = "INSERT into bookingrequest (pEmail,tEmail, Status) VALUES (:pEmail, :tEmail, :Status)";
    try {
        $stmt = $conn2->prepare($selectQuery2);
        $stmt->execute([
            ':pEmail' => $pEmail,
            ':tEmail' => $tEmail,
            ':Status' => $Status


        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    $conn2 = null;
    return true;
}
