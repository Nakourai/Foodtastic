<?php

namespace AppBundle\Controller\Business;

use AppBundle\Entity\Business\ProduitAchete;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * ProduitAchete controller.
 *
 * @Route("business_produitachete")
 */
class ProduitAcheteController extends Controller
{
    /**
     * Lists all produitAchete entities.
     *
     * @Route("/", name="business_produitachete_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produitAchetes = $em->getRepository('AppBundle:Business\ProduitAchete')->findAll();

        return $this->render('AppBundle:Business:ProduitAchete/index.html.twig', array(
            'produitAchetes' => $produitAchetes,
        ));
    }

    /**
     * Creates a new produitAchete entity.
     *
     * @Route("/new", name="business_produitachete_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $produitAchete = new ProduitAchete();
        $form = $this->createForm('AppBundle\Form\Business\ProduitAcheteType', $produitAchete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produitAchete);
            $em->flush();

            return $this->redirectToRoute('business_produitachete_show', array('id' => $produitAchete->getId()));
        }

        return $this->render('AppBundle:Business:ProduitAchete/new.html.twig', array(
            'produitAchete' => $produitAchete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a produitAchete entity.
     *
     * @Route("/{id}", name="business_produitachete_show")
     * @Method("GET")
     */
    public function showAction(ProduitAchete $produitAchete)
    {
        $deleteForm = $this->createDeleteForm($produitAchete);

        return $this->render('AppBundle:Business:ProduitAchete/show.html.twig', array(
            'produitAchete' => $produitAchete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing produitAchete entity.
     *
     * @Route("/{id}/edit", name="business_produitachete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProduitAchete $produitAchete)
    {
        $deleteForm = $this->createDeleteForm($produitAchete);
        $editForm = $this->createForm('AppBundle\Form\Business\ProduitAcheteType', $produitAchete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('business_produitachete_edit', array('id' => $produitAchete->getId()));
        }

        return $this->render('AppBundle:Business:ProduitAchete/edit.html.twig', array(
            'produitAchete' => $produitAchete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a produitAchete entity.
     *
     * @Route("/{id}", name="business_produitachete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProduitAchete $produitAchete)
    {
        $form = $this->createDeleteForm($produitAchete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produitAchete);
            $em->flush();
        }

        return $this->redirectToRoute('business_produitachete_index');
    }

    /**
     * Creates a form to delete a produitAchete entity.
     *
     * @param ProduitAchete $produitAchete The produitAchete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProduitAchete $produitAchete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('business_produitachete_delete', array('id' => $produitAchete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
