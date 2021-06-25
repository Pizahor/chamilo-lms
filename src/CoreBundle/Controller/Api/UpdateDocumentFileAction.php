<?php

declare(strict_types=1);

/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Chamilo\CourseBundle\Repository\CDocumentRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class UpdateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(CDocument $document, Request $request, CDocumentRepository $repo, EntityManager $em): CDocument
    {
        error_log('UpdateDocumentFileAction __invoke');

        $this->handleUpdateRequest($document, $repo, $request, $em);

        //$document->setComment($comment);

        error_log('Finish update resource node file action');

        return $document;
    }
}
