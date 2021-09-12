<style>


    #map {
        height: 100%;
    }

    .controls {
        border-radius: 3px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
    }

    #pac-input {
        text-overflow: ellipsis;
        margin-bottom: 0;

    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #gmap {
        height: 300px;
    }

</style>
<div style="display: block;width: 100%; ">

    <span class="icon icon-map-marker"></span>
    <div class=" form-group ">
        <input id="pac-input" name="address" class="cont
    rols form-control" type="text"
               placeholder="العنوان" value="{{$address}}">

        <input type="hidden" name="location_lat" value="{{$location_lat}}">
        <input type="hidden" name="location_lng" value="{{$location_lng}}">

    </div>

</div>
<div class="map" style="border-top: 3px solid #dedbdb; ">
    <div id="gmap" style=""></div>
</div>
