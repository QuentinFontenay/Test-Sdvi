<?php

declare(strict_types = 1);

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class ExceptionSubscriber
 * @package App\EventSubscriber
 */
class ExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @var EngineInterface
     */
    private $twigEngine;

    /**
     * ExceptionSubscriber constructor.
     * @param EngineInterface $twigEngine
     */
    public function __construct(EngineInterface $twigEngine)
    {
        $this->twigEngine = $twigEngine;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::EXCEPTION => "handleException"];
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function handleException(GetResponseForExceptionEvent $event): void
    {
        // récupération de l'exception
        $exception = $event->getException();

        // création du contenu de la vue correspondante
        $content = $this->twigEngine->render("erreur.html.twig", [
            "messageErreur" => $exception->getMessage(),
        ]);

        // création d'une nouvelle réponse avec le contenu
        $response = new Response($content);

        $event->setResponse($response);
    }
}
