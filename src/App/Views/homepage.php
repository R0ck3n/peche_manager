<section>
    <h2>Accueil</h2>

    <h3>Introduction</h3>

    <p>Ce site vous propose d'organiser votre prochaine sortie de pêche, il propose des fonctionnalités
        offertes à tous dans l'accueil afin de déterminer l'endroit et les conditions météo d'une sortie. </p>
    <p>Avec une inscription vous pourrez tenir un journal de bord de vos sorties dans votre espace personnel.</p>

    <h3>Choisir la zone de pêche</h3>

    <form action="" method="post" class="town-form" id="Town-form">
        <div>
            <label for="Town-name">Saisissez le nom d'une ville proche de la zone où vous souhaitez pêcher :</label>
            <input required type="text" name="Town-name" id="Town-name" placeholder="Nom"/>
        </div>
        <button class="btn" type="submit"> Rechercher</button>
    </form>
</section>
<section>
    <h3 class="hidden">Voici la carte de la région: </h3>

    <div id="map"></div>
</section>
<section>
    <h3 class="hidden">Voici la météo de la zone recherchée :</h3>

    <div class="homepage-weather">
        <div class="weather-container hidden" id="weather-container">
            <div>
                <div>
                    <img data-weather="srcWeatherIcon" src="" alt="weather pic">
                </div>
                <div>
                    <div>
                        <h3>Ville:</h3>
                        <h3 data-weather="city"></h3>
                    </div>
                    <div>
                        <p>Humidité:</p>
                        <p data-weather="humidity"></p>
                        <p>%</p>
                    </div>
                    <div>
                        <p>Nuages:</p>
                        <p data-weather="cloud"></p>
                        <p>%</p>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <p>Température:</p>
                    <div>
                        <p data-weather="temperature"></p>
                        <p>°C</p>
                    </div>
                </div>
                <div>
                    <p>Vitesse du vent:</p>
                    <div>
                        <p data-weather="windSpeed"></p>
                        <p>Km/h</p>
                    </div>
                </div>
                <div>
                    <p>Pression:</p>
                    <div>
                        <p data-weather="pressure"></p>
                        <p>hPa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>