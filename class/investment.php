<?php 
include_once('db.php');


class Investment extends DataB {
    public function index() {
        $sql = "SELECT * FROM investment";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function total() {
        $sql = "SELECT SUM(amount) AS total FROM investment";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_assoc();

        return $data;
    }


    public function store() {
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        
        $sql = "INSERT INTO investment (name, amount) VALUES ('$name', '$amount')";
        $exec = $this->db->query($sql);

        // Conditional Statement
        if($exec) {
            $message = "Succeed adding investment";
            $status = "success";
        }

        else {
            $message = "Failed adding investment";
            $status = "danger";
        }


        header("Location: ./index.php?message=$message&status=$status");
    }


    public function destroy() {
        $id = $_POST['id'];
        $sql = "DELETE FROM investment WHERE id = $id";
        $exec = $this->db->query($sql);
        
        // Conditional Statement
        if($exec) {
            $message = "Succeed deleting investment";
            $status = "danger";
        }

        else {
            $message = "Failed deleting investment";
            $status = "warning";
        }


        header("Location: ./index.php?message=$message&status=$status");
    }

    


}

?>