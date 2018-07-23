<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
    <script src="<?= base_url()?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>






</head>
<body>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 100%;">
            </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="col-xs-12">
        <h1>Bootstrap 3 Thumbnail Slider with modal image</h1>

        <div class="img-thumbnail">
            <div class="carousel slide" id="myCarousel">

                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-xs-3">
                                <a href="#x" class="pop"><img class="img-responsive" alt="Image" src="http://placehold.it/500x500"></a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#x" class="pop"><img class="img-responsive" alt="Image" src="http://placehold.it/500x500"></a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#x" class="pop"><img class="img-responsive" alt="Image" src="http://placehold.it/500x500"></a>
                            </div>
                            <div class="col-xs-3">
                                <a href="#x" class="pop"><img class="img-responsive" alt="Image" src="http://placehold.it/500x500"></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-xs-3">
                                <a class="thumbnail pop"  href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                            <div class="col-xs-3">
                                <a class="thumbnail pop" href="#x"><img class="img-responsive" alt="Image" src="http://placehold.it/250x250"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>

                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>

        </div>
    </div>
</div>
</body>
<script>
    $(function() {
        $('.pop').on('click', function() {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');
        });
    });
</script>
</html>


