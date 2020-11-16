<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
class Polozka extends Model
{

    protected ?string $obrazok;
    protected ?string $nazov;
    protected ?string $popis;

    /**
     * Polozka constructor.
     * @param $nazov
     * @param $popis
     * @param $obrazok
     */
    public function __construct(?string $nazov = null, ?string $popis = null, ?string $obrazok = null)
    {
        $this->obrazok = $obrazok;
        $this->nazov = $nazov;
        $this->popis = $popis;
    }

    /**
     * @return string
     */
    public function getObrazok(): ?string
    {
        return $this->obrazok;
    }

    public function setObrazok(?string $obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    /**
     * @return string
     */
    public function getNazov(): ?string
    {
        return $this->nazov;
    }

    public function setNazov(?string $nazov): void
    {
        $this->nazov = $nazov;
    }

    /**
     * @return string
     */
    public function getPopis(): ?string
    {
        return $this->popis;
    }

    public function setPopis(?string $popis): void
    {
        $this->popis = $popis;
    }

    static public function setDbColumns()
    {
        return['nazov', 'popis', 'obrazok'];
    }

    static public function setTableName()
    {
        return 'polozka';
    }
}