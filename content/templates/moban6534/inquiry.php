<?php if (!defined('EMO_ROOT')) exit('error!');?>

<div class="rfq">
    <div style="margin: 50px; 0 ">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form" id="rfq-form" method="post" action="" onsubmit="return false">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-items-tab" data-toggle="tab" href="#nav-items" role="tab" aria-controls="nav-items" aria-selected="true">Quote</a>
                            <a class="nav-item nav-link" id="nav-upload-tab" data-toggle="tab" href="#nav-upload" role="tab" aria-controls="nav-upload" aria-selected="false">BOM</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-items" role="tabpanel" aria-labelledby="nav-items-tab">
                            <div class="table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>*Part Number</th>
                                        <th>*Quantity</th>
                                        <th>Target Price($)</th>
                                        <th>Manufacturer</th>
                                        <th>Packaging</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="rfq-tbody">
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <a href="javascript:;" class="add-more" onclick="clickAddMore()">
                                    <i class="fa fa-plus"></i>
                                    Add More
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-items-tab">
                            <div class="upload text-center">
                                <div class="form-group" style="padding-top: 2rem;">
                                    <label for="file">Choose an excel file to upload</label>
                                    <input type="file" id="input-file" name="inputFile" accept=".xls,.xlsx" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-bottom">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact">
                                    <div class="form-group">
                                        <label class="label">*Company Name:</label>
                                        <input type="text" class="form-control" name="companyName" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">*Contact Name:</label>
                                        <input type="text" class="form-control" name="contactName" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">*Email:</label>
                                        <input type="email" class="form-control" name="email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">*Tel:</label>
                                        <input type="tel" class="form-control" name="phone" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Message:</label>
                                        <textarea class="form-control" name="comment" rows="3" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" onclick="clickSendRfq(2)">
                                    <i class="fa fa-send fa-fw"></i>
                                    <i class="fa fa-spinner fa-spin fa-fw d-none"></i>
                                    Send RFQ
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <p class="desc text-muted">
                    Description of enquiry: <br>
                    1. If the quantity of purchase is close to the whole package quantity, it is recommended to order according to the whole package inquiry, so as to facilitate transportation and storage.<br>
                    2. in order to ensure the quality and efficiency of the service, the enquiry model must meet the following conditions, so that the quotation can be answered.<br>
                    The total size of the model is no less than 200 US dollars (1000 yuan).<br>
                    It is acceptable for a maximum of 24 hours.<br>
                    Acceptance of the maximum validity period of no more than 3 working days.<br>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
include View::getView('footer');
?>
