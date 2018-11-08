<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AMMProduct;

class SBAdminProductHomeController extends AbstractController
{
    /**
     * @Route("/product/home", name="s_b_admin_product_home")
     */
    public function index()
    {
    	// 
    	$repository = $this->getDoctrine()->getRepository(AMMProduct::class);

		$product = $repository->find(1030003);


        return $this->render('sb-admin-2/product.html.twig', [
            'controller_name' => 'SBAdminProductHomeController',
            'product' => $product,
        ]);
    }
}
