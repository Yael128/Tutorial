<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StandardController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $num1 = 1;
        $num2 = 100;
        $sum = $num1 + $num2;
        $nombres = 'Lenny, Leonardo, Lencho, Leobardo, LET IT BE';
        return $this->render('standard/index.html.twig', [
            'num1' => $num1, 'num2' => $num2, 'sum' => $sum, 'nombres' => $nombres
        ]);
    }

    /**
     * @Route("/pagina2/{nombre}", name="pagina2")
     */

    public function pagina2($nombre)
    {
        return $this->render('standard/pagina2.html.twig', [
            'nombre' => $nombre
        ]);
    }

    /**
     * @Route("/PersistirDatos", name="Persistir")
     */
    public function PersistirDatos()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $categoria = new Categoria();
        $categoria->setNombre("Test");
        $producto = new Producto('Test', 'c-04');
        $producto->setCategoria($categoria);

        $entityManager->persist($producto);
        $entityManager->flush();

        return $this->render('standard/success.html.twig', [
            'producto' => $producto->getNombre()
        ]);
    }
}
