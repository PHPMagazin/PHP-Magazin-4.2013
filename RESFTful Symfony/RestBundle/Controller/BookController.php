<?php

namespace Phpmagazin\RestBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Rest\View
     */
    public function cgetAction()
    {
        $books = $this->getDoctrine()
            ->getRepository( 'PhpmagazinRestBundle:Book' )
            ->findAll();

        return array( 'books' => $books );
    }

    /**
     * @Rest\View
     */
    public function getAction( $id )
    {
        $book = $this->getDoctrine()
            ->getRepository( "PhpmagazinRestBundle:Book" )
            ->find( $id );

        return array( 'book' => $book );
    }

    /**
     * @Rest\View
     */
    public function cpostAction( )
    {
        $book = new \Phpmagazin\RestBundle\Entity\Book();
        $form = $this->createForm( new \Phpmagazin\RestBundle\Form\BookType(), $book );
        $form->bind( $this->getRequest() );

        if ( $form->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist( $book );
            $em->flush();

            return $this->redirectView(
                $this->generateUrl(
                    'get_book',
                    array( 'id' => $book->getId() )
                ),
                \FOS\Rest\Util\Codes::HTTP_CREATED
            );
        }

        return array(
            'processedForm' => $form
        );
    }

    /**
     * @Rest\View
     */
    public function putAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('PhpmagazinRestBundle:Book')->find($id);

        $form = $this->createForm(new \Phpmagazin\RestBundle\Form\BookType(), $book);
        $form->bind( $this->getRequest() );

        if ($form->isValid()) {
            $em->persist($book);
            $em->flush();

            return $this->redirectView(
                $this->generateUrl(
                    'get_book',
                    array( 'id' => $book->getId() )
                ),
                \FOS\Rest\Util\Codes::HTTP_NO_CONTENT
            );
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * @Rest\View
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('PhpmagazinRestBundle:Book')->find($id);

        $em->remove($book);
        $em->flush();

        return $this->view(null, \FOS\Rest\Util\Codes::HTTP_NO_CONTENT);
    }
}