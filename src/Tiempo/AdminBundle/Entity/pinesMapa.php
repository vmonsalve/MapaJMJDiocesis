<?php

namespace Tiempo\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pinesMapa
 *
 * @ORM\Table(name="pines_mapa")
 * @ORM\Entity(repositoryClass="Tiempo\AdminBundle\Repository\pinesMapaRepository")
 */
class pinesMapa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Provincias", type="string", length=255, nullable=true)
     */
    private $provincias;

    /**
     * @var string
     *
     * @ORM\Column(name="Distritos", type="string", length=255, nullable=true)
     */
    private $distritos;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="string", length=255, nullable=true)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="string", length=255, nullable=true)
     */
    private $longitud;


   

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return pinesMapa
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return pinesMapa
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return pinesMapa
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set provincias
     *
     * @param string $provincias
     *
     * @return pinesMapa
     */
    public function setProvincias($provincias)
    {
        $this->provincias = $provincias;

        return $this;
    }

    /**
     * Get provincias
     *
     * @return string
     */
    public function getProvincias()
    {
        return $this->provincias;
    }

    /**
     * Set distritos
     *
     * @param string $distritos
     *
     * @return pinesMapa
     */
    public function setDistritos($distritos)
    {
        $this->distritos = $distritos;

        return $this;
    }

    /**
     * Get distritos
     *
     * @return string
     */
    public function getDistritos()
    {
        return $this->distritos;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     *
     * @return pinesMapa
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     *
     * @return pinesMapa
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string
     */
    public function getLongitud()
    {
        return $this->longitud;
    }
}
