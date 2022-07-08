<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Asap</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/user/css/styles.css">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?=site_url('/')?>">
                <img src="<?= base_url() ?>/assets/user/file/logo-nf.png" alt="" width="70" height="34" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4"></ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Pencarian" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>

                <div style="margin-left:5%">
                    <?php if ($this->session->userdata('role') == NULL || $this->session->userdata('role') == "administrator") { ?>
                    <a href="<?=site_url('login')?>" class="btn btn-block btn-primary">Login</a>
                    <?php } else if ($this->session->userdata('role') == "public") { ?>
                    <a href="<?=site_url('logout')?>" class="btn btn-block btn-primary">Logout</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Event Kampus</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    Semua info event bisa kamu dapat disini
                </p>
            </div>
        </div>
    </header>