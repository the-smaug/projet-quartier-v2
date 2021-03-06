@extends('default')

@section('content')
    <div class="header header-home"></div>
    <div class="flex-container">

        <div class="flex-container-column" id="home_page">
            <h1 class="page-title" id="home_title_1">{{ trans('homepage.titre1') }}</h1>
            <h1 class="page-title" id="home_title_2">{{ trans('homepage.titre2') }}</h1>
            <h2 id="button_parcours">{{ trans('homepage.titre3') }} <a href="{{ action('JourneyController@index') }}"><img  src="img\map-icon-white.svg" id="map_icon"/></a></h2>
        </div>

        <div id="home_history">
            <div id="home_history_triangle"></div>
            <div id="home_history_square"></div>
            <div class="flex-container">
                <div class="container-text">
                    <h2>{{ trans('homepage.histoire') }}</h2>
                    <p{{ trans('homepage.histoire-text') }}</p>
                    <p>{{ trans('homepage.histoire-text2') }}</p>
                </div>
                <div class="container-map">
                    <div class="overlay" onClick="style.pointerEvents='none'"></div>
                    <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11133.988129538877!2d4.8169921898783965!3d45.76122843568518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ebaaef7e7f5f%3A0x2d9cc97768f72426!2sVieux+Lyon%2C+69005+Lyon%2C+France!5e0!3m2!1sfr!2sfr!4v1478164165338" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
            </div>
        </div>

        <div class ="flex-container" id="event_container" >
            @foreach ($events as $event  )

            <div class="event">
                <div class="event-header">
                    <div>
                        <div class="event-title">{{$event->name}}</div>
                        <div class="event-place">@ {{$event->place}} </div>
                        <div class="event-hour">
                            <?php
                            $date = date_create($event->date);
                            echo $date->format('M d')
                            ?>
                            @ <?= $date->format('H\hi') ?>
                        </div>
                    </div>
                    <div class="event-date">
                        <div class="month">
                            <?= $date->format('M') ?>
                        </div>
                        <div class="day">
                            <?= $date->format('d') ?>
                        </div>
                        <div class="dayWeek">
                            <?= $date->format('D') ?>
                        </div>
                    </div>
                </div>
                <div class="event-description">
                    <img src="../storage/app/public/events/{{ $event->url }}" >
                    <p>{{$event->description}}</p>
                </div>

            </div>
           @endforeach
        </div>
        
        @foreach($events as $e)



        @endforeach
        
        <div id="datavision_container" class="flex-container" onmouseover="setTimeout(countdown)">
            <div class="home-datavision">
                <div class="home-datavision-number" id="compteur1">0</div>
                <div class="home-datavision-description">{{ trans('homepage.datavision1') }}</div>
            </div>
            <div class="home-datavision">
                <div class="home-datavision-number" id="compteur2">0</div>
                <div class="home-datavision-description">{{ trans('homepage.datavision2') }}</div>
            </div>
            <div class="home-datavision">
                <div class="home-datavision-number"><span id="compteur3">0</span><span>%</span></div>
                <div class="home-datavision-description">{{ trans('homepage.datavision3') }}</div>
            </div>
        </div>
    </div>

@endsection



@section('script')

   <script>

       var cpt = 0; // Initialisation du compteur
       var cpt2 = 0; // Initialisation du compteur
       var cpt3 = 0; // Initialisation du compteur
       var duree = 5; // Durée en seconde pendant laquel le compteur ira de 0 à
       var delta = Math.ceil((duree * 100) / 35); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
       var delta2 = Math.ceil((duree * 100) / 15); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
       var delta3 = Math.ceil((duree * 100) / 100); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
       var node =  document.getElementById("compteur1"); // On récupère notre noeud où sera rafraîchi la valeur du compteur
       var node2 =  document.getElementById("compteur2"); // On récupère notre noeud où sera rafraîchi la valeur du compteur
       var node3 =  document.getElementById("compteur3"); // On récupère notre noeud où sera rafraîchi la valeur du compteur

       function countdown() {

           if( cpt < 35 ) {
               node.innerHTML = ++cpt;// Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
               setTimeout(countdown, delta);
           }
           else if (cpt2 < 15) { // Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
               node2.innerHTML = ++cpt2;
               setTimeout(countdown, delta2);
           }
           else{

               if (cpt3 < 100) {
                   node3.innerHTML = ++cpt3;// Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
                   setTimeout(countdown, delta3);
               }
           }
       }


   </script>

@endsection
