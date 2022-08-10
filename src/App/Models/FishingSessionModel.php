<?php

namespace App\Models;

use Library\Core\AbstractModel;

class FishingSessionModel extends AbstractModel
{
    /** Envoi la requete a la database pour récupérer l'historique des session de pêche et applique le filtre si besoin
     * @param int $userId
     * @return array
     */
    public function fishingSessions(int $userId): array
    {
        if (isset($_GET['fishing-zone'])) {
            return $this->db->getResults(
                'SELECT fishing_zone,session_content,session_ranking, humidity,	precipitation, temperature,	wind_speed,	pressure, created_at
            FROM fishing_history
            WHERE fishing_zone LIKE :fishing_zone', [
                'fishing_zone' => "%".$_GET['fishing-zone']."%"
            ]);
        }
        elseif (isset($_GET['temperature'])) {
            return $this->db->getResults(
                'SELECT fishing_zone,session_content,session_ranking, humidity,	precipitation, temperature,	wind_speed,	pressure, created_at
            FROM fishing_history
            WHERE temperature LIKE :temperature', [
                'temperature' => "%".$_GET['temperature']."%"
            ]);
        }
        elseif (isset($_GET['session-ranking'])) {
            return $this->db->getResults(
                'SELECT fishing_zone,session_content,session_ranking, humidity,	precipitation, temperature,	wind_speed,	pressure, created_at
            FROM fishing_history
            WHERE session_ranking LIKE :session_ranking', [
                'session_ranking' => "%".$_GET['session-ranking']."%"
            ]);
        }else {
            return $this->db->getResults(
                'SELECT fishing_zone,session_content,session_ranking, humidity,	precipitation, temperature,	wind_speed,	pressure, created_at
            FROM fishing_history
            WHERE user_id = :user_id', [
                'user_id' => $userId
            ]);
        }

    }

    /** Enregistre les données de la session de pêche en base de donnée
     * @param array $data
     * @return int|null
     */
    public function create(array $data): ?int
    {
        $userId = $this->db->execute(
            'INSERT INTO fishing_history
                (fishing_zone,	session_content	, session_ranking, humidity, precipitation, temperature, 
                 wind_speed, pressure, user_id) 
                VALUES (:fishing_zone, :session_content, :session_ranking, :humidity, :precipitation, 
                        :temperature, :wind_speed, :pressure, :user_id)',
            [
                'fishing_zone' => $data['fishing-zone'],
                'session_content' => $data['session-content'],
                'session_ranking' => $data['session-ranking'],
                'humidity' => $data['humidity'],
                'precipitation' => $data['precipitation'],
                'temperature' => $data['temperature'],
                'wind_speed' => $data['windSpeed'],
                'pressure' => $data['pressure'],
                'user_id' => $data['user_id']
            ]);

        if ($userId === false) {
            return null;
        }
        return $userId;
    }


}