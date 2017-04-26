<?php
namespace complete_sudoku\hw4\models;

class SheetCodeModel extends Model
{
    public function getSheetAndTypeByCode($hash) {
        $sheet = [];
        $stmt = $this->conn->prepare("SELECT sheet_name, sheet_data, code_type FROM Sheet_Codes c JOIN Sheet s ON c.sheet_id = s.sheet_id WHERE hash_code = ?;");
        $stmt->bind_param("s", $hash);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            $sheet = $result->fetch_assoc();
            $sheet['sheet_data'] = json_decode($sheet['sheet_data']);
        }  
        $stmt->close();
        
        return $sheet;
    }
    

    public function addSheetCode($id, $hash, $type) {
        $stmt = $this->conn->prepare("INSERT INTO Sheet_Codes (sheet_id, hash_code, code_type) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id, $hash, $type);
        $stmt->execute();
        $stmt->close();

    }

}
?>