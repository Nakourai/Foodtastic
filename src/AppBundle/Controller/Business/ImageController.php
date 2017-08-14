<?php

namespace AppBundle\Controller\Business;

use AppBundle\Entity\Business\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Image controller.
 *
 * @Route("business_image")
 */
class ImageController extends Controller
{
    /**
     * Lists all image entities.
     *
     * @Route("/", name="business_image_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $images = $em->getRepository('AppBundle:Business\Image')->findAll();

        return $this->render('AppBundle:Business:Image/index.html.twig', array(
            'images' => $images,
        ));
    }

    /**
     * Creates a new image entity.
     *
     * @Route("/new", name="business_image_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $image = new Image();
        $form = $this->createForm('AppBundle\Form\Business\ImageType', $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('business_image_show', array('id' => $image->getId()));
        }

        return $this->render('AppBundle:Business:Image/new.html.twig', array(
            'image' => $image,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a image entity.
     *
     * @Route("/{id}", name="business_image_show")
     * @Method("GET")
     */
    public function showAction(Image $image)
    {
        $deleteForm = $this->createDeleteForm($image);

        return $this->render('AppBundle:Business:Image/show.html.twig', array(
            'image' => $image,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing image entity.
     *
     * @Route("/{id}/edit", name="business_image_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Image $image)
    {
        $deleteForm = $this->createDeleteForm($image);
        $editForm = $this->createForm('AppBundle\Form\Business\ImageType', $image);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('business_image_edit', array('id' => $image->getId()));
        }

        return $this->render('AppBundle:Business:Image/edit.html.twig', array(
            'image' => $image,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a image entity.
     *
     * @Route("/{id}", name="business_image_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Image $image)
    {
        $form = $this->createDeleteForm($image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();
        }

        return $this->redirectToRoute('business_image_index');
    }

    /**
     * Creates a form to delete a image entity.
     *
     * @param Image $image The image entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Image $image)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('business_image_delete', array('id' => $image->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
