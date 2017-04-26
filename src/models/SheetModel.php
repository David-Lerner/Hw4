<?php
namespace complete_sudoku\hw4\models;

class SheetModel extends Model
{
    //not used
    public function getSheetById($id) {
        $sheet = [];
        $stmt = $this->conn->prepare("SELECT sheet_name, sheet_data FROM Sheet WHERE sheet_id = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            $sheet = $result->fetch_assoc();
            $sheet['sheet_data'] = json_decode($sheet['sheet_data']);
        }  
        $stmt->close();
        
        return $sheet;
    }
    
    public function getSheetByName($name) {
        $sheet = [];
        $stmt = $this->conn->prepare("SELECT sheet_name, sheet_data FROM Sheet WHERE sheet_name = ?;");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            $sheet = $result->fetch_assoc();
            $sheet['sheet_data'] = json_decode($sheet['sheet_data']);
        }      
        $stmt->close();
        
        return $sheet;
    }

    public function addSheet($name, $data) {
        $json = json_encode($data);
        $stmt = $this->conn->prepare("INSERT INTO Sheet (sheet_name, sheet_data) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $json);
        $stmt->execute();
        $last_id = $this->conn->insert_id;
        $stmt->close();
        
        return $last_id;
    }
    
    //not used
    public function updateSheetbyIndex($name, $pair, $value) {
        $stmt = $this->conn->prepare("SELECT sheet_data FROM Sheet WHERE sheet_name = ?;");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            $sheet = $result->fetch_assoc();
            $data = json_decode($sheet['sheet_data']);
            $data[$pair[0]][$pair[1]] = $value;
            $json = json_encode($data);
            $stmt = $this->conn->prepare("UPDATE Sheet SET sheet_data = ? WHERE sheet_name = ?;");
            $stmt->bind_param("ss", $json, $name);
            $stmt->execute();
        } 
        $stmt->close();
    }
    
    public function updateSheet($name, $data) {
        $json = json_encode($data);
        $stmt = $this->conn->prepare("UPDATE Sheet SET sheet_data = ? WHERE sheet_name = ?;");
        $stmt->bind_param("ss", $json, $name);
        $stmt->execute();
        $stmt->close();
    }

}
?>