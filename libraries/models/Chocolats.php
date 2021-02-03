
<?php
// id, name, categorie, description, img, publishDate

require_once (dirname(__DIR__) . '/config/Database.php');

class Chocolats
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function list()
    {
        $sql = $this->pdo->query("
        SELECT * FROM chocolats
         ORDER BY publish_date DESC
        ");

        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        return $sql;
    }

    public function ajouterChocolat($name, $categorie, $description, $img)
    {
        $this->pdo->query("INSERT INTO chocolats (name, categorie, description, img) VALUES ('$name', '$categorie', '$description', '$img')");
    }
}


?>