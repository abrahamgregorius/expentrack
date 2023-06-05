<?php 
include_once('db.php');

class Income extends DataB {
    public function index() {
        $sql = "SELECT * FROM income";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function total() {
        $sql = "SELECT SUM(amount) AS total FROM income";
        $exec = $this->db->query($sql);
        $data = $exec->fetch_assoc();

        return $data;
    }


    public function store() {
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        
        $sql = "INSERT INTO income (name, amount) VALUES ('$name', '$amount')";
        $exec = $this->db->query($sql);

        // Conditional Statement
        if($exec) {
            $message = "Succeed adding income";
            $status = "success";
        }

        else {
            $message = "Failed adding income";
            $status = "danger";
        }

        header("Location: ./index.php?message=$message&status=$status");
    }


    public function destroy() {
        $id = $_POST['id'];
        $sql = "DELETE FROM income WHERE id = $id";
        $exec = $this->db->query($sql);

        // Conditional Statement
        if($exec) {
            $message = "Succeed deleting income";
            $status = "danger";
        }

        else {
            $message = "Failed deleting income";
            $status = "warning";
        }
        
        header("Location: ./index.php?message=$message&status=$status");
    }

    


}

?>