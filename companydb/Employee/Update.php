<?php
    $username = 'root';
    $password = '';
    $conn = mysqli_connect("localhost", $username, $password, "companydb");
    if (!$conn) {
        die('Could not Connect My Sql:' . mysql_error());
    }
?>

<html>

<head>
    <title>
    EMPLOYEE UPDATE
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS File -->
    <link rel="stylesheet" href="New.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navabar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../Home/HomePage.html">AwesomeTech</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Department
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../Department/New.html">Entry </a>
                        <a class="dropdown-item" href="../Department/View.php">View </a>
                    </div>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Employee
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../Employee/New.html">Entry</a>
                        <a class="dropdown-item" href="../Employee/View.php">View </a>
                    </div>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Salary
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Salary/New.html">Entry</a>
                            <a class="dropdown-item" href="../Salary/View.php">View </a>
                    </div>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Project
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Project/New.html">Entry</a>
                            <a class="dropdown-item" href="../Project/View.php">View </a>
                    </div>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Performance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Performance/New.html">Entry</a>
                            <a class="dropdown-item" href="../Performance/View.php">View </a>
                    </div>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Calculation
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Calc/View.php">View </a>
                    </div>
                    
                </li>
            </ul>

        </div>
    </nav>

    <!-- Form -->
    <div class="container">
        <form action="Update1.php" method="POST">
            <div class="heading">EMPLOYEE NEW ENTRY</div>
            <div class="form-group">
                <label for="formGroupExampleInput">EMP ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="EMP_ID" placeholder="EMP ID" value="<?php echo $_GET["EMP_ID"]?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">EMP NAME</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="NAME" placeholder="EMP NAME">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">ADDRESS</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="ADDRESS" placeholder="ADDRESS">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">PHONE NUMBER</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="PH_NO"
                    placeholder="PHONE NUMBER">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">DATE OF BIRTH</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="DOB"
                    placeholder="DATE OF BIRTH">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">E-MAIL</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="E_MAIL" placeholder="E-MAIL">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">PROOF NAME</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="PROOF_NAME"
                    placeholder="PROOF NAME">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">PROOF ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="PROOF_ID"
                    placeholder="PROOF ID">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">DEPARTMENT NUMBER</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="DEP_NO"
                    placeholder="DEPARTMENT NUMBER">
            </div>
            <button type="submit" class="btn btn-primary">ENTER</button>
        </form>
    </div>

    <!-- JS CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>