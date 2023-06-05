<?php
include_once('./../../class/expense.php');

$expense = new Expense;
$expense_data = $expense->index();
$count_data = count($expense_data);

if(isset($_POST['destroy'])) {
    $expense->destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
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

    <?php if(isset($_GET['message'])) : ?>
        <div class="alert alert-<?= $_GET['status'] ?>"><?= $_GET['message'] ?></div>
    <?php endif ?>
    
        <!-- Sidebar -->
        <div class="col-2">
            <div class="card">
                <ul class="list-group">
                    <a class="text-dark" style="text-decoration: none;" href="./../index.php"><div class="link"><li class="list-group-item">Dashboard</li></div></a>
                    <a class="text-dark" style="text-decoration: none;" href="index.php"><div class="link"><li class="list-group-item">Expenses</li></div></a>
                    <a class="text-dark" style="text-decoration: none;" href="./../income/index.php"><div class="link"><li class="list-group-item">Income</li></div></a>
                    <a class="text-dark" style="text-decoration: none;" href="./../investment/index.php"><div class="link"><li class="list-group-item">Investments</li></div></a>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="col-10">
        
            <div class="row">
                <div class="mb-3 d-flex gap-3 align-items-center">
                    <h1 class="">Expenses</h1>
                    <a href="./create.php"><div class="btn btn-warning text-dark" style="height: 40px;">Add new</div></a>
                </div>
            <div class="col-12">
                <table class="table table-striped table-secondary table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($expense_data as $key => $expense) : ?>
                            <tr>
                                <td class="p-3"><?= $expense['name'] ?></td>
                                <td class="p-3"><?= $expense['category'] ?></td>
                                <td class="p-3"><?= $expense['amount'] ?></td>
                                <td class="p-3"><?= $expense['timestamp'] ?></td>
                                <td class="p-3"><div class="d-flex gap-1">
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?= $expense['id'] ?>">
                                        <button class="btn btn-warning" type="submit" name="edit">Edit</button>
                                    </form>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?= $expense['id'] ?>">
                                        <button class="btn btn-dark text-warning" type="submit" name="destroy">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                </table>
            </div>
            </div>

        </div>
    </div>


</body>
</html>