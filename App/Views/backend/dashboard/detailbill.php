<div class="container">
    <div class="card">
        <?php
        // print_r($detailBill)
        ?>
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: <?=$detailBill[0]['bill_id']?></strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a data-mdb-ripple-init class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                            <!-- <i class="fas fa-print text-primary"></i> Print -->
                        </a>
                        <a data-mdb-ripple-init class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                            <!-- <i class="far fa-file-pdf text-danger"></i> Export -->
                        </a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <p class="pt-0">AdamStore</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;"><?=$detailBill[0]['name']?></span></li>
                                <li class="text-muted"><?=$detailBill[0]['address']?></li>
                                <li class="text-muted"></li>
                                <li class="text-muted"><i class="fas fa-phone"></i> <?=$detailBill[0]['phone']?></li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#<?=$detailBill[0]['bill_id']?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Creation Date: </span><?=$detailBill[0]['created_at']?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold"><?=$detailBill[0]['status']?></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalSub = 0;
                                foreach ($detailBill as $index => $product) {
                                    $total = $product['quantity'] * $product['price'];
                                    $totalSub += $total;
                                ?>
                                    <tr>
                                        <th scope="row"><?=$index + 1?></th>
                                        <td><?=$product['product_name']?></td>
                                        <td><?=$product['quantity']?></td>
                                        <td><?=number_format($product['price'], 0, ',', '.')?></td>
                                        <td><?=number_format($total, 0, ',', '.')?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>
                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>
                                    <?php echo number_format($totalSub, 0 , ',','.')." VND"?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for your purchase</p>
                        </div>
                        <div class="col-xl-2">
                            <a class="btn btn-primary" href="./admin/bill">Quay ve danh sach</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
