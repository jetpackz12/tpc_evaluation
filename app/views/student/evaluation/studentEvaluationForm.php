<!DOCTYPE html>
<html lang="en">
<?php require PATH_VIEW . 'components/head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php require PATH_VIEW . 'components/navbar.php'; ?>
        <?php require PATH_VIEW . 'components/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 mb-3 mb-md-0">
                            <h1 class="m-0">Teacher Evaluation</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-md"><b>Criteria:</b></li>
                                <li class="breadcrumb-item text-md"><b>Poor (1)</b></li>
                                <li class="breadcrumb-item text-md"><b>Fair (2)</b></li>
                                <li class="breadcrumb-item text-md"><b>Good (3)</b></li>
                                <li class="breadcrumb-item text-md"><b>Very Good (4)</b></li>
                                <li class="breadcrumb-item text-md"><b>Excellent (5)</b></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">bs-stepper</h3>
                                </div> -->
                                <div class="card-body p-1 p-md-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->
                                            <div class="step" data-target="#stepper1">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="stepper1" id="stepper1-trigger">
                                                    <span class="bs-stepper-label text-sm d-md-none">Face to Face</span>
                                                    <span class="bs-stepper-label d-none d-md-block">Face to Face</span>
                                                    <span class="bs-stepper-circle">1</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#stepper2">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="stepper2" id="stepper2-trigger">
                                                    <span class="bs-stepper-label text-sm d-md-none">Online</span>
                                                    <span class="bs-stepper-label d-none d-md-block">Online</span>
                                                    <span class="bs-stepper-circle">2</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#stepper3">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="stepper3" id="stepper3-trigger">
                                                    <span class="bs-stepper-label text-sm d-md-none">Subject Matter</span>
                                                    <span class="bs-stepper-label d-none d-md-block">Subject Matter</span>
                                                    <span class="bs-stepper-circle">3</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <form action="<?php echo ROOT; ?>studentEvaluationForm/store" method="POST" class="postForm">
                                                <!-- your steps content here -->
                                                <div id="stepper1" class="content" role="tabpanel" aria-labelledby="stepper1-trigger">
                                                    <h2 class="text-center">Face to Face Instruction</h2>
                                                    <?php foreach ($data as $category) { ?>
                                                        <table id="table" class="table table-bordered">
                                                            <thead>
                                                                <tr class="bg-success">
                                                                    <th>
                                                                        <?php echo $category['categoryName']; ?>
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Rating
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($data2 as $faceToFaceQuestion) { 
                                                                    if ($category['categoryName'] == $faceToFaceQuestion['categoryName']) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $faceToFaceQuestion['question']; ?></td>
                                                                        <td class="w-25">
                                                                            <select class="form-control" name="faceToFace[]">
                                                                                <option value="1<?php echo "|".$faceToFaceQuestion['category_id']."|".$faceToFaceQuestion['modality_id']."|".$faceToFaceQuestion['id']; ?>">1</option>
                                                                                <option value="2<?php echo "|".$faceToFaceQuestion['category_id']."|".$faceToFaceQuestion['modality_id']."|".$faceToFaceQuestion['id']; ?>">2</option>
                                                                                <option value="3<?php echo "|".$faceToFaceQuestion['category_id']."|".$faceToFaceQuestion['modality_id']."|".$faceToFaceQuestion['id']; ?>">3</option>
                                                                                <option value="4<?php echo "|".$faceToFaceQuestion['category_id']."|".$faceToFaceQuestion['modality_id']."|".$faceToFaceQuestion['id']; ?>">4</option>
                                                                                <option value="5<?php echo "|".$faceToFaceQuestion['category_id']."|".$faceToFaceQuestion['modality_id']."|".$faceToFaceQuestion['id']; ?>">5</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                <?php }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-center align-content-center mb-2">
                                                        <button class="btn btn-primary" onclick="stepper.next()" type="button">
                                                            Next
                                                            <i class="fa fa-arrow-circle-right ml-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="stepper2" class="content" role="tabpanel" aria-labelledby="stepper2-trigger">
                                                    <h2 class="text-center">Online Instruction</h2>
                                                    <?php foreach ($data as $category) { ?>
                                                    <table id="table" class="table table-bordered">
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th>
                                                                    <?php echo $category['categoryName']; ?>
                                                                </th>
                                                                <th class="text-center">
                                                                    Rating
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($data3 as $onlineQuestion) { 
                                                                if ($category['categoryName'] == $onlineQuestion['categoryName']) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $onlineQuestion['question']; ?></td>
                                                                    <td class="w-25">
                                                                        <select class="form-control" name="online[]">
                                                                            <option value="1<?php echo "|".$onlineQuestion['category_id']."|".$onlineQuestion['modality_id']."|".$onlineQuestion['id']; ?>">1</option>
                                                                            <option value="2<?php echo "|".$onlineQuestion['category_id']."|".$onlineQuestion['modality_id']."|".$onlineQuestion['id']; ?>">2</option>
                                                                            <option value="3<?php echo "|".$onlineQuestion['category_id']."|".$onlineQuestion['modality_id']."|".$onlineQuestion['id']; ?>">3</option>
                                                                            <option value="4<?php echo "|".$onlineQuestion['category_id']."|".$onlineQuestion['modality_id']."|".$onlineQuestion['id']; ?>">4</option>
                                                                            <option value="5<?php echo "|".$onlineQuestion['category_id']."|".$onlineQuestion['modality_id']."|".$onlineQuestion['id']; ?>">5</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-center align-content-center mb-2">
                                                        <button class="btn btn-primary mr-2" onclick="stepper.previous()" type="button">
                                                            <i class="fa fa-arrow-circle-left ml-1"></i>
                                                            Previous
                                                        </button>
                                                        <button class="btn btn-primary" onclick="stepper.next()" type="button">
                                                            Next
                                                            <i class="fa fa-arrow-circle-right ml-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="stepper3" class="content" role="tabpanel" aria-labelledby="stepper3-trigger">
                                                    <h2 class="text-center my-2">Knowledge of the Subject Matter</h2>
                                                    <?php $counter = 1; foreach ($data4 as $result) { ?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input class="form-control" type="text" name="knowledge_id[]" value="<?php echo $result['id']; ?>" hidden>
                                                                <div class="form-group">
                                                                    <label>Question <?php echo $counter++; ?>: <?php echo $result['question']; ?></label>
                                                                    <textarea class="form-control" name="question[]" rows="2" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-center align-content-center mb-2">
                                                        <button class="btn btn-primary mr-2" onclick="stepper.previous()" type="button">
                                                            <i class="fa fa-arrow-circle-left ml-1"></i>
                                                            Previous
                                                        </button>
                                                        <button class="btn btn-primary" type="submit">
                                                            Submit
                                                            <i class="fa fa-paper-plane ml-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <?php require PATH_VIEW . 'components/scripts.php'; ?>
    <script>
        
        // If the constant variable loading is set to false or is not declared, the loading screen will not be displayed.
        const loading = false;

        // Datable
        $('.table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": false,
        });
        $("#evaluation").addClass("active");
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
</body>

</html>