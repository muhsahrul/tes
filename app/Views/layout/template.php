<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>