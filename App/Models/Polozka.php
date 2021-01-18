<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
class Polozka extends Model
{
    protected $id;
    protected $pouzivatel_id;
    protected string $obrazok;
    protected string $nazov;
    protected string $popis;

    /**
     * Polozka constructor.
     * @param $nazov
     * @param $popis
     * @param $obrazok
     */
    public function __construct($pouzivatel_id = "",string $nazov = "", string $popis = "", string $obrazok = "")
    {
        $this->pouzivatel_id = $pouzivatel_id;
        $this->obrazok = $obrazok;
        $this->nazov = $nazov;
        $this->popis = $popis;
    }

    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getObrazok(): string
    {
        return $this->obrazok;
    }

    public function setObrazok(string $obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    /**
     * @return string
     */
    public function getNazov(): string
    {
        return $this->nazov;
    }

    public function setNazov(string $nazov): void
    {
        $this->nazov = $nazov;
    }

    /**
     * @return string
     */
    public function getPopis(): string
    {
        return $this->popis;
    }

    public function setPopis(string $popis): void
    {
        $this->popis = $popis;
    }

    static public function setDbColumns()
    {
        return['id','pouzivatel_id', 'nazov', 'popis', 'obrazok'];
    }

    static public function setTableName()
    {
        return 'polozka';
    }

    /**
     * @return mixed
     */
    public function getPouzivatelId()
    {
        return $this->pouzivatel_id;
    }

    /**
     * @param mixed $pouzivatel_id
     */
    public function setPouzivatelId($pouzivatel_id): void
    {
        $this->pouzivatel_id = $pouzivatel_id;
    }

}