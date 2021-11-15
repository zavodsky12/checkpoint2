<?php

class Post
{
    public function __construct(

        private int $id = 0,
        private ?string $obrazok = null,
        private string $meno = "",
        private string $priezvisko = "",
        private string $krajina = "",
        private int $likes = 0
    )
    {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->obrazok;
    }

    /**
     * @param string|null $obrazok
     */
    public function setImage(?string $obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    /**
     * @return string
     */
    public function getMeno(): string
    {
        return $this->meno;
    }

    /**
     * @param string $meno
     */
    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return string
     */
    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }

    /**
     * @param string $priezvisko
     */
    public function setPriezvisko(string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return string
     */
    public function getKrajina(): string
    {
        return $this->krajina;
    }

    /**
     * @param string $krajina
     */
    public function setKrajina(string $krajina): void
    {
        $this->krajina = $krajina;
    }

    /**
     * @return int
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     * @param int $likes
     */
    public function setLikes(int $likes): void
    {
        $this->likes = $likes;
    }
}