<?php
declare(strict_types=1);

class Polozka
{

    private string $obrazok;
    private string $nazov;
    private string $popis;

    public function __construct($nazov, $popis, $obrazok)
    {
        $this->obrazok = $obrazok;
        $this->nazov = $nazov;
        $this->popis = $popis;
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

}