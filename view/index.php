<?php
include_once('./../class/expense.php');
include_once('./../class/income.php');
include_once('./../class/investment.php');
// include_once('./../class/category.php');

$expense = new Expense;
$income = new Income;
$investment = new Investment;

// Fetch data
$expense_data = $expense->index();
$income_data = $income->index();
$investment_data = $income->index();

// Expense data for card
$expense_today = $expense->today();

// Total data from each column
$expense_total = $expense->total();
$income_total = $income->total();
$investment_total = $investment->total();
$today_expense = $expense->sum_today();

// Count data from each column
$count_expense = count($expense_data);
$count_today = count($expense_today);
$count_income = count($income_data);
$count_investment = count($investment_data);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expentrack</title>
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

    <!-- Body -->
        <div class="row m-3 p-2">
            <!-- Sidebar -->
            <div class="col-2">
                <div class="card">
                    <ul class="list-group">
                        <a class="text-dark" style="text-decoration: none;" href="./index.php"><div class="link"><li class="list-group-item">Dashboard</li></div></a>
                        <a class="text-dark" style="text-decoration: none;" href="./expense/index.php"><div class="link"><li class="list-group-item">Expenses</li></div></a>
                        <a class="text-dark" style="text-decoration: none;" href="./income/index.php"><div class="link"><li class="list-group-item">Income</li></div></a>
                        <a class="text-dark" style="text-decoration: none;" href="./investment/index.php"><div class="link"><li class="list-group-item">Investments</li></div></a>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="col-10">
                <!-- Heading row -->
                <div class="row my-2">
                    <div class="col-12">
                        <div class="alert bg-warning">
                            <h1 class="text-dark">Welcome to Expentrack</h1>
                            <h6 class="text-dark">Use Expentrack to track your expenses, income, and investments.</h6>
                        </div>
                    </div>
                </div>

                <div class="row">

                <div class="col-12">
                    <h3>Summary</h3>
                </div>
                <div class="col-12 mb-5">
                    <!-- Cards row -->
                    <div class="row">
                        <?php foreach($today_expense as $key => $total) : ?>
                        <div class="col-3 p-2">
                            <div class="card shadow text-center">
                                <div class="card-header text-white bg-dark">Expenses Today</div>
                                <div class="card-body">IDR <?= $total ?></div></div>
                        </div>
                        <?php endforeach ?>

                        <?php foreach($expense_total as $key => $total) : ?>
                        <div class="col-3 p-2">
                            <div class="card shadow text-center">
                                <div class="card-header text-white bg-dark">Total Expenses</div>
                                <div class="card-body">IDR <?= $total ?></div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        
                        <?php foreach($income_total as $key => $total) : ?>
                        <div class="col-3 p-2">
                            <div class="card shadow text-center">
                                <div class="card-header text-white bg-dark">Total Expenses</div>
                                <div class="card-body">IDR <?= $total ?></div>
                            </div>
                        </div>
                        <?php endforeach ?>

                        <?php foreach($investment_total as $key => $total) : ?>
                        <div class="col-3 p-2">
                            <div class="card shadow text-center">
                                <div class="card-header text-white bg-dark">Total Investments</div>
                                <div class="card-body">IDR <?= $total ?></div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>



                </div>
            </div>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
</html>