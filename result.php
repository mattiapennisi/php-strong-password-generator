<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generation Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h1 class="fs-4 fw-bold mb-0">Generated Password</h1>
                    </div>

                    <div class="card-body bg-white p-5 text-center">
                        <h5 class="text-muted mb-4">Here's your password:</h5>

                        <div class="alert alert-success p-4 mb-4 shadow-sm">
                            <span class="fs-5 fw-bold font-monospace">
                                <?php 

                                echo $_SESSION['generatedPassword']; 
                                
                                ?>
                            </span>
                        </div>

                        <div class="mt-4">
                            <a href="index.php" class="btn btn-primary px-4 py-2">
                                Generate Another Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>