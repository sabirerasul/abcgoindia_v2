<div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" height="450px" src="<?=Yii::getAlias('@web')?>/web/img/ads/banner/4.jpg"
                alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="450px" src="<?=Yii::getAlias('@web')?>/web/img/ads/banner/2.jpg"
                alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="450px" src="<?=Yii::getAlias('@web')?>/web/img/ads/banner/3.jpg"
                alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="450px" src="<?=Yii::getAlias('@web')?>/web/img/banner/1.jpg"
                alt="Fourth slide">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<style>
@media screen and (max-width: 425px) {
    .carousel-item {
        height:210px;
    }

    /* .carousel-item > img {
      object-fit: cover;
    } */
}
</style>