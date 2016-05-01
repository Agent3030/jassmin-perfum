<?php
use Yii;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 07.04.16
 * Time: 23:48
 */

?>
<?php app\components\GoogleMaps\GoogleMapsAsset::register($this)?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?=Html::encode($response->key)?>&callback=initMap&sensor=false&language=<?=Html::encode($response->lang)?>"></script>
<script //type ="text/javascript" src = "/js/map.js"></script>
<div class = "col-md-12 map" id ="map" style = "width: <?=Html::encode($response->size->width)?>; height: <?=Html::encode($response->size->height)?> ">
    <script>

        var container = "map";
        var config = {
            center: {
                lat: <?=Html::encode($response->lntlng->lat)?>,
                lng: <?=Html::encode($response->lntlng->lng)?>
            },
            zoom: <?=Html::encode($response->zoom)?>,
            disableDefaultUI: false,
            scrollwheel: false,
            zoomControl: true,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: false
        };

        var gmap = new maps.GoogleMaps(container, config);

        gmap.getMap();

        <?php foreach ($response->markers as $marker):
            $marker= (object)$marker;

        ?>


            gmap.setMarker({
                latlng: {
                    lat: <?=Html::encode($marker->lntLng->lat)?>,
                    lng: <?=Html::encode($marker->lntLng->lng)?>
                },
                title: "<?=Html::encode($marker->name)?>"

            });
        <?php endforeach; ?>

    </script>

</div>
