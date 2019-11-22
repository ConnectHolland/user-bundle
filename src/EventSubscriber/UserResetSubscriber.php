<?php

declare(strict_types=1);

/*
 * This file is part of the user bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UserBundle\EventSubscriber;

use ConnectHolland\UserBundle\Entity\User;
use ConnectHolland\UserBundle\Entity\UserInterface;
use ConnectHolland\UserBundle\Event\UserResetEventInterface;
use ConnectHolland\UserBundle\Mailer\ResetEmailInterface;
use ConnectHolland\UserBundle\UserBundleEvents;
use Symfony\Bridge\Doctrine\RegistryInterface;

final class UserResetSubscriber implements UserResetSubscriberInterface
{
    /**
     * @var ResetEmailInterface
     */
    private $email;

    /**
     * @var RegistryInterface
     */
    private $registry;

    public function __construct(ResetEmailInterface $email, RegistryInterface $registry)
    {
        $this->email    = $email;
        $this->registry = $registry;
    }

    public function onUserReset(UserResetEventInterface $event): void
    {
        $user = $this->registry->getRepository(User::class)->findOneBy([
            'email' => $event->getEmail(),
        ]);

        if ($user instanceof UserInterface) {
            $this->email->send($user);
        }
    }

    /**
     * @codeCoverageIgnore No need to test this array 'config' method
     */
    public static function getSubscribedEvents(): array
    {
        return [
            UserBundleEvents::USER_RESET => 'onUserReset',
        ];
    }
}