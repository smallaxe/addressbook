<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AddressbookEntry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    /**
     * Lists all addressbookEntry entities.
     *
     * @Route("/", name="addressbookentry_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $addressbookEntries = $em->getRepository('AppBundle:AddressbookEntry')->findAll();

        return $this->render('addressbookentry/index.html.twig', array(
            'addressbookEntries' => $addressbookEntries,
        ));
    }

    /**
     * Creates a new addressbookEntry entity.
     *
     * @Route("/new", name="addressbookentry_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $addressbookEntry = new Addressbookentry();
        $form = $this->createForm('AppBundle\Form\AddressbookEntryType', $addressbookEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($addressbookEntry);
            $em->flush();

            return $this->redirectToRoute('addressbookentry_show', array('id' => $addressbookEntry->getId()));
        }

        return $this->render('addressbookentry/new.html.twig', array(
            'addressbookEntry' => $addressbookEntry,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a addressbookEntry entity.
     *
     * @Route("/{id}", name="addressbookentry_show")
     * @Method("GET")
     */
    public function showAction(AddressbookEntry $addressbookEntry)
    {
        $deleteForm = $this->createDeleteForm($addressbookEntry);

        return $this->render('addressbookentry/show.html.twig', array(
            'addressbookEntry' => $addressbookEntry,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing addressbookEntry entity.
     *
     * @Route("/{id}/edit", name="addressbookentry_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AddressbookEntry $addressbookEntry)
    {
        $deleteForm = $this->createDeleteForm($addressbookEntry);
        $editForm = $this->createForm('AppBundle\Form\AddressbookEntryType', $addressbookEntry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('addressbookentry_edit', array('id' => $addressbookEntry->getId()));
        }

        return $this->render('addressbookentry/edit.html.twig', array(
            'addressbookEntry' => $addressbookEntry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a addressbookEntry entity.
     *
     * @Route("/{id}", name="addressbookentry_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AddressbookEntry $addressbookEntry)
    {
        $form = $this->createDeleteForm($addressbookEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($addressbookEntry);
            $em->flush();
        }

        return $this->redirectToRoute('addressbookentry_index');
    }

    /**
     * Creates a form to delete a addressbookEntry entity.
     *
     * @param AddressbookEntry $addressbookEntry The addressbookEntry entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AddressbookEntry $addressbookEntry)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('addressbookentry_delete', array('id' => $addressbookEntry->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
