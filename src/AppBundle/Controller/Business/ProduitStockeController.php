<?php

namespace AppBundle\Controller\Business;

use AppBundle\Entity\Business\ProduitStocke;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * ProduitStocke controller.
 *
 * @Route("business_produitstocke")
 */
class ProduitStockeController extends Controller
{
    /**
     * Lists all produitStocke entities.
     *
     * @Route("/", name="business_produitstocke_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produitStockes = $em->getRepository('AppBundle:Business\ProduitStocke')->findAll();

        return $this->render('AppBundle:Business:ProduitStocke/index.html.twig', array(
            'produitStockes' => $produitStockes,
        ));
    }

    /**
     * Creates a new produitStocke entity.
     *
     * @Route("/new", name="business_produitstocke_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $produitStocke = new ProduitStocke();
        $form = $this->createForm('AppBundle\Form\Business\ProduitStockeType', $produitStocke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produitStocke);
            $em->flush();

            return $this->redirectToRoute('business_produitstocke_show', array('id' => $produitStocke->getId()));
        }

        return $this->render('AppBundle:Business:ProduitStocke/new.html.twig', array(
            'produitStocke' => $produitStocke,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a produitStocke entity.
     *
     * @Route("/{id}", name="business_produitstocke_show")
     * @Method("GET")
     */
    public function showAction(ProduitStocke $produitStocke)
    {
        $deleteForm = $this->createDeleteForm($produitStocke);

        return $this->render('AppBundle:Business:ProduitStocke/show.html.twig', array(
            'produitStocke' => $produitStocke,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing produitStocke entity.
     *
     * @Route("/{id}/edit", name="business_produitstocke_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProduitStocke $produitStocke)
    {
        $deleteForm = $this->createDeleteForm($produitStocke);
        $editForm = $this->createForm('AppBundle\Form\Business\ProduitStockeType', $produitStocke);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('business_produitstocke_edit', array('id' => $produitStocke->getId()));
        }

        return $this->render('AppBundle:Business:ProduitStocke/edit.html.twig', array(
            'produitStocke' => $produitStocke,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a produitStocke entity.
     *
     * @Route("/{id}", name="business_produitstocke_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProduitStocke $produitStocke)
    {
        $form = $this->createDeleteForm($produitStocke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produitStocke);
            $em->flush();
        }

        return $this->redirectToRoute('business_produitstocke_index');
    }

    /**
     * Creates a form to delete a produitStocke entity.
     *
     * @param ProduitStocke $produitStocke The produitStocke entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProduitStocke $produitStocke)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('business_produitstocke_delete', array('id' => $produitStocke->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
