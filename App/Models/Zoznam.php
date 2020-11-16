<?php
declare(strict_types=1);
require_once "Polozka.php";

class Zoznam
{
    private $user = "root";
    private $pass = "dtb456";
    private $db = "flora";
    private $host = "localhost";


    private PDO $pdo;


    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->host}", $this->user, $this->pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    /**
     * @return Polozka[]
     */
    public function getAll() : array {
        $stmt = $this->pdo->query("SELECT * FROM polozka");
        $polozky=[];
        while ($row = $stmt->fetch()) {
            $polozka = new Polozka($row['nazov'], $row['popis'], $row['obrazok']);
            $polozky[] = $polozka;
        }
        return $polozky;
    }

    public function savePolozka(Polozka $polozka) : void{
        $stmt = $this->pdo->prepare("INSERT INTO polozka (nazov, popis, obrazok) VALUES (?, ?, ?)");
        $stmt->execute([$polozka->getNazov(), $polozka->getPopis(), $polozka->getObrazok()]);
    }

    public function prdajPolozku( string $nazov, string $popis,string $obrazok) : void {
        $polozka = new Polozka($nazov, $popis, $obrazok);
        $this->savePolozka($polozka);

    }


    public function editujPolozku(string $nazov) : void {
        $stmt = $this->pdo->prepare("SELECT * FROM polozka WHERE nazov=$nazov");
        $stmt->execute([$nazov]);
    }

    public function zmazPolozku(string $nazov) : void {
        $stmt = $this->pdo->prepare("DELETE * FROM polozka WHERE nazov=$nazov");
    }

}