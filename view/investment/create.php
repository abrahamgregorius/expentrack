<?php 
include_once('./../../class/investment.php');
$investment = new Investment;

if(isset($_POST['store'])) {
    $investment->store();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment | Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar shadow bg-dark">
        <div class="container-fluid">
            <div class="navbar-brand">
            <!-- Navbar left -->
                <a href="" class="text-white" style="text-decoration:none;">
                    <div class="d-flex align-items-end">
                        <h2>Expentrack</h2>
                        <span class="m-2 lead">by Abraham Gregorius</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row m-3 p-2">
        <!-- Sidebar -->
        <div class="col-2">
            <div class="card">
                <ul class="list-group">
                    <a class="text-dark" style="text-decoration: none;" href="./../index.php"><div class="link"><li class="list-group-item">Dashboard</li></div></a>
                    <a class="text-dark" style="text-decoration: none;" href="./../expense/index.php"><div class="link"><li class="list-group-item">Expenses</li></div></a>
                    <a class="text-dark" style="text-decoration: none;" href="./../income/index.php"><div class="link"><li class="list-group-item">Income</li></div></a>
                    <a class="text-dark" style="text-decoration: none;" href="./index.php"><div class="link"><li class="list-group-item">Investments</li></div></a>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="col-10">    
            <div class="col-5 rounded p-3">
                <form method="POST">
                    <div class="px-2 col-12 text-dark">
                        <h2>Investment</h2>
                    </div>
                    <div class="col-11 mx-2 my-3 rounded">
                        <label class="form-label" for="name">Investment Name</label>
                        <input class="form-control" autocomplete="off" name="name" type="text" placeholder="S&P500, Index Fund, etc">
                    </div>
                    <div class="col-11 mx-2 mt-3 mb-2 rounded">
                        <label class="form-label" for="amount">Amount</label>
                        <input class="form-control" autocomplete="off" name="amount" type="text" placeholder="100,000">
                    </div>
                    <div class="mt-4 mx-2 col-11 d-grid">
                        <button type="submit" name="store" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    
</body>
</html>