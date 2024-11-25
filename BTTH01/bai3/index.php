<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh Sách Sinh Viên</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Danh Sách Sinh Viên</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $filename = "KTPM2.csv";

                if (file_exists($filename)) {
                    if (($handle = fopen($filename, "r")) !== FALSE) {
                        $headers = fgetcsv($handle, 1000, ",");

                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            echo "<tr>";
                            foreach ($data as $cell) {
                                echo "<td>" . htmlspecialchars($cell) . "</td>";
                            }
                            echo "</tr>";
                        }
                        fclose($handle);
                    } else {
                        echo "<tr><td colspan='7'>Không thể mở file CSV.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>File CSV không tồn tại.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
