<?php 
include_once('db.php');

class Expense extends DataB {
    public function index() {
        $sql = "SELECT * FROM expense INNER JOIN category ON expense.category_id = category.id";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function total() {
        $sql = "SELECT SUM(amount) AS total FROM expense";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_assoc();

        return $data;
        
    }

    public function today() {
        $sql = "SELECT * FROM expense WHERE timestamp >= CURDATE()";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function sum_today() {
        $sql = "SELECT SUM(amount) AS total FROM expense WHERE timestamp >= CURDATE()";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_assoc();

        return $data;
    }

    public function store() {
        $nama = $_POST['name'];
        $category = $_POST['category'];
        $amount = $_POST['amount'];

        // SQL query
        $sqlquery = "INSERT INTO expense (name, category_id, amount) VALUES ('$nama', '$category', '$amount')";
        $exec = $this->db->query($sqlquery);

        // Conditional Statement
        if($exec) {
            $message = "Succeed adding expense";
            $status = "success";
        }

        else {
            $message = "Failed adding expense";
            $status = "danger";
        }

        // Redirect
        header("Location: ./index.php?message=$message&status=$status");
    }


    public function destroy() {
        $id = $_POST['id'];
        $sql = "DELETE FROM expense WHERE id = $id";
        $exec = $this->db->query($sql);

        // Conditional Statement
        if($exec) {
            $message = "Succeed deleting expense";
            $status = "danger";
        }

        else {
            $message = "Failed deleting expense";
            $status = "warning";
        }
        header("Location: ./index.php?message=$message&status=$status");


    }

}

?>