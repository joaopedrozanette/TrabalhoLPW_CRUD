<?php
require_once(__DIR__ . "/Raca.php");
require_once(__DIR__ . "/Afiliacao.php");

class Personagem {

    private ?int $id;
    private ?string $nome;
    private ?int $idade;
    private ?string $akuma_no_mi;
    private ?Raca $raca;
    private ?Afiliacao $afiliacao;
    private ?float $recompensa;
    private ?string $descricao;
    private ?string $image_url;

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): self { $this->id = $id; return $this; }

    public function getNome(): ?string { return $this->nome; }
    public function setNome(?string $nome): self { $this->nome = $nome; return $this; }

    public function getIdade(): ?int { return $this->idade; }
    public function setIdade(?int $idade): self { $this->idade = $idade; return $this; }

    public function getAkumaNoMi(): ?string { return $this->akuma_no_mi; }
    public function setAkumaNoMi(?string $a): self { $this->akuma_no_mi = $a; return $this; }

    public function getRaca(): ?Raca { return $this->raca; }
    public function setRaca(?Raca $r): self { $this->raca = $r; return $this; }

    public function getAfiliacao(): ?Afiliacao { return $this->afiliacao; }
    public function setAfiliacao(?Afiliacao $a): self { $this->afiliacao = $a; return $this; }

    public function getRecompensa(): ?float { return $this->recompensa; }
    public function setRecompensa(?float $v): self { $this->recompensa = $v; return $this; }

    public function getDescricao(): ?string { return $this->descricao; }
    public function setDescricao(?string $d): self { $this->descricao = $d; return $this; }

    public function getImageUrl(): ?string { return $this->image_url; }
    public function setImageUrl(?string $u): self { $this->image_url = $u; return $this; }
}
