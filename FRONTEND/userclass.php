<?php 

class accessories{
private $conn;
public function __construct($conn){
    $this->conn=$conn;
}
public function getAccessories(){
    $query = "SELECT * FROM accessories";
   $res=$this->conn->query($query);
    return $res;
}

}
class jawauser {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function register($fname, $lname, $email, $ph, $lic, $Pass) {
        // Use prepared statement to safely insert data
        $stmt = $this->conn->prepare("INSERT INTO jawauser (FName, LName, Email, Phone, LicenceNo, Password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fname, $lname, $email, $ph, $lic, $Pass);

        // Execute the statement
        $res = $stmt->execute();
        
        // Return the result of the execution
        return $res;
    }

    public function getUserById($user_id) {
        $sql = "SELECT * FROM jawauser WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateProfile($user_id, $fname, $lname, $email, $ph, $lic) {
        $sql = "UPDATE jawauser SET FName = ?, LName = ?, Email = ?, Phone = ?, LicenceNo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $fname, $lname, $email, $ph, $lic, $user_id);
        return $stmt->execute();
    }
}


class enquiry{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }  
    public function sendEnquiry($name, $email, $phone, $add, $occ, $age, $model){
        $sql=  $sql= "INSERT INTO enquiry (Name, Email, MobileNo, Address, Occupation, AgeGroup, BikeModel)
        VALUES ('$name', '$email', '$phone', '$add', '$occ', '$age', '$model')";
          $res=$this->conn->query($sql);
          return $res;
    }
}

class testride{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }  
    public function getTestride($name, $phone, $email, $address, $licence,$img_name, $bikemodel, $date, $time, $otp){
        $sql = "INSERT INTO testride (Name, Phone, Email, Address, LicenceNo,image, BikeModel, TRDate, TRTime, otp)
            VALUES ('$name', '$phone', '$email', '$address', '$licence','$img_name', '$bikemodel', '$date', '$time', '$otp')";
            $res=$this->conn->query($sql);
            return $res;
    }
}

class feedback{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }  
    public function getFeedback($name, $bikemodel,$phone, $email, $date, $style, $comfort, $power, $suspension, $overall, $experience,$otp,$user_id){
        $sql = "INSERT INTO feedback (Name,BikeModel, Phone, Email, date, style, comfort, power, suspension, overall, experience, otp, user_id) VALUES ('$name', '$bikemodel','$phone', '$email', '$date', '$style', '$comfort', '$power', '$suspension', '$overall', '$experience','$otp','$user_id')";
            $res=$this->conn->query($sql);
            return $res;
    }
}
class bookjawa{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    } 
    public function getBikeModel($bikeid,$uemail,$bplace,$bdate,$cusn,$phno,$price){
        $sql = "INSERT into bookjawa (BikeID, Email, BookPlace, BookDate, Customer_Name, Mobile_Number, Price) values('$bikeid','$uemail','$bplace','$bdate','$cusn','$phno','$price')";
        $res=$this->conn->query($sql);
        return $res;
    }

}
class admin{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }
    public function addBike($bikemodel,$img_name,$price,$mileage,$description,$available){
        $query="INSERT INTO bikes(Model,Bikeimage,Price,Mileage,Descriptions,Available) values('$bikemodel','$img_name',$price,'$mileage','$description','$available')";
        $res=$this->conn->query($query);
        return $res;
    } 
}

class payments{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }
    public function getPayment($id){
        $sql = "SELECT Price FROM bikes WHERE BikeID='$id'";
        $res=$this->conn->query($sql);
        return $res;
    }
}

class bikes{
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }
    public function getBikeID($id){
        $sql = "SELECT Price FROM bikes WHERE BikeID='$id'";
        $res=$this->conn->query($sql);
        return $res;
    }
}
?>