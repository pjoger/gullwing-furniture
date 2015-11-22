<div id="contacts">
	<div class="text_block">
		<div class="text_container">
			<h1><?php $translate->__('Contacts'); ?></h1>
			<br/>
			<p><?php $translate->__('AddressText'); ?></p>
			<p>E-mail: info@gullwing.ru</p>
			<p><?php $translate->__('Phone'); ?>: +7 (495) 760-53-93</p>
			<br/>
      <div id="map" style="width: 600px; height: 400px"></div>
      <?php if ($lang == 'ru'){ ?>
      <!-- <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=IfyguqclEwEKYrHcsLJlJtpDIXMIPoB9&width=900&height=450&lang=ru_RU&sourceType=constructor"></script> -->
      <script type="text/javascript">
        ymaps.ready(init);

        function init(){     
          var gullwingMap = new ymaps.Map("map", {
            center: [55.762632, 37.615775],
            zoom: 15,
            controls: ["zoomControl", "fullscreenControl"]
          });
          var gullwingMark = new ymaps.Placemark([55.762632, 37.615775], {
            hintContent: 'gullwing',
            balloonContent: 'gullwing: Дизайн интерьеров, Строительная компания, Архитектурное бюро'
          });
          gullwingMap.geoObjects.add(gullwingMark);
        }
      </script>
      <?php } else { ?>
      <script type="text/javascript">
        function initMap() {
          var myLatLng = {lat: 55.762632, lng: 37.615775};

          // Create a map object and specify the DOM element for display.
          var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            scrollwheel: false,
            zoom: 15
          });

          // Create a marker and set its position.
          var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'gullwing'
          });
        }
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
      <?php } ?>
		</div>
	</div>
</div>


