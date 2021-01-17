<?php


namespace App\Models;


use App\Core\Model;

class Recenzia extends Model
{
    protected $id;
    protected $pouzivatel_id;
    protected string $komentar;
    protected string $znamka;

    public function __construct( $pouzivatel_id = "", string $komentar = "", string $znamka="")
    {
        $this->pouzivatel_id=$pouzivatel_id;
        $this->komentar=$komentar;
        $this->znamka=$znamka;
    }

    static public function setDbColumns()
    {
        return['id', 'pouzivatel_id', 'komentar', 'znamka'];
    }

    static public function setTableName()
    {
        return 'recenzia';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }



    /**
     * @return string
     */
    public function getKomentar(): string
    {
        return $this->komentar;
    }

    /**
     * @param string $komentar
     */
    public function setKomentar(string $komentar): void
    {
        $this->komentar = $komentar;
    }

    /**
     * @return string
     */
    public function getZnamka(): string
    {
        return $this->znamka;
    }

    /**
     * @param string $znamka
     */
    public function setZnamka(string $znamka): void
    {
        $this->znamka = $znamka;
    }

    /**
     * @return mixed|string
     */
    public function getPouzivatelId()
    {
        return $this->pouzivatel_id;
    }

    /**
     * @param mixed|string $pouzivatel_id
     */
    public function setPouzivatelId($pouzivatel_id): void
    {
        $this->pouzivatel_id = $pouzivatel_id;
    }
}