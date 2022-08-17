<section>
    <h2>Bienvenu <?= htmlentities($user['firstname']) ?> dans votre espace personnel</h2>

    <p>Vous pouvez inscrire ici créé le compte rendu de votre session du jour ou consulter l'historique de vos
        sessions</p>
</section>
<section>
    <button class="btn" id="feedbackSession">créer un nouveau compte rendu de session</button>

    <form method="POST" class="town-form hidden" id="Town-form">
        <div>
            <label for="fishing-zone">Saisissez le nom d'une ville proche de votre session de pêche :</label>
            <input required type="text" name="Town-name" id="Town-name" placeholder="Nom"/>
        </div>
        <button class="btn" type="submit"> Rechercher</button>
    </form>

    <form id="weather-form" action="<?= url('/fishingSessionRegister') ?>" class="memberSpace-report hidden"
          method="post">
        <div class="flex-gap">
            <div class="weather-container" id="weather-container">
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

            <div class="shadow-box">
                <div>
                    <label for="fishing-zone">Saisissez le nom du plan d'eau :</label>
                    <input required type="text" name="fishing-zone" id="fishing-zone" placeholder="Nom du plan d'eau"
                           class="<?php if (isset($_SESSION['error']['fishing-zone'])): ?>invalid-field <?php endif; ?>"/>
                    <?php viewError('fishing-zone') ?>
                </div>
                <div>
                    <label for="session-content">Compte rendu de session :</label>
                    <textarea id="session-content" name="session-content" rows="5"
                              placeholder="Saisissez votre compte rendu ici..."
                              class="<?php if (isset($_SESSION['error']['session-content'])): ?>invalid-field <?php endif; ?>"></textarea>
                    <?php viewError('session-content') ?>
                </div>
                <div>
                    <label for="session-ranking">Attribuer une note a la session</label>
                    <div class="flex-row">
                        <input id="session-ranking" name="session-ranking" type="range" min="1" max="5"/>
                        <p id="rankingNote"></p>
                        <p>/5</p>
                    </div>
                    <?php viewError('session-ranking') ?>
                </div>
            </div>
        </div>

        <div>
            <button class="btn" id="registerSession">Ajouter à l'historique</button>
        </div>

    </form>

</section>
<section>
    <h2>Voici l'historique de vos sessions de pêche :</h2>


    <form class="memberSpace-recap">
        <div>
            <label for="search-select"></label>
            <select name="search-category" id="param-select">
                <option value="">Choissisez dans quelle colonne rechercher</option>
                <option value="fishing-zone">Zone de pêche</option>
                <option value="temperature">Température</option>
                <option value="session-ranking">Score de la session</option>
            </select>
        </div>

        <div class="">
            <label for="search">Recherche</label>
            <input type="search" id="search" name="search" placeholder="Tappez votre recherche">
        </div>
    </form>

    <table id="session-table">
        <thead>
        <tr>
            <th>Zone de pêche</th>
            <th>Date de la session</th>
            <th>Score de session</th>
            <th>Humidité</th>
            <th>Couverture nuageuse</th>
            <th>Température</th>
            <th>Vitesse du vent</th>
            <th>Pression atmosphérique</th>
            <th>Commentaires</th>
        </tr>
        </thead>
        <tbody>
        <!-- Corps du tableau qui sera mis à jour à l'aide d'ajax -->
        </tbody>
    </table>
</section>
