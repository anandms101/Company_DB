<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "companydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO EMPLOYEE (EMP_ID ,NAME,ADDRESS,PH_NO ,DOB ,E_MAIL,PROOF_NAME,PROOF_ID,DEP_NO ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ississssi", $EMP_ID, $NAME, $ADDRESS,$PH_NO,$DOB,$E_MAIL,$PROOF_NAME,$PROOF_ID,$DEP_NO);

// set parameters and execute
$EMP_ID = $_POST["EMP_ID"];
$NAME = $_POST["NAME"];
$ADDRESS = $_POST["ADDRESS"];
$PH_NO = $_POST["PH_NO"];
$DOB = $_POST["DOB"];
$E_MAIL = $_POST["E_MAIL"];
$PROOF_NAME = $_POST["PROOF_NAME"];
$PROOF_ID = $_POST["PROOF_ID"];
$DEP_NO = $_POST["DEP_NO"];
$stmt->execute();



$stmt->close();
$conn->close();
?>

<head>
    <title>
    EMPLOYEE NEW
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS File -->
    <link rel="stylesheet" href="New.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri&display=swap" rel="stylesheet">

    <style>
         #content {
            text-align: center;
            padding-top: 30%;
            font-family: 'ZCOOL XiaoWei', serif;
            color: rgb(247, 247, 247);
        }

        #content h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 0 black;
            letter-spacing: 2px;
        }
    </style>
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

    <!-- Company Name -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h1>NEW ENTRY DONE SUCCESSFULY</h1>
                </div>
            </div>
        </div>
    </div>


    <!-- JS CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>