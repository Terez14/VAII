<?php


namespace App\Models;

use App\Core\Model;
class Pouzivatel extends Model
{
    protected $id;
    protected ?string $password;
    protected ?string $login;
    protected ?string $meno;
    protected ?string $priezvisko;
    protected ?string $kontakt;

    /**
     * Polozka constructor.
     * @param $login
     * @param $password
     * @param $meno
     * @param  $priezvisko
     * @param $kontakt
     */
    public function __construct(?string $login = null, ?string $password = null, ?string $meno = null, ?string $priezvisko = null, ?string $kontakt = null)
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->kontakt = $kontakt;
        $this->password = $password;
        $this->login = $login;
    }

    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }


    static public function setDbColumns()
    {
        return['id', 'login', 'password', 'meno', 'priezvisko', 'kontakt'];
    }

    static public function setTableName()
    {
        return 'pouzivatel';
    }

    /**
     * @return string|null
     */
    public function getKontakt(): ?string
    {
        return $this->kontakt;
    }

    /**
     * @param string|null $meno
     */
    public function setMeno(?string $meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return string|null
     */
    public function getPriezvisko(): ?string
    {
        return $this->priezvisko;
    }

    /**
     * @param string|null $priezvisko
     */
    public function setPriezvisko(?string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @param string|null $kontakt
     */
    public function setKontakt(?string $kontakt): void
    {
        $this->kontakt = $kontakt;
    }

    /**
     * @return string|null
     */
    public function getMeno(): ?string
    {
        return $this->meno;
    }

}